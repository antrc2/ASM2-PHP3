@extends('admin.layouts.app')
@section('title',"Danh mục")


@section('main')
    <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <div>
            <label for="name">Tên</label>
            <input type="text" name="name" id="name">
            @error('name')
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="price">Giá</label>
            <input type="number" name="price" id="price">
            @error('price')
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="quantity">Số lượng</label>
            <input type="number" name="quantity" id="quantity">
            @error('quantity')
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="image">Ảnh</label>
            <input type="file" name="image" id="image">
            @error("image")
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="description">Mô tả</label>
            <input type="text" name="description" id="description">
            @error('description')
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id">
                <option value="">Chọn danh mục</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button>Thêm</button>
        </div>
    </form>
@endsection