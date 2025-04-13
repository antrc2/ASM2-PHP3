@extends('admin.layouts.app')
@section('title',"Danh mục")

@section('main')
<div class="card">
    <div class="card-header">
        <h4>Cập nhật sản phẩm</h4>
    </div>
    <div class="card-body">
        <form action="/admin/products/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" id="name"
                       value="{{$product->name}}" class="form-control">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" name="price" id="price"
                       value="{{$product->price}}" class="form-control">
                @error('price')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" name="quantity" id="quantity"
                       value="{{$product->quantity}}" class="form-control">
                @error('quantity')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ảnh sản phẩm</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                <div class="text-danger">{{$message}}</div>
                @enderror

                @if ($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="Ảnh hiện tại" width="150">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" id="description" class="form-control"
                          rows="3">{{$product->description}}</textarea>
                @error('description')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                            {{$product->category_id == $category->id ? 'selected' : ''}}>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Sửa</button>
        </form>
    </div>
</div>
@endsection
