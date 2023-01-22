@extends('template.user')

@section('title')
	SDP - Sign In
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
<div class="container-fluid py-4">
    <div class="d-flex justify-content-center">
        <div class="col-8">
            <div class="card">
                <span class="text-center fs-3 fw-semibold mt-2">Sign In</span>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 border-end d-flex justify-content-center align-items-center">
                            <img src="{{ asset('img/asset2.png') }}" width="100%" alt="Asset">
                        </div>
                        <div class="col-6 border-start d-flex justify-content-center align-items-center">
                            <form method="POST" action="{{ route('login') }}" class="col-8 needs-validation">
                                @csrf
                                <div class="mb-3">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input id="npm" type="text" class="form-control @error('npm') is-invalid @enderror" name="npm" required autocomplete="false" autofocus aria-describedby="npmHelp">
                                    <div id="npmHelp" class="form-text">Masukkan 12 Digit NPM Kamu</div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required autofocus>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign In</button>
                                <a class="btn btn-outline-warning" href="{{ route('register') }}" role="button">Buat Akun</a>
                            </form>
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