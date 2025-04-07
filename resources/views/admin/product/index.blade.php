@extends('admin.layouts.app')
@section('title',"Danh mục")


@section('main')
    @if (session('success'))
    <script>
        Swal.fire({
    text: "{{ session('success') }}",
    title: "Sản phẩm",
    icon: "success"
    });
    </script>
    @elseif (session('error'))
    <script>
        Swal.fire({
    text: "{{ session('error') }}",
    title: "Sản phẩm",
    icon: "error"
    });
    </script>
    @endif
    <a href="/admin/products/create">Thêm sản phẩm</a>
    <h1>Danh sách sản phẩm</h1>
    <form action="">
        <input type="text" name="search">
        <button>Tìm kiếm</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Danh mục</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td> {{$product->id}} </td>
                    <td> {{$product->name}} </td>
                    <td> <img width="60px" src="{{ asset('storage/'.$product->image) }} " alt=""></td>
                    <td> {{$product->quantity}} </td>
                    <td> {{$product->price}} </td>
                    <td> {{$product->description}} </td>
                    <td> {{ $product->status == 1 ? "Chưa xóa" : "Đã xóa" }} </td>
                    <td> {{$product->category->name}} </td>
                    <td>
                        <a href="/admin/products/show/{{$product->id}}">Xem</a>
                        <a href="/admin/products/edit/{{$product->id}}">Sửa</a>
                        @if ($product->status)
                            <form action="/admin/products/delete/{{$product->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button>Xóa</button>
                            </form>
                        @else
                            <form action="/admin/products/undo/{{$product->id}}" method="POST">
                            @csrf
                            @method("POST")
                            <button>Hoàn tác</button>
                            </form>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->links()}}
@endsection