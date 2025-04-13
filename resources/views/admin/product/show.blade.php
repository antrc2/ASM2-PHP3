@extends('admin.layouts.app')
@section('title', "Danh mục")

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Chi tiết sản phẩm</h1>
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">{{ $product->name }}</h2>
        </div>
        <div class="card-body">
            <div class="mb-3 text-center">
                <img src="{{ asset('storage/' . $product->image) }}" alt="Ảnh sản phẩm" class="img-fluid rounded" style="max-height: 300px;">
            </div>
            <p><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
            <p><strong>Số lượng:</strong> {{ $product->quantity }}</p>
            <p><strong>Mô tả:</strong> {{ $product->description }}</p>
            <p><strong>Ngày tạo:</strong> {{ $product->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Ngày sửa:</strong> {{ $product->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
