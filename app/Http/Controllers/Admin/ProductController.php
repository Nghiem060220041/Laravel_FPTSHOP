<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand; 
use App\Models\ProductVariant; // <-- Thêm model ProductVariant
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule; // <-- Thêm Rule để validate unique khi update

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'brand', 'variants')->latest()->paginate(10); // Thêm 'brand' nếu cần
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all(); // <-- Lấy danh sách brand
        return view('admin.products.create', compact('categories', 'brands')); // <-- Truyền brands ra view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Nên dùng Form Request sau này
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',  // Đảm bảo trường này được validate
            'description' => 'nullable|string',
            'status' => 'required|boolean',  // Đảm bảo trường này được validate
            'featured' => 'required|boolean',  // Đảm bảo trường này được validate
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'variants' => 'required|array|min:1',
            'variants.*.name' => 'required|string|max:255',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.quantity' => 'required|integer|min:0',
        ]);

        // Tạo slug từ tên sản phẩm
        $baseSlug = Str::slug($request->name);
        $slug = $baseSlug;
        
        // Kiểm tra và đảm bảo slug là duy nhất
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        // Xử lý upload ảnh (nếu có)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Lưu thông tin sản phẩm với slug duy nhất
        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug, // Slug đã được đảm bảo là duy nhất
            'description' => $request->description,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'status' => $request->status,
            'featured' => $request->featured,
            'image' => $imagePath,
        ]);

        // Lưu các biến thể sản phẩm
        foreach ($request->variants as $variantData) {
            $product->variants()->create([
                'name' => $variantData['name'],
                'price' => $variantData['price'],
                'quantity' => $variantData['quantity'],
            ]);
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được tạo thành công.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all(); // <-- Lấy brands
        // Eager load variants để truyền ra view edit
        $product->load('variants');
        return view('admin.products.edit', compact('product', 'categories', 'brands')); // <-- Truyền brands
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product) // Nên dùng Form Request
    {
        // Validation thông tin chung (tương tự store nhưng điều chỉnh rule unique)
        $validatedProduct = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name')->ignore($product->id), // Ignore ID hiện tại
            ],
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|boolean',
            'featured' => 'required|boolean',
        ]);

        // Validation dữ liệu variants (giống store)
        $validatedVariants = $request->validate([
            'variants' => 'required|array|min:1',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.quantity' => 'required|integer|min:0',
            'variants.*.name' => 'nullable|string|max:255',
            'variants.*.attributes' => 'nullable|array',
            'variants.*.attributes.*.key' => 'required_with:variants.*.attributes.*.value|string|max:255',
            'variants.*.attributes.*.value' => 'required_with:variants.*.attributes.*.key|string|max:255',
            'variants.*.id' => 'nullable|integer|exists:product_variants,id', // Validate ID của variant nếu có
        ]);

        // Chuẩn bị dữ liệu update cho Product
        $updateData = [
            'name' => $validatedProduct['name'],
            'slug' => Str::slug($validatedProduct['name']),
            'category_id' => $validatedProduct['category_id'],
            'brand_id' => $validatedProduct['brand_id'],
            'description' => $validatedProduct['description'],
            'content' => $validatedProduct['content'],
            'status' => $validatedProduct['status'],
            'featured' => $validatedProduct['featured'],
        ];


        // Xử lý upload ảnh chính nếu có ảnh mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $updateData['image'] = $request->file('image')->store('products', 'public');
        }

        // Cập nhật sản phẩm chính
        $product->update($updateData);

        // --- Logic cập nhật Variants hiệu quả ---
        $variantIdsToKeep = []; // Mảng chứa ID của các variant được giữ lại hoặc mới tạo

        if (!empty($validatedVariants['variants'])) {
            foreach ($validatedVariants['variants'] as $variantData) {
                // Chuẩn bị payload dữ liệu cho variant
                $attributesArray = $this->prepareAttributes($variantData['attributes'] ?? []);
                $variantPayload = [
                    'product_id' => $product->id, // Đảm bảo product_id đúng
                    'name' => $variantData['name'] ?? null,
                    'price' => $variantData['price'],
                    'quantity' => $variantData['quantity'],
                    'attributes' => !empty($attributesArray) ? $attributesArray : null,
                ];

                if (isset($variantData['id']) && $variantData['id']) {
                    // --- Cập nhật biến thể đã tồn tại ---
                    // Sử dụng updateOrCreate để đảm bảo an toàn, hoặc chỉ cần find và update
                    $variant = ProductVariant::find($variantData['id']);
                    // Chỉ cập nhật nếu variant tồn tại và thuộc về product này
                    if ($variant && $variant->product_id === $product->id) {
                         $variant->update($variantPayload);
                         $variantIdsToKeep[] = $variant->id; // Giữ lại ID này
                    }
                    // Optional: Có thể log hoặc báo lỗi nếu ID không hợp lệ
                } else {
                    // --- Tạo biến thể mới ---
                    $newVariant = ProductVariant::create($variantPayload); // Hoặc $product->variants()->create(...)
                    $variantIdsToKeep[] = $newVariant->id; // Giữ lại ID mới tạo
                }
            }
        }

        // --- Xóa các biến thể không còn tồn tại trong request ---
        // Lấy tất cả variant IDs hiện tại của sản phẩm
        $existingVariantIds = $product->variants()->pluck('id')->toArray();
        // Tìm các IDs cần xóa (có trong DB nhưng không có trong $variantIdsToKeep)
        $variantsToDeleteIds = array_diff($existingVariantIds, $variantIdsToKeep);

        if (!empty($variantsToDeleteIds)) {
            ProductVariant::destroy($variantsToDeleteIds); // Xóa các variant theo IDs
        }
        // Hoặc cách khác: $product->variants()->whereNotIn('id', $variantIdsToKeep)->delete();


        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
             // Xóa ảnh trước khi xóa sản phẩm (nếu có)
             if ($product->image) {
                 Storage::disk('public')->delete($product->image);
             }
            // Tự động xóa variants nhờ onDelete('cascade') trong migration
            $product->delete();
            return redirect()->route('admin.products.index')
                ->with('success', 'Sản phẩm đã được xóa thành công.');
                // ->with('deleted', true); // Có thể bỏ flag này nếu không dùng modal xác nhận lại
        } catch (\Exception $e) {
             // Ghi log lỗi
             \Log::error("Lỗi xóa sản phẩm ID {$product->id}: " . $e->getMessage());
            return redirect()->route('admin.products.index')
                ->with('error', 'Không thể xóa sản phẩm. Vui lòng thử lại.');
        }
    }

    /**
     * Helper function to prepare attributes array for saving.
     * Chuyển đổi từ [{key: 'k', value: 'v'}, ...] sang ['k' => 'v', ...]
     */
    private function prepareAttributes(?array $attributesInput): ?array
    {
        if (empty($attributesInput)) {
            return null;
        }

        $attributesArray = [];
        foreach ($attributesInput as $attr) {
            // Chỉ thêm nếu cả key và value đều có giá trị và không rỗng
            if (!empty($attr['key']) && !empty($attr['value'])) {
                 // Xóa khoảng trắng thừa ở key và value
                $key = trim($attr['key']);
                $value = trim($attr['value']);
                if ($key !== '' && $value !== '') {
                    $attributesArray[$key] = $value;
                }
            }
        }

        // Trả về null nếu mảng rỗng sau khi xử lý, để DB lưu JSON null thay vì {}
        return !empty($attributesArray) ? $attributesArray : null;
    }
}