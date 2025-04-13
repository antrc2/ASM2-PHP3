@extends('user.layouts.app')
@section('title', 'Chi tiết sản phẩm')
@section('main')
<div >
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">Mã sản phẩm: #{{ $product->id }}</p>
            <p><strong>Giá: </strong>{{ number_format($product->price, 0, ',', '.') }} VND</p>
            <p><strong>Số lượng còn lại: </strong>{{ $product->quantity }}</p>
            <p><strong>Mô tả:</strong></p>
            <p>{{ $product->description }}</p>
            
            <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-primary">Thêm vào giỏ hàng</a>
                <a href="#" class="btn btn-success">Mua ngay</a>
            </div>
        </div>
    </div>
</div>
@endsection
