<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}} | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"  crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .btn-primary{
            background: #95A936;
            border: 1px solid #95A936;
        }
        .custom-circle{
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ccc;
        }
        .btn-custom{
            color: #fff;
            background-color: #95A936;
            border-color: #95A936;
            font-size: 14px;
            border-bottom: 3px solid #95A936;
            min-width: 100px;
            border-radius: 0px;
        }
        .card{
            border: 1px solid #cccccc;
            padding: 10px;
            box-shadow: 1px 2px #cdcdcd;
            border-radius: 0px;
        }
        .card-title{
            font-family: 'Roboto Condensed', sans-serif;
            text-transform: uppercase;
            color: #192E42;
            font-weight: 900;
        }
        .custom-badge{
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0px 10px 10px 0px;
            color: #fff;
            background-color: #28a745;

        }

    </style>
    @livewireStyles
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light container">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://forxtreme.com/img/logo.svg" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('products')}}">Products</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Settings
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('colors')}}">Color</a></li>
                        <li><a class="dropdown-item" href="{{route('sizes')}}">Size</a></li>
                        <li><a class="dropdown-item" href="{{route('categories')}}">Category</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

   @yield('main-content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
<script src="//unpkg.com/alpinejs" defer></script>
@livewireScripts
</body>
</html>
