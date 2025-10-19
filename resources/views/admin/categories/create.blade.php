<div class="container" style="padding: 2rem; max-width: 800px; margin: auto;">
    <h1>Thêm Danh Mục Mới</h1>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">
            <strong>Có lỗi xảy ra! Vui lòng kiểm tra lại.</strong>
            <ul style="margin-top: 10px; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Tên Danh Mục</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('name')
                <p style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" style="padding: 10px 20px; background-color: #0d6efd; color: white; border: none; border-radius: 5px; cursor: pointer;">Lưu Danh Mục</button>
    </form>
</div>