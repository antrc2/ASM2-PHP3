@extends('admin.layouts.app')
@section('title')
    Danh mục
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <h4>Thêm danh mục mới</h4>
    </div>
    <div class="card-body">
        <form action="/admin/categories/store" method="POST"> 
            @csrf
            @method("POST")

            <div class="mb-3">
                <label for="category" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       name="name" id="category" placeholder="Nhập tên danh mục">

                @error('name')
                <div class="invalid-feedback"> {{$message}} </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Thêm</button>
        </form>
    </div>
</div>
@endsection
