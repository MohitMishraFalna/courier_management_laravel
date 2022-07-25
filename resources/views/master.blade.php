<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ url(asset('assest/bootstrap/css/bootstrap.min.css')) }}">
        <link rel="stylesheet" href="{{ url(asset('assest/fontawesome/css/all.css')) }}">
        <link rel="stylesheet" href="{{ url(asset('css/style.css')) }}">      
        <style>
            .item_title{
                font-size: 18px;
                font-weight: 500;
                border-top: 1px dashed;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light navbgclr ">
            <a class="navbar-brand" href="#" style="color: lightskyblue;">CMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('workbanch') }}" style="color: lightskyblue;"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: lightskyblue;" href="{{ url('showbranchdetails') }}">Branch</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}" style="color: lightskyblue;"><i class="fas fa-user"></i> Login</a>
                    </li>
                </ul>
                <div class="d-flex justify-content-right">
                    <a class="nav-link" href="#" style="color: lightskyblue;">Forgat Password</a>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('body')
            @yield('js')
        </div>        
        <script src="{{ url(asset('assest/fontawesome/js/all.js')) }}"></script>
        <script src="{{ url(asset('assest/bootstrap/js/jquery.js')) }}"></script>
        <script src="{{ url(asset('assest/bootstrap/js/bootstrap.bundle.js')) }}"></script>
        <script src="{{ url(asset('assest/bootstrap/js/bootstrap.min.js')) }}"></script>
    </body>
</html>