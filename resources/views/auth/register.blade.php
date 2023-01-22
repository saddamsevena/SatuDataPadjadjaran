@extends('template.user')

@section('title')
	SDP - Buat Akun
@endsection

@section('css')
body {
    background-image: url(/img/bg-1.png);
	background-size: cover;
	position: relative;
	background-repeat: no-repeat;
    height: 100vh;
}
@endsection

@section('content')
<div class="container-fluid content py-4">
    <div class="d-flex justify-content-center">
        <div class="col-8">
            <div class="card">
                <span class="text-center fs-3 fw-semibold mt-2">Buat Akun</span>
                <hr>
                <div class="card-body mb-2">
                    <div class="row">
                        <div class="col-6 border-end d-flex justify-content-center align-items-center">
                            <form method="POST" action="{{ route('register') }}" class="col-8" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input id="name" type="text" class="form-control" name="name" required autocomplete="false" autofocus aria-describedby="namaHelp">
                                    <div id="namaHelp" class="form-text">Masukkan nama lengkap kamu</div>
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" required autocomplete="false" autofocus aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Masukkan Email pribadi kamu</div>
                                </div>
                                <div class="mb-2">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input id="npm" type="text" class="form-control" name="npm" required autocomplete="false" autofocus aria-describedby="npmHelp">
                                    <div id="npmHelp" class="form-text">Masukkan 12 Digit NPM Kamu</div>
                                </div>
                                <div class="mb-2">
                                    <label for="ktm" class="form-label">KTM</label>
                                    <input id="ktm" type="file" class="form-control" name="ktm" required autocomplete="false" autofocus aria-describedby="ktmHelp" accept="image/*">
                                    <div id="ktmHelp" class="form-text">Upload KTM Kamu, <p class="text-muted">Max File 2 MB</p></div>
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" autofocus>
                                </div>
                                <div class="mb-2">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus>
                                </div>
                                <button type="submit" class="btn btn-primary">Daftar</button>
                                <a class="btn btn-outline-warning" href="{{ route('login') }}" role="button">Sign In</a>
                            </form>
                        </div>
                        <div class="col-6 border-start d-flex justify-content-center align-items-center">
                            <img src="{{ asset('img/asset.png') }}" width="100%" alt="Asset">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection