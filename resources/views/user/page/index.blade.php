@extends('user.layouts.app')
@section('title', 'Trang chủ')
@section('main')
<div>
    <h1 class="mb-4">Danh sách sản phẩm</h1>
    <form action="" method="GET" class="">
        <div class="d-flex justify-content-end form-control">
            <input type="text" name="name" class="form-label" placeholder="Tìm kiếm">
            <select name="price" class="form-label ms-2">
                <option value="">Chọn giá</option>
                <option value="500000">Dưới 500K</option>
                <option value="1000000">Từ 500K đến 1 triệu</option>
                <option value="1500000">Từ 1 triệu đến 1 triệu 5</option>
                <option value="over_1500000">Trên 1 triệu 5</option>
            </select>
            <button class="btn btn-success">Tìm kiếm</button>
        </div>
    </form>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <a href="/product/{{$product->id}}" class="text-decoration-none text-dark">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Giá: {{ number_format($product->price, 0, ',', '.') }} VND</p>
                        <p class="card-text">Số lượng: {{ $product->quantity }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <!-- Hiển thị phân trang -->
    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
