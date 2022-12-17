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
            }
            .footer {
                margin-top: auto;
            }
            @yiegitld('css');
            @yield('css');
        </style>
    </head>
    <body>
        <nav class="navbar bg-light border-bottom border-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="{{ asset('img/logo/bem-kema2.png') }}" class="navbar-brand" width="40px" alt="Logo"> Satu Data Padjadjaran</a>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarAdmin" aria-labelledby="navbarAdminLabel">
                    <div class="offcanvas-header">
                        <p class="fs-3 fw-bold offcanvas-title text-center" id="navbarAdminLabel">Dashboard Admin</p>
                        <button type="button" class="btn" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-circle-xmark"></i></button>
                    </div>
                    <div class="offcanvas-body d-flex flex-column border-top border-dark">
                        <div class="d-grid col-12">
                            <a href="{{ route('home') }}" class="p-2 fw-normal fs-5 nav-link text-start">Beranda</a>
                        </div>
                        <div class="d-grid col-12">
                            <a href="{{ route('katalog.home') }}" class="p-2 fw-normal fs-5 nav-link text-start">Katalog Data</a>
                        </div>
                        <div class="d-grid col-12">
                            <a class="p-2 fw-normal fs-5 nav-link text-start btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#AdminDashboardCollapse" aria-expanded="false" aria-controls="AdminDashboardCollapse">
                                Dashboard Admin
                            </a>
                            <div class="container collapse" id="AdminDashboardCollapse">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ route('admin.home') }}" class="nav-link">Homepage Admin</a></li>
                                    <li class="list-group-item"><a href="{{ route('home') }}" class="nav-link">User Database</a></li>
                                    <li class="list-group-item"><a href="{{ route('home') }}" class="nav-link">Data Catalogue</a></li>
                                    <li class="list-group-item"><a href="{{ route('home') }}" class="nav-link">Feedback Database</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-grid col-12">
                            <a href="{{ route('about') }}" class="p-2 fw-normal fs-5 nav-link text-start">About</a>
                        </div>
                        <!-- <div class="mb-auto">
                            <ul class="list-unstyled">
                                <li>
                                    <button class="btn btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#AdminHomeCollapse" aria-expanded="false" aria-controls="AdminHomeCollapse">
                                        <i class="fa-solid fa-house-chimney"></i> Home
                                    </button>
                                    <div class="container collapse" id="AdminHomeCollapse">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a href="{{ url('home') }}" class="nav-link">Beranda</a></li>
                                            <li class="list-group-item"><a href="{{ url('home') }}" class="nav-link">Katalog Data</a></li>
                                            <li class="list-group-item"><a href="{{ url('about') }}" class="nav-link">About</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <button class="btn btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#AdminDataCollapse" aria-expanded="false" aria-controls="AdminDataCollapse">
                                        <i class="fa-solid fa-border-all"></i> Katalog Data
                                    </button>
                                    <div class="container collapse" id="AdminDataCollapse">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a href="{{ url('home') }}" class="nav-link">Beranda</a></li>
                                            <li class="list-group-item"><a href="{{ url('home') }}" class="nav-link">Beranda</a></li>
                                            <li class="list-group-item"><a href="{{ url('home') }}" class="nav-link">Beranda</a></li>
                                            <li class="list-group-item"><a href="{{ url('home') }}" class="nav-link">Beranda</a></li>
                                            <li class="list-group-item"><a href="{{ url('home') }}" class="nav-link">Beranda</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <button class="btn btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#AdminDashboardCollapse" aria-expanded="false" aria-controls="AdminDashboardCollapse">
                                        <i class="fa-solid fa-sliders"></i></i> Dasboard Admin
                                    </button>
                                    <div class="container collapse" id="AdminDashboardCollapse">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a href="{{ url('home') }}" class="nav-link">User Database</a></li>
                                            <li class="list-group-item"><a href="{{ url('home') }}" class="nav-link">Data Catalogue</a></li>
                                            <li class="list-group-item"><a href="{{ url('home') }}" class="nav-link">Feedback Database</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                        <div class="mt-auto dropup border-top border-secondary p-2">
                            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/img/profile/{{ Auth::user()->image }}" alt="" width="32" height="32" class="rounded-circle me-2">
                                <strong>{{ Auth::user()->name }}</strong>
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownProfile">
                                <li><a class="dropdown-item" href="/profile/edit/{{ Auth::user()->id}}">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('home') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Sign Out') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
            <!-- Sudah Login -->
           
                <!-- <div class="nav-item justify-content-end dropdown text-center">
                    <a id="profileDropdown" class="nav-item nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="/profile/edit/{{ Auth::user()->id}}">Profile</a>
                        @if(Auth::user()->role == 1)
                        <a class="dropdown-item" href="/admin/home">Admin Dashboard</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('home') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div> -->
        <main>
            <div class="container-fluid p-3">
                @yield('content')
            </div>
        </main>
    </body>
</html>