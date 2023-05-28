<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Ordering Website</title>
    
    <!-- CSS link -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Font Awesome -->
    <!-- Search icons from https://fontawesome.com/v4/icons/ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="brand" href="/">All Your Healthy Foods</a>
            <div class="collapse navbar-collapse justify-content-end px-5" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link navbar-item-link" href="/cart"><i class="fa fa-shopping-cart mx-2" aria-hidden="true"></i>Cart ({{Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})</a>
                    </li>
                    @auth
                        <li class="dropdown my-2">
                            <a class="dropdown-toggle navbar-item-link" data-toggle="dropdown" href="#">Welcome {{auth()->user()->name}}
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-center">
                                <li><a href="#" class="nav-link navbar-item-link text-center">View Profile</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mx-1">
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="nav-link navbar-item-link text-center" type="submit">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>Sign Out
                                </button>
                            </form>                        
                        </li>
                    @else
                        <li class="nav-item mx-2">
                            <a class="nav-link navbar-item-link" href="/register"><i class="fa fa-user-plus mx-2"></i>Register</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link navbar-item-link" href="/login"><i class="fa fa-sign-in mx-1"></i>Sign In</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        {{$slot}}
    </main>

    <footer class="bg-light p-3 mt-5">
        <p class="text-center">Copyright © 2023 All Your Healthy Foods.
        All Rights Reserved.</p>
    </footer>

    <!-- Display successful or failed message using popup-message component -->
    <x-popup-message/>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body

