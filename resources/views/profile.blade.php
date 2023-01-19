@extends('template.user')

@section('title')
	Profile - {{ Auth::user()->name}}
@endsection

@section('css')
div.scroll {
    height: 35rem;
    overflow-x: hidden;
    overflow-y: auto;
    text-align:justify;
}
@endsection

@section('content')
<div class="container-thumbnail py-4">
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4 col-md-12 d-flex flex-column justify-content-center align-items-center align-self-center">
                            <div class="border-bottom p-2 justify-content-center">
                                @if(Auth::user()->image == NULL)
                                <img src="{{ asset('img/profile.jpg') }}" alt="Foto Profil {{ Auth::user()->name }}" width="150" height="150" class="img-thumbnail rounded-circle">
                                @else
                                <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . Auth::user()->image) }}" alt="Foto Profil {{ Auth::user()->name }}" width="150" height="150" class="img-thumbnail rounded-circle">
                                @endif
                            </div>
                            <div class="text-break">
                                <p class="h4 fw-bold text-center mt-3">Informasi Akun</p>
                                <div class="mb-3 row">
                                </div>
                                <p class="text-center">
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
                        <div class="col-sm-12 col-lg-8 col-md-12 d-flex flex-column justify-content-center align-items-center align-self-center py-4">
                            <div class="tab-content" id="profileContent">
                                <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab" tabindex="0">
                                    <h5 class="text-center">Edit Profile</h5>
                                    <form action="{{ route('profile.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input value="{{ Auth::user()->name }}" name="name" id="name" type="text" class="form-control" placeholder="Masukkan nama">
                                            <p class="text-danger">{{ $errors->first("name") }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input value="{{ Auth::user()->email }}" name="email" id="email" type="email" class="form-control" placeholder="Masukkan email">
                                            <p class="text-danger">{{ $errors->first("email") }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="npm">NPM</label>
                                            <input value="{{ Auth::user()->npm }}" name="npm" id="npm" type="text" class="form-control" placeholder="Masukkan NPM" readonly disabled>
                                            <p class="text-danger">{{ $errors->first("npm") }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="image">Foto Profil</label>
                                            <input type="file" name="image" value="{{ Auth::user()->image }}" class="form-control" placeholder="foto" aria-describedby="imageHelp">
                                            <p class="text-danger">{{ $errors->first("image") }}</p>
                                            <div id="imageHelp" class="form-text">
                                                Gunakan gambar dengan rasio 1 : 1 untuk mendapatkan hasil yang maksimal
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input value="" name="password" id="password" type="password" class="form-control" placeholder="Masukkan password anda" required>
                                            <p class="text-danger">{{ $errors->first("password") }}</p>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="user-contribution" role="tabpanel" aria-labelledby="user-contribution-tab" tabindex="1">
                                    <h5 class="text-center">My Contribution</h5>
                                    <nav class="d-flex justify-content-center">
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-accepted-tab" data-bs-toggle="tab" data-bs-target="#nav-accepted" type="button" role="tab" aria-controls="nav-accepted" aria-selected="true">Accepted</button>
                                            <button class="nav-link" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="false">Pending</button>
                                            <button class="nav-link" id="nav-rejected-tab" data-bs-toggle="tab" data-bs-target="#nav-rejected" type="button" role="tab" aria-controls="nav-rejected" aria-selected="false">Rejected</button>
                                            <button class="nav-link" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="false">All</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content p-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-accepted" role="tabpanel" aria-labelledby="nav-accepted-tab" tabindex="0">
                                            <div class="scroll">
                                                @foreach($datas as $data)
                                                    @if($data->user_npm = Auth::user()->npm && $data->status == "Accepted")
                                                    <div class="card mb-2">
                                                        <div class="card-body">
                                                            <div class="row d-flex g-2">
                                                                <div class="col-12 col-lg-3 d-flex flex-row justify-content-center align-items-center">
                                                                    @if($data->image == NULL)
                                                                    <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                                                    @else
                                                                    <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                                                    @endif
                                                                </div>
                                                                <div class="col-12 col-lg-9 d-flex flex-column align-content-between">
                                                                    <div class="row">
                                                                        <div class="col"><h5 class="card-title text-center">{{$data->nama}}</h5></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12 col-lg-9">
                                                                            <p class="card-text my-auto">
                                                                                Kategori : {{$data->kategori}}
                                                                                <br>
                                                                                Keyword : {{$data->kata_kunci}}
                                                                                <br>
                                                                                Sumber : {{$data->sumber}}
                                                                                <br>
                                                                                Status : {{$data->status}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-end">
                                                                            <div class="btn-group-vertical">
                                                                                <button class="btn btn-outline-primary"><a href="{{ route('katalog.detail', $data->id) }}" class="nav-link">Lihat Detail</a></button>
                                                                                <button class="btn btn-outline-primary"><a href="{{ route('edit.data', $data->id) }}" class="nav-link">Update</a></button>    
                                                                                <button class="btn btn-outline-danger"><a href="/deleteData/{{$data->id}}" class="nav-link">Hapus</a></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer mt-auto">
                                                                        <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab" tabindex="0">
                                            <div class="scroll">
                                                @foreach($datas as $data)
                                                    @if($data->user_npm = Auth::user()->npm && $data->status == "Checking")
                                                    <div class="card mb-2">
                                                        <div class="card-body">
                                                            <div class="row d-flex g-2">
                                                                <div class="col-12 col-lg-3 d-flex flex-row justify-content-center align-items-center">
                                                                    @if($data->image == NULL)
                                                                    <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                                                    @else
                                                                    <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                                                    @endif
                                                                </div>
                                                                <div class="col-12 col-lg-9 d-flex flex-column align-content-between">
                                                                    <div class="row p-3">
                                                                        <div class="col-12 col-lg-9">
                                                                            <h5 class="card-title">{{$data->nama}}</h5>
                                                                            <p class="card-text my-auto">
                                                                                Kategori : {{$data->kategori}}
                                                                                <br>
                                                                                Keyword : {{$data->kata_kunci}}
                                                                                <br>
                                                                                Sumber : {{$data->sumber}}
                                                                                <br>
                                                                                Status : {{$data->status}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-end">
                                                                            <div class="btn-group-vertical">
                                                                                <button class="btn btn-outline-primary"><a href="{{ route('katalog.detail', $data->id) }}" class="nav-link">Lihat Detail</a></button>
                                                                                <button class="btn btn-outline-primary"><a href="{{ route('edit.data', $data->id) }}" class="nav-link">Update</a></button>    
                                                                                <button class="btn btn-danger"><a href="/deleteData/{{$data->id}}" class="nav-link">Hapus</a></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer mt-auto">
                                                                        <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-rejected" role="tabpanel" aria-labelledby="nav-rejected-tab" tabindex="0">
                                            <div class="scroll">
                                                @foreach($datas as $data)
                                                    @if($data->user_npm = Auth::user()->npm && $data->status == "Blocked")
                                                    <div class="card mb-2">
                                                        <div class="card-body">
                                                            <div class="row d-flex g-2">
                                                                <div class="col-12 col-lg-3 d-flex flex-row justify-content-center align-items-center">
                                                                    @if($data->image == NULL)
                                                                    <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                                                    @else
                                                                    <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                                                    @endif
                                                                </div>
                                                                <div class="col-12 col-lg-9 d-flex flex-column align-content-between">
                                                                    <div class="row p-3">
                                                                        <div class="col-12 col-lg-9">
                                                                            <h5 class="card-title">{{$data->nama}}</h5>
                                                                            <p class="card-text my-auto">
                                                                                Kategori : {{$data->kategori}}
                                                                                <br>
                                                                                Keyword : {{$data->kata_kunci}}
                                                                                <br>
                                                                                Sumber : {{$data->sumber}}
                                                                                <br>
                                                                                Status : {{$data->status}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-end">
                                                                            <div class="btn-group-vertical">
                                                                                <button class="btn btn-outline-primary"><a href="{{ route('katalog.detail', $data->id) }}" class="nav-link">Lihat Detail</a></button>
                                                                                <button class="btn btn-outline-primary"><a href="{{ route('edit.data', $data->id) }}" class="nav-link">Update</a></button>    
                                                                                <button class="btn btn-outline-danger"><a href="/deleteData/{{$data->id}}" class="nav-link">Hapus</a></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer mt-auto">
                                                                        <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0">
                                            <div class="scroll">
                                                @foreach($datas as $data)
                                                    @if($data->user_npm = Auth::user()->npm)
                                                    <div class="card mb-2">
                                                        <div class="card-body">
                                                            <div class="row d-flex g-2">
                                                                <div class="col-12 col-lg-3 d-flex flex-row justify-content-center align-items-center">
                                                                    @if($data->image == NULL)
                                                                    <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                                                    @else
                                                                    <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                                                    @endif
                                                                </div>
                                                                <div class="col-12 col-lg-9 d-flex flex-column align-content-between">
                                                                    <div class="row p-3">
                                                                        <div class="col-12 col-lg-9">
                                                                            <h5 class="card-title">{{$data->nama}}</h5>
                                                                            <p class="card-text my-auto">
                                                                                Kategori : {{$data->kategori}}
                                                                                <br>
                                                                                Keyword : {{$data->kata_kunci}}
                                                                                <br>
                                                                                Sumber : {{$data->sumber}}
                                                                                <br>
                                                                                Status : {{$data->status}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-end">
                                                                            <div class="btn-group-vertical">
                                                                                <button class="btn btn-outline-primary"><a href="{{ route('katalog.detail', $data->id) }}" class="nav-link">Lihat Detail</a></button>
                                                                                <button class="btn btn-outline-primary"><a href="{{ route('edit.data', $data->id) }}" class="nav-link">Update</a></button>    
                                                                                <button class="btn btn-outline-danger"><a href="/deleteData/{{$data->id}}" class="nav-link">Hapus</a></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer mt-auto">
                                                                        <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center align-self-center mt-2">
                                        <div class="btn-group-vertical">
                                            <button class="btn btn-primary"><a href="{{ route('katalog.add') }}" class="nav-link">Tambah Kontribusi</a></button>
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
</div>  
@endsection