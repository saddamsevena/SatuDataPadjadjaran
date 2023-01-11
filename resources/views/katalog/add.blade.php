@extends('template.user')

@section('title')
	SDP - Tambah Data
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
    <p class="h1 text-light text-center">Unggah Data</p>
</div>
<div class="container-fluid content p-4">
    <div class="container bg-light p-4">
        <form method="POST" action="{{ route('katalog.store') }}" class="needs-validation">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Judul</label>
            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="false" autofocus aria-describedby="namaHelp">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required autocomplete="false" autofocus aria-describedby="deskripsiHelp"></textarea>
        </div>
        <div class="mb-3">
            <label for="sumber" class="form-label">Sumber</label>
            <input id="sumber" type="text" class="form-control @error('sumber') is-invalid @enderror" name="sumber" required autocomplete="false" autofocus aria-describedby="sumberHelp">
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-control">
                    <option value="" disabled>== Select Kategori ==</option>
                    <option value="Infografis">Infografis</option>
                    <option value="Arsip Lembaga">Arsip Lembaga</option>
                    <option value="Kajian">Kajian</option>
                    <option value="Database">Database</option>
                    <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <!-- <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" id="image" name="image"class="form-control" value="NULL" aria-describedby="imageHelp">
        </div> -->
        <div class="mb-3">
            <label for="kata_kunci" class="form-label">Kata Kunci</label>
            <input id="kata_kunci" type="text" class="form-control @error('kata_kunci') is-invalid @enderror" name="kata_kunci" required autocomplete="false" autofocus aria-describedby="kata_kunciHelp">
        </div>
        <div class="mb-3">
            <label for="tautan" class="form-label">Tautan</label>
            <input id="tautan" type="text" class="form-control @error('tautan') is-invalid @enderror" name="tautan" required autocomplete="false" autofocus aria-describedby="tautanHelp">
        </div>
        <input type="hidden" name="status" id="status" value="Checking" >

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')

@endsection
