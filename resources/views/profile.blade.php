@extends('template.user')

@section('css')

@endsection

@section('content')
<div class="container mx-auto my-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa-solid fa-user fa-lg mx-3"></i>Profile {{ $user->name }}</h3>
                    <div class="card">
                        <div class="card-body">
                            <b>Profil Saya</b>
                            <p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
                            <hr>
                            <b>Ubah Biodata Diri</b>
                            <br>
                            <form action="{{ route('profile.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ $user->name }}" name="name" id="name" type="text" class="form-control" placeholder="Masukkan nama">
                                    <p class="text-danger">{{ $errors->first("name") }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="{{ $user->email }}" name="email" id="email" type="email" class="form-control" placeholder="Masukkan email">
                                    <p class="text-danger">{{ $errors->first("email") }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="npm">NPM</label>
                                    <input value="{{ $user->npm }}" name="npm" id="npm" type="text" class="form-control" placeholder="Masukkan NPM">
                                    <p class="text-danger">{{ $errors->first("npm") }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="image">Foto Profil</label>
                                    <input type="file" name="image" value="{{ $user->image }}" class="form-control" placeholder="foto">
                                    <p class="text-danger">{{ $errors->first("image") }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input value="" name="password" id="password" type="password" class="form-control" placeholder="Masukkan password">
                                    <p class="text-danger">{{ $errors->first("password") }}</p>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection