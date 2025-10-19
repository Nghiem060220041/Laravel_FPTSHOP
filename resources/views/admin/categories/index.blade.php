<div class="container" style="padding: 2rem;">
    <h1>Danh Sách Danh Mục</h1>
    <a href="{{ route('categories.create') }}" style="display: inline-block; padding: 10px 15px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">Thêm Danh Mục Mới</a>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">ID</th>
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">Tên Danh Mục</th>
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">Slug</th>
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $category->id }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $category->name }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $category->slug }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; display: flex; align-items: center; gap: 10px;">
                        
                        <a href="{{ route('categories.edit', $category->id) }}">Sửa</a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0;">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 10px;">Chưa có danh mục nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 20px;">
        {{ $categories->links() }}
    </div>
</div>