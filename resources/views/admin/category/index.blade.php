@extends('admin.layouts.app')
@section('title',"Danh mục")


@section('main')
    @if (session('success'))
    <script>
        Swal.fire({
    text: "{{ session('success') }}",
    title: "Danh mục",
    icon: "success"
    });
    </script>
    @elseif (session('error'))
    <script>
        Swal.fire({
    text: "{{ session('error') }}",
    title: "Danh mục",
    icon: "error"
    });
    </script>
    @endif
    <a href="/admin/categories/create">Thêm danh mục</a>
    <h1>Danh sách danh mục</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Trạng thái</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td> {{ $category->status == 1 ? "Chưa xóa" : "Đã xóa" }} </td>
                    <td>
                        <a href="/admin/categories/edit/{{$category->id}}">Sửa</a>
                        @if ($category->status)
                            <form action="/admin/categories/delete/{{$category->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button>Xóa</button>
                            </form>    
                        @else 
                            <form action="/admin/categories/undo/{{$category->id}}" method="POST">
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
@endsection