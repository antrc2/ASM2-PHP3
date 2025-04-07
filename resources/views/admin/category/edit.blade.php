@extends('admin.layouts.app')
@section('title')
    Danh mục
@endsection

@section('main')
    <form action="/admin/categories/update/{{$category->id}}" method="POST"> 
    @csrf
    @method("PUT")
    <div>
        <label for="category">Tên danh mục</label>
        <input type="text" name="name" id="category" value="{{$category->name}}">
        @error('name')
        <div class="text-danger"> {{$message}} </div>
        @enderror
    </div>
    <div>
        <button>Sửa</button>
    </div>
    </form>
@endsection