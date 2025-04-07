@extends('admin.layouts.app')
@section('title',"Danh mục")


@section('main')
    <h1>Chi tiết sản phẩm</h1>
    <div>
        <h2> {{$product->name}} </h2>
        <img src="{{asset('storage/'.$product->image)}}" alt="">
        <p>Giá: {{$product->price}} </p>
        <p>Số lượng:  {{$product->quantity}} </p>
        <p>Mô tả: {{$product->description}} </p>
        <p>Ngày tạo: {{$product->created_at}} </p>
        <p>Ngày sửa: {{$product->updated_at}} </p>

    </div>
@endsection