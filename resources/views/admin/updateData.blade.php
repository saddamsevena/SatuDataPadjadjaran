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
.heading {
    background-color: #1C213C;
}
.content {
    background-color: #EEEFF7;
}
@endsection

@section('content')
<div class="container-fluid heading">
    <div class="container text-center py-4 text-light">
        <p class="fs-1 fw-bold">Update Data - {{$datas->nama}}</p>
    </div>
</div>
<div class="container-fluid content p-4">
    <div class="container bg-light p-4">
        <form method="POST" action="{{ route('admin.katalog.update', $datas->id ) }}" class="needs-validation">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Judul</label>
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="false" autofocus aria-describedby="namaHelp" value="{{$datas->nama}}" readonly>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" value="{{$datas->deskripsi}}" readonly>{{$datas->deskripsi}}</textarea>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input id="penerbit" type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" required autocomplete="false" autofocus aria-describedby="penerbitHelp" value="{{$datas->penerbit}}" readonly>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" name="kategori" id="kategori" class="form-control" required autocomplete="false" autofocus value="{{$datas->kategori}}" readonly>
            </div>
            <div class="mb-3">
                <label for="kata_kunci" class="form-label">Kata Kunci</label>
                <input id="kata_kunci" type="text" class="form-control @error('kata_kunci') is-invalid @enderror" name="kata_kunci" required autocomplete="false" autofocus aria-describedby="kata_kunciHelp" value="{{$datas->kata_kunci}}" readonly>
            </div>
            <div class="mb-3">
                <label for="tautan" class="form-label">Tautan</label>
                <input id="tautan" type="text" class="form-control @error('tautan') is-invalid @enderror" name="tautan" required autocomplete="false" autofocus aria-describedby="tautanHelp" value="{{$datas->tautan}}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" value="{{$datas->status}}">
                    <option value="" disabled>== Pilih salah satu ==</option>
                    <option value="Checking">Checking</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Blocked">Blocked</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
