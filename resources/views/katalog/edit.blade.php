@extends('template.user')

@section('title')
	SDP - List Data
@endsection

@section('css')
.heading {
    background-color: #1C213C;
}
.content {
    background-color: #EEEFF7;
}
@endsection

@section('content')
<div class="container-fluid heading py-4">
    <p class="h1 text-light text-center">Update Data</p>
</div>
<div class="container-fluid content p-4">
    <div class="container bg-light p-4">
        <form method="POST" action="{{ route('data.update', $datas->id ) }}" class="needs-validation">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Judul</label>
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="false" autofocus aria-describedby="namaHelp" value="{{$datas->nama}}">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required autocomplete="false" autofocus aria-describedby="deskripsiHelp" value="{{$datas->deskripsi}}">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input id="penerbit" type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" required autocomplete="false" autofocus aria-describedby="penerbitHelp" value="{{$datas->penerbit}}">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" value="{{$datas->kategori}}">
                    <option value="Infografis">Infografis</option>
                    <option value="Arsip Lembaga">Arsip Lembaga</option>
                    <option value="Kajian">Kajian</option>
                    <option value="Database">Database</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kata_kunci" class="form-label">Kata Kunci</label>
                <input id="kata_kunci" type="text" class="form-control @error('kata_kunci') is-invalid @enderror" name="kata_kunci" required autocomplete="false" autofocus aria-describedby="kata_kunciHelp" value="{{$datas->kata_kunci}}">
            </div>
            <div class="mb-3">
                <label for="tautan" class="form-label">Tautan</label>
                <input id="tautan" type="text" class="form-control @error('tautan') is-invalid @enderror" name="tautan" required autocomplete="false" autofocus aria-describedby="tautanHelp" value="{{$datas->tautan}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')

@endsection