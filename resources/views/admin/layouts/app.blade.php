<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Trang quản trị - @yield('title')</title>
    <link rel="shortcut icon" href="/storage/page/logo.png"  type="image/x-icon">
</head>
<body>
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

    <!-- Header sử dụng Bootstrap -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Trang chủ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarAdmin">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/dashboard">Trang quản trị</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/categories">Quản lí danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/products">Quản lí sản phẩm</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main content -->
    <main class="container mt-4">
        @yield('main')
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-4">
        <p class="mb-0">© 2025 Trang quản trị</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
