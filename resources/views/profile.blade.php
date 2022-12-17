@extends('template.user')

@section('title')
	Profile - {{ Auth::user()->name}}
@endsection

@section('css')
.content {
    background-color: #EEEFF7;
    height: 83vh;
}
@endsection

@section('content')
<div class="container-fluid py-4 content">
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-4 border-end d-flex flex-column justify-content-center align-items-center">
                            <div class="border-bottom p-2">
                                @if(Auth::user()->image == NULL)
                                <img src="{{ asset('img/profile/profile.jpg') }}" alt="Foto Profil {{ Auth::user()->name }}" width="200vw" height="200vh" class="img-thumbnail rounded-circle">
                                @else
                                <img src="/img/profile/{{ Auth::user()->image }}" alt="Foto Profil {{ Auth::user()->name }}" width="200vw" height="200vh" class="img-thumbnail rounded-circle">
                                @endif
                            </div>
                            <div class="text-break">
                                <p class="h4 fw-bold text-center">Informasi Akun</p>
                                <div class="mb-3 row">
                                </div>
                                <p class="text-start">
                                    <div class="d-flex flex-row">
                                        <div class="me-2 mb-2"><i class="fa-solid fa-user"></i></div>
                                        <div class="me-2 mb-2">{{ Auth::user()->name}}</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="me-2 mb-2"><i class="fa-regular fa-envelope"></i></div>
                                        <div class="me-2 mb-2">{{ Auth::user()->email}}</div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        @if(Auth::user()->role == 1)
                                        @else
                                        <div class="me-2 mb-2"><i class="fa-regular fa-id-card"></i></div>
                                        <div class="me-2 mb-2">{{ Auth::user()->npm}}</div>
                                        @endif    
                                    </div>
                                </p>
                            </div>
                            <div class="mt-auto">
                                <div class="nav flex-row nav-pills" id="profile" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="edit-profile-tab" data-bs-toggle="pill" data-bs-target="#edit-profile" type="button" role="tab" aria-controls="edit-profile" aria-selected="true">Edit Profile</button>
                                    <button class="nav-link" id="user-contribution-tab" data-bs-toggle="pill" data-bs-target="#user-contribution" type="button" role="tab" aria-controls="user-contribution" aria-selected="false">My Contribution</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 border-start d-flex flex-column justify-content-center align-items-center">
                            <div class="tab-content col-10" id="profileContent">
                                <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab" tabindex="0">
                                    <h5 class="text-center">Edit Profile</h5>
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

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="user-contribution" role="tabpanel" aria-labelledby="user-contribution-tab" tabindex="0">
                                    <!-- Code Riwayat Kontribusi Data -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection