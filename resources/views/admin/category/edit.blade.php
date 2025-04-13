@extends('admin.layouts.app')
@section('title')
    Danh mục
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <h4>Chỉnh sửa danh mục</h4>
    </div>
    <div class="card-body">
        <form action="/admin/categories/update/{{$category->id}}" method="POST"> 
            @csrf
            @method("PUT")

            <div class="mb-3">
                <label for="category" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       name="name" id="category" value="{{$category->name}}">

                @error('name')
                <div class="invalid-feedback"> {{$message}} </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
</div>
@endsection
