@extends('admin.layouts.app')
@section('title',"Danh mục")


@section('main')
    <form action="/admin/products/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div>
            <label for="name">Tên</label>
            <input type="text" name="name" id="name" value="{{$product->name}}">
            @error('name')
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="price">Giá</label>
            <input type="number" name="price" id="price" value="{{$product->price}}">
            @error('price')
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="quantity">Số lượng</label>
            <input type="number" name="quantity" id="quantity" value="{{$product->quantity}}">
            @error('quantity')
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="image">Ảnh</label>
            <input type="file" name="image" id="image" value="{{$product->image}}">
            @error("image")
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="description">Mô tả</label>
            <input type="text" name="description" id="description" value="{{$product->description}}">
            @error('description')
            <div>
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id">
                
                @foreach ($categories as $category)
                <option   {{$product->category_id == $category->id ? "selected" : ""}}   value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button>Sửa</button>
        </div>
    </form>
@endsection