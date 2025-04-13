@extends('admin.layouts.app')
@section('title', "Danh mục")

@section('main')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Danh sách sản phẩm</h1>
        <a href="/admin/products/create" class="btn btn-primary">Thêm sản phẩm</a>
    </div>

    <form action="" method="GET" class="input-group mb-4 w-50">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm sản phẩm...">
        <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
    </form>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Danh mục</th>
                <th class="text-center">Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td><img src="{{ asset('storage/'.$product->image) }}" alt="" class="img-thumbnail" width="60"></td>
                <td>{{ $product->quantity }}</td>
                <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->status == 1 ? 'Chưa xóa' : 'Đã xóa' }}</td>
                <td>{{ $product->category->name }}</td>
                <td class="d-flex flex-column gap-1">
                    <a href="/admin/products/show/{{ $product->id }}" class="btn btn-sm btn-info text-white">Xem</a>
                    <a href="/admin/products/edit/{{ $product->id }}" class="btn btn-sm btn-warning">Sửa</a>
                    @if ($product->status)
                        <form action="/admin/products/delete/{{ $product->id }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-danger w-100">Xóa</button>
                        </form>
                    @else
                        <form action="/admin/products/undo/{{ $product->id }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-secondary w-100">Hoàn tác</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
