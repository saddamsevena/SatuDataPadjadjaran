<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>

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
                background-color: #EEEFF7;
            }
            .footer {
                margin-top: auto;
            }
            .navbarcustom {
                background-color: #24284D;
            }
            .font-montserrat {
                font-family: "Montserrat", Sans-serif;
                vertical-align: baseline;
            }
            @yiegitld('css');
            @yield('css');
        </style>
        <script>
            
        </script>
    </head>
    <body class="d-flex flex-column">
        <nav class="navbar navbarcustom sticky-top navbar-expand-lg">
            <div class="container-fluid align-items-center">
                <a href="{{ route('home') }}" class="navbar-brand"><img src="{{ asset('img/logo/bem-kema2.png') }}" width="42" alt="Logo"></a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbar">
                    <ul class="navbar-nav text-end p-2">
                        <li class="nav-item mx-3">
                            <a class="nav-link fs-5 fw-normal text-light" aria-current="page" href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="nav-item mx-3 dropdown">
                            <a class="nav-link fs-5 fw-normal text-light" aria-current="page" href="{{ route('katalog.home') }}">Katalog Data</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link fs-5 fw-normal text-light" aria-current="page" href="{{ route('about') }}">About</a>
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
                                <a href="#" class="nav-item nav-link d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                    @if(Auth::user()->image == NULL)
                                    <img src="{{ asset('img/profile.jpg') }}" alt="Foto Profil {{ Auth::user()->name }}" width="42" height="42" class="rounded-circle me-2">
                                    @else
                                    <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . Auth::user()->image) }}" alt="Foto Profil {{ Auth::user()->name }}" width="42" height="42" class="rounded-circle me-2">
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown" style="width: 250px;">
                                    @if(Auth::user()->image == NULL)
                                        <img src="{{ asset('img/profile.jpg') }}" width="64" height="64" alt="Foto Profil {{ Auth::user()->name }}"  class="rounded-circle mx-auto d-block">
                                    @else
                                        <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . Auth::user()->image) }}" height="64" width="64" alt="Foto Profil {{ Auth::user()->name }}" class="rounded-circle mx-auto d-block">
                                    @endif
                                    <strong class="dropdown-item fw-bold disabled text-dark text-center">{{ Auth::user()->name}}</strong>
                                    <hr>
                                    <a class="dropdown-item" href="/profile/{{ Auth::user()->npm}}">Profile</a>
                                    @if(Auth::user()->role == 1)
                                        <a class="dropdown-item" href="{{ route('admin.home') }}">Admin Dashboard</a>
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
            @include('sweetalert::alert')
            <!-- Button Modal Feedback -->
            <button type="button" class="btn position-fixed bottom-50 start-0 mx-0 my-0 px-0 py-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                <span>
                    <svg width="40" height="150" viewBox="0 0 40 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M35 0C37.7614 0 40 2.23858 40 5L40 145C40 147.761 37.7614 150 35 150H0L0 0L35 0Z" fill="#1C213C"/>
                        <path d="M13 45.7614H27.5455V54.483H25.983V47.5227H21.0682V53.8295H19.5057V47.5227H13V45.7614ZM12.7727 61.0455C12.7727 59.9943 13.0047 59.0876 13.4687 58.3253C13.9375 57.5677 14.5909 56.983 15.429 56.571C16.2718 56.1638 17.2519 55.9602 18.3693 55.9602C19.4867 55.9602 20.4716 56.1638 21.3239 56.571C22.1809 56.983 22.8485 57.5559 23.3267 58.2898C23.8097 59.0284 24.0511 59.8902 24.0511 60.875C24.0511 61.4432 23.9564 62.0043 23.767 62.5582C23.5777 63.1122 23.2699 63.6165 22.8437 64.071C22.4223 64.5256 21.8636 64.8878 21.1676 65.1577C20.4716 65.4276 19.6146 65.5625 18.5966 65.5625H17.8864L17.8864 57.1534H19.3352L19.3352 63.858C19.9508 63.858 20.5 63.7348 20.983 63.4886C21.4659 63.2472 21.8471 62.9015 22.1264 62.4517C22.4058 62.0066 22.5455 61.4811 22.5455 60.875C22.5455 60.2074 22.3797 59.6297 22.0483 59.142C21.7216 58.6591 21.2955 58.2874 20.7699 58.027C20.2443 57.7666 19.6809 57.6364 19.0795 57.6364H18.1136C17.2898 57.6364 16.5914 57.7784 16.0185 58.0625C15.4503 58.3513 15.017 58.7514 14.7187 59.2628C14.4252 59.7741 14.2784 60.3684 14.2784 61.0455C14.2784 61.4858 14.34 61.8835 14.4631 62.2386C14.5909 62.5985 14.7803 62.9086 15.0312 63.169C15.2869 63.4295 15.6042 63.6307 15.983 63.7727L15.5284 65.392C14.9792 65.2216 14.4962 64.9351 14.0795 64.5327C13.6676 64.1302 13.3456 63.633 13.1136 63.0412C12.8864 62.4493 12.7727 61.7841 12.7727 61.0455ZM12.7727 72.6861C12.7727 71.6349 13.0047 70.7282 13.4687 69.9659C13.9375 69.2083 14.5909 68.6236 15.429 68.2116C16.2718 67.8045 17.2519 67.6009 18.3693 67.6009C19.4867 67.6009 20.4716 67.8045 21.3239 68.2116C22.1809 68.6236 22.8485 69.1965 23.3267 69.9304C23.8097 70.669 24.0511 71.5308 24.0511 72.5156C24.0511 73.0838 23.9564 73.6449 23.767 74.1989C23.5777 74.7528 23.2699 75.2571 22.8437 75.7116C22.4223 76.1662 21.8636 76.5284 21.1676 76.7983C20.4716 77.0682 19.6146 77.2031 18.5966 77.2031H17.8864V68.794H19.3352V75.4986C19.9508 75.4986 20.5 75.3755 20.983 75.1293C21.4659 74.8878 21.8471 74.5421 22.1264 74.0923C22.4058 73.6473 22.5455 73.1217 22.5455 72.5156C22.5455 71.848 22.3797 71.2704 22.0483 70.7827C21.7216 70.2997 21.2955 69.928 20.7699 69.6676C20.2443 69.4072 19.6809 69.277 19.0795 69.277H18.1136C17.2898 69.277 16.5914 69.419 16.0185 69.7031C15.4503 69.992 15.017 70.392 14.7187 70.9034C14.4252 71.4148 14.2784 72.009 14.2784 72.6861C14.2784 73.1264 14.34 73.5241 14.4631 73.8793C14.5909 74.2391 14.7803 74.5492 15.0312 74.8097C15.2869 75.0701 15.6042 75.2713 15.983 75.4134L15.5284 77.0327C14.9792 76.8622 14.4962 76.5758 14.0795 76.1733C13.6676 75.7708 13.3456 75.2737 13.1136 74.6818C12.8864 74.09 12.7727 73.4247 12.7727 72.6861ZM12.7727 83.8722C12.7727 82.9631 13.0024 82.1605 13.4616 81.4645C13.9257 80.7685 14.5791 80.224 15.4219 79.831C16.2694 79.438 17.2708 79.2415 18.4261 79.2415C19.572 79.2415 20.5663 79.438 21.4091 79.831C22.2519 80.224 22.9029 80.7708 23.3622 81.4716C23.8215 82.1723 24.0511 82.982 24.0511 83.9006C24.0511 84.6108 23.9328 85.1719 23.696 85.5838C23.464 86.0005 23.1989 86.3177 22.9006 86.5355C22.607 86.758 22.3655 86.9309 22.1761 87.054V87.196H27.5455V88.8722H13V87.2528H14.6761V87.054C14.4773 86.9309 14.2263 86.7557 13.9233 86.5284C13.625 86.3011 13.3575 85.9768 13.1207 85.5554C12.8887 85.134 12.7727 84.5729 12.7727 83.8722ZM14.2784 84.0994C14.2784 84.7718 14.4536 85.34 14.804 85.804C15.1591 86.268 15.6491 86.6207 16.2741 86.8622C16.9039 87.1037 17.6307 87.2244 18.4545 87.2244C19.2689 87.2244 19.9815 87.1061 20.5923 86.8693C21.2079 86.6326 21.6861 86.2822 22.027 85.8182C22.3726 85.3542 22.5455 84.7813 22.5455 84.0994C22.5455 83.3892 22.3632 82.7973 21.9986 82.3239C21.6387 81.8551 21.1487 81.5024 20.5284 81.2656C19.9129 81.0336 19.2216 80.9176 18.4545 80.9176C17.678 80.9176 16.9725 81.036 16.3381 81.2727C15.7083 81.5142 15.2064 81.8693 14.8324 82.3381C14.4631 82.8116 14.2784 83.3987 14.2784 84.0994ZM13 92.402H27.5455V94.0781H22.1761V94.2202C22.3655 94.3433 22.607 94.5137 22.9006 94.7315C23.1989 94.9541 23.464 95.2713 23.696 95.6832C23.9328 96.0999 24.0511 96.6634 24.0511 97.3736C24.0511 98.2921 23.8215 99.1018 23.3622 99.8026C22.9029 100.503 22.2519 101.05 21.4091 101.443C20.5663 101.836 19.572 102.033 18.4261 102.033C17.2708 102.033 16.2694 101.836 15.4219 101.443C14.5791 101.05 13.9257 100.506 13.4616 99.8097C13.0024 99.1136 12.7727 98.3111 12.7727 97.402C12.7727 96.7012 12.8887 96.1402 13.1207 95.7188C13.3575 95.2973 13.625 94.973 13.9233 94.7457C14.2263 94.5185 14.4773 94.3433 14.6761 94.2202V94.0213H13V92.402ZM18.4545 94.0497C17.6307 94.0497 16.9039 94.1705 16.2741 94.4119C15.6491 94.6534 15.1591 95.0062 14.804 95.4702C14.4536 95.9342 14.2784 96.5024 14.2784 97.1747C14.2784 97.8755 14.4631 98.4602 14.8324 98.929C15.2064 99.4025 15.7083 99.7576 16.3381 99.9943C16.9725 100.236 17.678 100.357 18.4545 100.357C19.2216 100.357 19.9129 100.238 20.5284 100.001C21.1487 99.7694 21.6387 99.4167 21.9986 98.9432C22.3632 98.4744 22.5455 97.8849 22.5455 97.1747C22.5455 96.4929 22.3726 95.92 22.027 95.456C21.6861 94.992 21.2079 94.6416 20.5923 94.4048C19.9815 94.1681 19.2689 94.0497 18.4545 94.0497ZM12.7443 107.807C12.7443 107.116 12.8745 106.488 13.1349 105.925C13.4001 105.361 13.7812 104.914 14.2784 104.582C14.7803 104.251 15.3864 104.085 16.0966 104.085C16.7216 104.085 17.2282 104.208 17.6165 104.455C18.0095 104.701 18.3172 105.03 18.5398 105.442C18.7623 105.854 18.928 106.308 19.0369 106.805C19.1506 107.307 19.2405 107.812 19.3068 108.318C19.392 108.981 19.456 109.518 19.4986 109.93C19.5459 110.347 19.6241 110.65 19.733 110.839C19.8419 111.034 20.0313 111.131 20.3011 111.131H20.358C21.0587 111.131 21.6032 110.939 21.9915 110.555C22.3797 110.177 22.5739 109.601 22.5739 108.83C22.5739 108.029 22.3987 107.402 22.0483 106.947C21.6979 106.493 21.3239 106.173 20.9261 105.989L21.4943 104.398C22.1572 104.682 22.6733 105.061 23.0426 105.534C23.4167 106.012 23.6771 106.533 23.8239 107.097C23.9754 107.665 24.0511 108.223 24.0511 108.773C24.0511 109.123 24.0085 109.526 23.9233 109.98C23.8428 110.439 23.6747 110.882 23.419 111.308C23.1634 111.739 22.7775 112.097 22.2614 112.381C21.7453 112.665 21.054 112.807 20.1875 112.807H13L13 111.131H14.4773V111.045C14.2405 110.932 13.9872 110.742 13.7173 110.477C13.4474 110.212 13.2178 109.859 13.0284 109.419C12.839 108.979 12.7443 108.441 12.7443 107.807ZM14.25 108.062C14.25 108.725 14.3802 109.284 14.6406 109.739C14.901 110.198 15.2372 110.544 15.6491 110.776C16.0611 111.012 16.4943 111.131 16.9489 111.131H18.483C18.3977 111.06 18.3196 110.903 18.2486 110.662C18.1823 110.425 18.1231 110.151 18.071 109.838C18.0237 109.53 17.9811 109.23 17.9432 108.936C17.91 108.647 17.8816 108.413 17.858 108.233C17.8011 107.797 17.7088 107.39 17.581 107.011C17.4579 106.637 17.2708 106.334 17.0199 106.102C16.7737 105.875 16.4375 105.761 16.0114 105.761C15.429 105.761 14.9886 105.977 14.6903 106.408C14.3968 106.843 14.25 107.395 14.25 108.062ZM12.7727 120.298C12.7727 119.275 13.0142 118.395 13.4972 117.656C13.9801 116.917 14.6454 116.349 15.4929 115.951C16.3404 115.554 17.3087 115.355 18.3977 115.355C19.5057 115.355 20.4834 115.558 21.331 115.966C22.1832 116.377 22.8485 116.95 23.3267 117.684C23.8097 118.423 24.0511 119.285 24.0511 120.27C24.0511 121.037 23.9091 121.728 23.625 122.343C23.3409 122.959 22.9432 123.463 22.4318 123.856C21.9205 124.249 21.3239 124.493 20.642 124.588V122.912C21.1392 122.784 21.5795 122.5 21.9631 122.059C22.3513 121.624 22.5455 121.037 22.5455 120.298C22.5455 119.645 22.375 119.072 22.0341 118.579C21.6979 118.092 21.2221 117.71 20.6065 117.436C19.9957 117.166 19.2784 117.031 18.4545 117.031C17.6117 117.031 16.8778 117.163 16.2528 117.429C15.6278 117.699 15.1425 118.077 14.7969 118.565C14.4512 119.057 14.2784 119.635 14.2784 120.298C14.2784 120.734 14.3542 121.129 14.5057 121.484C14.6572 121.839 14.875 122.14 15.1591 122.386C15.4432 122.632 15.7841 122.807 16.1818 122.912V124.588C15.5379 124.493 14.9579 124.259 14.4418 123.885C13.9304 123.515 13.5232 123.025 13.2202 122.414C12.9219 121.808 12.7727 121.103 12.7727 120.298ZM16.9773 128.6L19.0511 128.572V128.913L23.9091 133.686V135.76L18.767 130.674V130.532L16.9773 128.6ZM13 127.038H27.5455V128.714H13V127.038ZM13 133.97L18.3977 129.708L19.5625 130.902L13 136.1V133.97Z" fill="white"/>
                        <path d="M25 23V23.0125" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M30 30.5L30 15.5C30 14.1193 28.8807 13 27.5 13L12.5 13C11.1193 13 10 14.1193 10 15.5L10 30.5C10 31.8807 11.1193 33 12.5 33H27.5C28.8807 33 30 31.8807 30 30.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 21.75V23H15V24.25" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </button>
            <!-- Modal Feedback -->
            <div class="modal fade" id="feedbackModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="feedbackModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Feedback Satu Data Padjadjaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Form Feedback -->
                        <form action="{{route('store.feedback')}}" method="POST" id="feedbackForm" novalidate="novalidate">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label for="feedbackFormName" class="form-label">Nama</label>
                                    <input class="form-control" type="text" value="" name="name" id="feedbackFormName">
                                </div>
                                <div class="mb-2">
                                    <label for="feedbackFormEmail" class="form-label">Email</label>
                                    <input class="form-control" type="email" value="" name="email" id="feedbackFormEmail">
                                </div>
                                <div class="mb-2">
                                    <label for="feedbackFormSubject" class="form-label">Subjek Pesan</label>
                                    <input class="form-control" type="text" name="subject" id="feedbackFormSubject">
                                </div>
                                <div>
                                    <label for="feedbackFormMessage" class="form-label">Isi Pesan</label>
                                    <textarea class="form-control" name="message" id="feedbackFormMessage" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- START FOOTER -->
        <div class="container-fluid bg-light mt-auto d-none d-lg-block">
            <div class="container d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
                <p class="col-md-4 mb-0 text-muted text-center">© 2022 BEM KEMA Universitas Padjadjaran</p>
                <div class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto">
                    <a href="https://kema.unpad.ac.id/" target="_blank"><img src="{{ asset('img/logo/bem-kema2.png') }}" width="40" alt="BEM Kema"></a>
                    <a href="https://unpad.ac.id/" target="_blank"><img src="{{ asset('img/logo/logo-unpad.png') }}" width="40" alt="Unpad"></a>
                </div>
                <ul class="nav col-md-4 justify-content-end text-center">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2 text-muted">Home</a></li>
                    <li class="nav-item"><a href="{{ route('katalog.home')}}" class="nav-link px-2 text-muted">Katalog Data</a></li>
                    <li class="nav-item"><a href="{{ url('about') }}" class="nav-link px-2 text-muted">About</a></li>
                </ul>
            </div>
        </div>
        <!-- END FOOTER -->
        <script>
            @yield('scripts');
        </script>
    </body>
</html>