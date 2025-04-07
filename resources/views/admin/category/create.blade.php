@extends('admin.layouts.app')
@section('title')
    Danh mục
@endsection

@section('main')
    <form action="/admin/categories/store" method="POST"> 
    @csrf
    @method("POST")
    <div>
        <label for="category">Tên danh mục</label>
        <input type="text" name="name" id="category">
        @error('name')
        <div class="text-danger"> {{$message}} </div>
        @enderror
    </div>
    <div>
        <button>Thêm</button>
    </div>
    </form>
@endsection