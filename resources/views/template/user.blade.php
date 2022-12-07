<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Satu Data Padjadjaran</title>

        <!-- Scripts -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c3c1353c4c.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/logo/bem-kema2.png') }}">
        <link rel="manifest" href="/site.webmanifest">

        <style>
            .login-button{
                position: relative;
            }
            body {
                min-height: 100vh;
            }
            .footer {
                margin-top: auto;
            }
            @yiegitld('css');
            @yield('css');
        </style>
        <script>
            
        </script>
    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-lg bg-light border border-bottom-1">
            <div class="container-fluid align-items-center">
                <img src="{{ asset('img/logo/bem-kema2.png') }}" class="navbar-brand" width="42" alt="Logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbar">
                    <ul class="navbar-nav text-end p-2">
                        <li class="nav-item">
                            <a class="nav-link fs-5 fw-normal" aria-current="page" href="/">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link fs-5 dropdown-toggle fw-normal" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page" href="#">Katalog Data</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Katalog 1</a></li>
                                <li><a class="dropdown-item" href="#">Katalog 2</a></li>
                                <li><a class="dropdown-item" href="#">Katalog 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 fw-normal" aria-current="page" href="{{ route('about') }}">About</a>
                        </li>
                    </ul>
                    @guest
                        <!-- Belum Login -->
                        @if (Route::has('login'))
                            <div class="nav justify-content-end dropdown text-center">
                                <button type="button" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">Log In</button>
                                <form method="POST" action="{{ route('login') }}" class="dropdown-menu p-4 dropdown-menu-end" style="width: 300px;">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="npm" class="form-label">Nomor Pokok Mahasiswa</label>
                                        <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm" placeholder="140810XX00XX" required autofocus>
                                        @error('npm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <hr class="dropdown-divider">
                                    <div class="mb-3">
                                        <a href="#" class="text-danger nav-link">Lupa Password</a>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a class="btn btn-warning" href="{{ route('register') }}" role="button">{{ __('Buat Akun') }}</a>
                                        <button type="submit" class="btn btn-primary">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        @endif

                        <!-- Sudah Login -->
                        @else
                            <div class="nav justify-content-end dropdown text-center">
                                <a href="#" class="nav-item nav-link d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                    <img src="/img/profile/{{ Auth::user()->image }}" alt="" width="42" height="42" class="rounded-circle me-2">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown" style="width: 250px;">
                                    <span class="dropdown-item disabled text-center"><img src="/img/profile/{{ Auth::user()->image }}" height="72" width="72" alt="" class="rounded-circle me-2"></span>
                                    <strong class="dropdown-item fw-bold disabled text-dark text-center">{{ Auth::user()->name}}</strong>
                                    <hr>
                                    <a class="dropdown-item" href="/profile/edit/{{ Auth::user()->id}}">Profile</a>
                                    @if(Auth::user()->role == 1)
                                    <a class="dropdown-item" href="/admin/home">Admin Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('home') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Sign Out') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                    @endguest
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
        <!-- START FOOTER -->
        <div class="container-fluid bg-light">
            <div class="container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted text-center">© 2022 BEM KEMA Universitas Padjadjaran</p>
                <div class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto">
                    <a href="https://kema.unpad.ac.id/" target="_blank"><img src="{{ asset('img/logo/bem-kema2.png') }}" width="40" alt="BEM Kema"></a>
                    <a href="https://unpad.ac.id/" target="_blank"><img src="{{ asset('img/logo/logo-unpad.png') }}" width="40" alt="Unpad"></a>
                </div>
                <ul class="nav col-md-4 justify-content-end text-center">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2 text-muted">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link px-2 text-muted">About</a></li>
                </ul>
            </div>
        </div>
        <!-- END FOOTER -->
        <script>
            @yield('scripts');
        </script>
    </body>
</html>