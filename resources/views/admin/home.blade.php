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
    transform: scale(2.5); 
}
@endsection

@section('content')
<div class="container">

</div>


<p class="h3 border-bottom border-dark text-center"><i class="fa-solid fa-address-book"></i> User Database</p>
<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered text-center align-middle">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Email</th>
                <th>Foto Profil</th>
                <th>Verifikasi Akun</th>
                <th>KTM</th>
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
                    <img src="/img/profile/{{$user->image}}" alt="Foto {{$user->name}}" width="100vh" class="img-thumbnail rounded zoom">
                </td>
                @if($user->is_active == 1)
                    <td>Verified</td>
                    @else
                    <td>Unverified</td>
                @endif
                <td>
                    <img src="/img/ktm/{{$user->ktm}}" alt="KTM {{$user->name}}" width="200vh" class="img-thumbnail zoom">
                </td>
                @if($user->role == 1)
                    <td>Admin</td>
                    @else
                    <td>User</td>
                @endif
                <td>
                    <div class="row justify-content-center">
                        @if($user->role == 0)
                            <div class="col-sm-auto">
                                <form action="/home/admin/makeAdmin/{{$user->id}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="isAdmin" value=1>
                                    <button type="submit" class="btn btn-success">Jadikan admin</button>
                                </form>
                            </div>
                        @else
                            <div class="col-sm-auto">
                                <form action="/home/admin/makeAdmin/{{$user->id}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="isAdmin" value=0>
                                    <button type="submit" class="btn btn-danger">Hapus admin</button>
                                </form>
                            </div>
                        @endif

                        @if($user->is_active == 0)
                            <div class="col-sm-auto">
                                <form action="/home/admin/verificateUsers/{{$user->id}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="verified" value=1>
                                    <button type="submit" class="btn btn-success">Verifikasi Akun</button>
                                </form>
                            </div>
                        @else
                            <div class="col-sm-auto">
                                <form action="/home/admin/verificateUsers/{{$user->id}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="verified" value=0>
                                    <button type="submit" class="btn btn-danger">Batal Verifikasi Akun</button>
                                </form>
                            </div>
                        @endif
                        <div class="col-sm-auto">
                            <a href="/home/admin/deleteUsers/{{$user->id}}" class="btn btn-danger">
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
@endsection