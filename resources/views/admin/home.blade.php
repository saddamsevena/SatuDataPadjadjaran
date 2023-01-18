@extends('template.admin')

@section('title')
	SDP - Admin Dashboard
@endsection

@section('css')
.zoom {
    transition: transform .2s;
    margin: 0 auto;
}

.zoom:hover {
    transform: scale(2);
}
@endsection

@section('content')
<div class="container-fluid">
    <ul class="nav nav-tabs justify-content-center" id="adminTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link fw-normal fs-5 active" aria-current="page" href="#" role="presentation" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-tab-pane" aria-selected="true" type="button">User</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link fw-normal fs-5" href="#" role="presentation" id="data-tab" data-bs-toggle="tab" data-bs-target="#data-tab-pane" aria-selected="false" type="button">Data</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link fw-normal fs-5" href="#" role="presentation" id="feedback-tab" data-bs-toggle="tab" data-bs-target="#feedback-tab-pane" aria-selected="false" type="button">Feedback</a>
        </li>
    </ul>
</div>

<div class="tab-content m-3" id="adminTabContent">
    <div class="tab-pane fade my-3 show active" id="user-tab-pane" role="tabpanel" aria-labelledby="user-tab" tabindex="0">
        <p class="h3 border-dark text-center"><i class="fa-solid fa-address-book"></i> User Database</p>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered text-center align-middle">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Email</th>
                        <th>Foto Profil</th>
                        <th>KTM</th>
                        <th>Verifikasi Akun</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->npm}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $user->image) }}" alt="Foto {{$user->name}}" width="100vh" class="img-thumbnail rounded zoom">
                        </td>
                        <td>
                            <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $user->ktm) }}" alt="KTM {{$user->name}}" width="200vh" class="img-thumbnail zoom">
                        </td>
                        @if($user->is_active == 1)
                            <td>Verified</td>
                            @else
                            <td>Unverified</td>
                        @endif
                        @if($user->role == 1)
                            <td>Admin</td>
                            @else
                            <td>User</td>
                        @endif
                        <td>
                            <div class="row justify-content-center">
                                @if($user->role == 0)
                                    <div class="col-sm-auto">
                                        <form action="/home/admin/makeAdmin/{{$user->npm}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="isAdmin" value=1>
                                            <button type="submit" class="btn btn-success">Jadikan admin</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="col-sm-auto">
                                        <form action="/home/admin/makeAdmin/{{$user->npm}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="isAdmin" value=0>
                                            <button type="submit" class="btn btn-danger">Hapus admin</button>
                                        </form>
                                    </div>
                                @endif

                                @if($user->is_active == 0)
                                    <div class="col-sm-auto">
                                        <form action="/home/admin/verificateUsers/{{$user->npm}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="verified" value=1>
                                            <button type="submit" class="btn btn-success">Verifikasi Akun</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="col-sm-auto">
                                        <form action="/home/admin/verificateUsers/{{$user->npm}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="verified" value=0>
                                            <button type="submit" class="btn btn-danger">Batal Verifikasi Akun</button>
                                        </form>
                                    </div>
                                @endif
                                <div class="col-auto">
                                    <a href="/home/admin/deleteUsers/{{$user->npm}}" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade my-3" id="data-tab-pane" role="tabpanel" aria-labelledby="data-tab" tabindex="0">
        <p class="h3 border-dark text-center"><i class="fa-regular fa-folder-open"></i> Data Catalogue</p>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered text-center align-middle">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Sumber</th>
                        <th>Penerbit</th>
                        <th>Kata Kunci</th>
                        <th>Tautan Data</th>
                        <th>Tanggal Rilis</th>
                        <th>Tanggal Diperbaharui</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                @foreach($datas as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->nama}}</td>
                        <td>
                            @if($data->image == NULL)
                                <img src="{{ asset('img/no-image.png') }}" width="100" height="auto" class="img-thumbnail border-0 rounded-start zoom" alt="Header {{$data->nama}}">
                            @else
                                <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" width="100" height="auto" class="img-thumbnail border-0 rounded-start zoom" alt="Header {{$data->nama}}">
                            @endif
                        </td>
                        <td>{{$data->deskripsi}}</td>
                        <td>{{$data->kategori}}</td>
                        <td>{{$data->sumber}}</td>
                        <td>{{$data->penerbit}}</td>
                        <td>{{$data->kata_kunci}}</td>
                        <td>{{$data->tautan}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->updated_at}}</td>
                        <td>{{$data->status}}</td>
                        <td>
                            <a href="{{ route ('admin.edit.data', $data->id) }}" class="btn btn-warning"> Update
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade my-3" id="feedback-tab-pane" role="tabpanel" aria-labelledby="feedback-tab" tabindex="0">
        <p class="h3 border-dark text-center"><i class="fa-regular fa-comment-dots"></i> Feedback Database</p>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered text-center align-middle">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Isi Pesan</th>
                        <th>Tanggal Kirim</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$feedback->name}}</td>
                        <td>{{$feedback->email}}</td>
                        <td>{{$feedback->subject}}</td>
                        <td>{{$feedback->message}}</td>
                        <td>{{$feedback->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
