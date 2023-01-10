@extends('template.user')

@section('title')
	Profile - {{ Auth::user()->name}}
@endsection

@section('css')
.content {
    background-color: #EEEFF7;
}
div.scroll {
    height: 40rem;
    overflow-x: hidden;
    overflow-y: auto;
    text-align:justify;
}
@endsection

@section('content')
<div class="container-fluid py-4 content">
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4 col-md-4 d-flex flex-column justify-content-center align-items-center align-self-center border-end border-start">
                            <div class="border-bottom p-2 justify-content-center">
                                @if(Auth::user()->image == NULL)
                                <img src="{{ asset('img/profile/profile.jpg') }}" alt="Foto Profil {{ Auth::user()->name }}" width="150" height="150" class="img-thumbnail rounded-circle">
                                @else
                                <img src="/img/profile/{{ Auth::user()->image }}" alt="Foto Profil {{ Auth::user()->name }}" width="150" height="150" class="img-thumbnail rounded-circle">
                                @endif
                            </div>
                            <div class="text-break">
                                <p class="h4 fw-bold text-center mt-3">Informasi Akun</p>
                                <div class="mb-3 row">
                                </div>
                                <!-- <p class="text-start">
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
                                </p> -->
                            </div>
                            <div class="d-none d-lg-block mt-auto">
                                <div class="nav flex-row nav-pills" id="profile" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="edit-profile-tab" data-bs-toggle="pill" data-bs-target="#edit-profile" type="button" role="tab" aria-controls="edit-profile" aria-selected="true">Edit Profile</button>
                                    <button class="nav-link" id="user-contribution-tab" data-bs-toggle="pill" data-bs-target="#user-contribution" type="button" role="tab" aria-controls="user-contribution" aria-selected="false">My Contribution</button>
                                </div>
                            </div>
                            <div class="d-bloack d-lg-none mt-auto">
                                <div class="nav flex-column nav-pills" id="profile" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="edit-profile-tab" data-bs-toggle="pill" data-bs-target="#edit-profile" type="button" role="tab" aria-controls="edit-profile" aria-selected="true">Edit Profile</button>
                                    <button class="nav-link" id="user-contribution-tab" data-bs-toggle="pill" data-bs-target="#user-contribution" type="button" role="tab" aria-controls="user-contribution" aria-selected="false">My Contribution</button>
                                </div>
                            </div>
                        </div>
                        <hr class="d-block d-md-none bg-black opacity-100">
                        <div class="col-sm-12 col-lg-8 col-md-8 d-flex flex-column justify-content-center align-items-center align-self-center py-4">
                            <div class="tab-content" id="profileContent">
                                <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab" tabindex="0">
                                    <h5 class="text-center">Edit Profile</h5>
                                    <form action="{{ route('profile.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input value="{{ $user->name }}" name="name" id="name" type="text" class="form-control" placeholder="Masukkan nama">
                                            <p class="text-danger">{{ $errors->first("name") }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input value="{{ $user->email }}" name="email" id="email" type="email" class="form-control" placeholder="Masukkan email">
                                            <p class="text-danger">{{ $errors->first("email") }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="npm">NPM</label>
                                            <input value="{{ $user->npm }}" name="npm" id="npm" type="text" class="form-control" placeholder="Masukkan NPM" readonly disabled>
                                            <p class="text-danger">{{ $errors->first("npm") }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="image">Foto Profil</label>
                                            <input type="file" name="image" value="{{ $user->image }}" class="form-control" placeholder="foto" aria-describedby="imageHelp">
                                            <p class="text-danger">{{ $errors->first("image") }}</p>
                                            <div id="imageHelp" class="form-text">
                                                Gunakan gambar dengan rasio 1 : 1 untuk mendapatkan hasil yang maksimal
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input value="" name="password" id="password" type="password" class="form-control" placeholder="Masukkan password baru">
                                            <p class="text-danger">{{ $errors->first("password") }}</p>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="user-contribution" role="tabpanel" aria-labelledby="user-contribution-tab" tabindex="1">
                                    <div class="scroll p-4">
                                        @foreach($datas as $data)
                                            @if($data->user_id = Auth::user()->id)
                                            <div class="container border p-2">
                                                <div class="row justify-content-between">
                                                    <div class="col col-sm-3 col-md-3 col-lg-4">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <table class="table table-hover table-striped table-bordered text-center align-middle">
                                                <thead class="table-success">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul</th>
                                                        <th>Deskripsi</th>
                                                        <th>Kategori</th>
                                                        <th>Sumber</th>
                                                        <th>Kata Kunci</th>
                                                        <th>Tautan Data</th>
                                                        <th>Tanggal Rilis</th>
                                                        <th>Tanggal Diperbaharui</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-group-divider">
                                                @foreach($datas as $data)
                                                    @if($data->user_id = Auth::user()->id)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$data->nama}}</td>
                                                        <td>{{$data->deskripsi}}</td>
                                                        <td>{{$data->kategori}}</td>
                                                        <td>{{$data->sumber}}</td>
                                                        <td>{{$data->kata_kunci}}</td>
                                                        <td>{{$data->tautan}}</td>
                                                        <td>{{$data->created_at}}</td>
                                                        <td>{{$data->updated_at}}</td>
                                                        <td>{{$data->status}}</td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table> -->
                                            @endif
                                        @endforeach
                                    </div>
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