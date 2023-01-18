<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>

        <!-- Scripts -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c3c1353c4c.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/logo/bem-kema2.png') }}">
        <link rel="manifest" href="/site.webmanifest">

        <style>
            body {
                min-height: 100vh;
                background-color: #EEEFF7;
            }
            .footer {
                margin-top: auto;
            }
            .navbarcustom {
                background-color: #24284D;
            }
            @yiegitld('css');
            @yield('css');
        </style>
    </head>
    <body>
        @include('sweetalert::alert')
        <nav class="navbar navbarcustom sticky-top border-bottom border-dark">
            <div class="container-fluid">
                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand text-light" href="#"><img src="{{ asset('img/logo/bem-kema2.png') }}" width="40px" alt="Logo"> Satu Data Padjadjaran</a>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarAdmin" aria-labelledby="navbarAdminLabel">
                    <div class="offcanvas-header">
                        <p class="fs-3 fw-bold offcanvas-title text-center" id="navbarAdminLabel">Dashboard Admin</p>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-flex flex-column border-top border-dark">
                        <div class="d-grid col-12">
                            <a href="{{ route('home') }}" class="p-2 fw-normal fs-5 nav-link text-start">Beranda</a>
                        </div>
                        <div class="d-grid col-12">
                            <a href="{{ route('katalog.home') }}" class="p-2 fw-normal fs-5 nav-link text-start">Katalog Data</a>
                        </div>
                        <div class="d-grid col-12">
                            <a href="{{ route('admin.home') }}" class="p-2 fw-normal fs-5 nav-link text-start">Dashboard Admin</a>
                        </div>
                        <div class="d-grid col-12">
                            <a href="{{ route('about') }}" class="p-2 fw-normal fs-5 nav-link text-start">About</a>
                        </div>
                        <div class="mt-auto dropup border-top border-secondary p-2 fw-normal fs-5">
                            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(Auth::user()->image == NULL)
                                    <img src="{{ asset('img/profile.jpg') }}" width="64" height="64" alt="Foto Profil {{ Auth::user()->name }}"  class="img-thumbnail rounded-circle me-2">
                                @else
                                    <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . Auth::user()->image) }}" height="64" width="64" alt="Foto Profil {{ Auth::user()->name }}" class="img-thumbnail rounded-circle me-2">
                                @endif
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownProfile">
                                <li><a class="dropdown-item" href="/profile/{{ Auth::user()->npm}}">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('home') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Sign Out') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </body>
</html>