<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Trang quản trị - @yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/admin/dashboard">Trang quản trị</a></li>
                <li><a href="/admin/categories">Quản lí danh mục</a></li>
                <li><a href="/admin/products">Quản lí sản phẩn</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('main')
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>