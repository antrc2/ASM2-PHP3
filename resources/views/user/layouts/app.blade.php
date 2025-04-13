<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/storage/page/logo.png"  type="image/x-icon">
</head>
<body class="container ">
    <?php 
    use App\Models\Category;
    use Illuminate\Support\Facades\Auth;
    $categories = Category::where("status",1)->get();    
?>
@if (session('success'))
<script>
    Swal.fire({
text: "{{ session('success') }}",
title: "@yield('title')",
icon: "success"
});
</script>
@elseif (session('error'))
<script>
    Swal.fire({
text: "{{ session('error') }}",
title: "@yield('title')",
icon: "error"
});
</script>
@endif
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand text-white d-flex align-items-center" href="/">
                <img class="rounded-circle" width="50px" src="/storage/page/logo.png" alt="Logo">
                
            </a>
            
            <!-- Toggler Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Danh mục -->
                    @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/category/{{$category->id}}">{{$category->name}}</a>
                    </li>
                    @endforeach
                </ul>
                
                <!-- Đăng nhập -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (Auth::user())
                    @if (Auth::user()->role_id == 2)
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/admin/dashboard">Trang quản trị</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/logout">Đăng xuất</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('login')}}">Đăng nhập</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

    
    
    <main >@yield('main')</main>
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <!-- Cột thông tin -->
                <div class="col-md-4">
                    <h5 class="mb-3">Về chúng tôi</h5>
                    <p>Chúng tôi cung cấp các sản phẩm chất lượng với giá cả hợp lý. Cam kết mang lại trải nghiệm tốt nhất cho khách hàng.</p>
                </div>
    
                <!-- Cột liên hệ -->
                <div class="col-md-4">
                    <h5 class="mb-3">Liên hệ</h5>
                    <ul class="list-unstyled">
                        <li>Email: info@example.com</li>
                        <li>Điện thoại: (123) 456-7890</li>
                        <li>Địa chỉ: 123 Đường ABC, Thành phố XYZ</li>
                    </ul>
                </div>
    
                <!-- Cột kết nối mạng xã hội -->
                <div class="col-md-4">
                    <h5 class="mb-3">Kết nối với chúng tôi</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Facebook</a></li>
                        <li><a href="#" class="text-white">Instagram</a></li>
                        <li><a href="#" class="text-white">Twitter</a></li>
                        <li><a href="#" class="text-white">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
    
            <!-- Bản quyền -->
            <div class="text-center mt-4">
                <p class="mb-0">© 2025 Công ty XYZ. Mọi quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>