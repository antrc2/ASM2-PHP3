<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <?php 
                    use App\Models\Category;
                    $categories = Category::all();    
                ?>
                @foreach ($categories as $category)
                <li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </nav>
    </header>
    <main>@yield('main')</main>
    <footer></footer>
</body>
</html>