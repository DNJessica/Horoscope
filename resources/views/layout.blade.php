<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body class="text-dark" style="background: linear-gradient(white, #e0b3ff) fixed; height:100%">
    <nav style="background-color: #a31aff;" class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
        <img src="https://cdn-icons-png.flaticon.com/32/8062/8062855.png" alt="Horoscope">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a href="/" class="nav-link active" aria-current="page">Home</a>
            </li>
            </ul>
            @if(session()->has('user_id'))
                <form class="d-flex" role="search">
                <a href="logout" class="btn btn-outline-light" type="submit">Log out</a>
                </form>
            @else
                <form class="d-flex" role="search">
                <a href="login" class="btn btn-outline-light" type="submit">Log in</a>
                </form>
            @endif    
        </div>
        </div>
    </nav>
    <div class="container">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        @yield('content')
    </div>
</body>
</html>
