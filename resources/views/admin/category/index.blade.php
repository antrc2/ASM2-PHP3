@extends('admin.layouts.app')
@section('title', "Danh mục")

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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Danh sách danh mục</h1>
        <a href="/admin/categories/create" class="btn btn-success">+ Thêm danh mục</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <span class="badge {{ $category->status ? 'bg-success' : 'bg-secondary' }}">
                            {{ $category->status == 1 ? 'Chưa xóa' : 'Đã xóa' }}
                        </span>
                    </td>
                    <td>
                        <a href="/admin/categories/edit/{{ $category->id }}" class="btn btn-sm btn-warning">Sửa</a>
                        @if ($category->status)
                        <form action="/admin/categories/delete/{{ $category->id }}" method="POST" class="d-inline">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                        @else
                        <form action="/admin/categories/undo/{{ $category->id }}" method="POST" class="d-inline">
                            @csrf
                            @method("POST")
                            <button class="btn btn-sm btn-info">Hoàn tác</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
