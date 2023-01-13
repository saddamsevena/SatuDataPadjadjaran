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
        <form method="POST" action="{{ route('data.update', $datas->id ) }}" class="needs-validation" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Judul</label>
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="false" autofocus aria-describedby="namaHelp" value="{{$datas->nama}}">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required autocomplete="false" autofocus aria-describedby="deskripsiHelp">{{$datas->deskripsi}}</textarea>
                <div id="deskripsiHelp" class="form-text">Penjelasan mengenai isi data. Bisa berupa narasi yang dibuat sendiri atau bisa juga potongan konten yang ada.</div>
            </div>
            <div class="mb-3">
                <label for="sumber" class="form-label">Sumber</label>
                <input id="sumber" type="text" class="form-control @error('sumber') is-invalid @enderror" name="sumber" required autocomplete="false" autofocus aria-describedby="sumberHelp" value="{{$datas->sumber}}">
                <div id="sumberHelp" class="form-text">Sumber asli data, misal sumber data dari Lembaga seperti BEM Kema Unpad atau apabila data milik pribadi silahkan tulis individu</div>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" value="{{$datas->kategori}}">
                    <option value="" disabled>== Select Kategori ==</option>
                    <option value="Infografis">Infografis</option>
                    <option value="Arsip Lembaga">Arsip Lembaga</option>
                    <option value="Kajian">Kajian</option>
                    <option value="Database">Database</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" id="image" name="image"class="form-control" aria-describedby="imageHelp">
                <div id="imageHelp" class="form-text">Sertakan gambar untuk dijadikan header pada halaman data nantinya, apabila tidak ada gambar, silahkan lewati kolom ini.</div>
            </div>
            <div class="mb-3">
                <label for="kata_kunci" class="form-label">Kata Kunci</label>
                <input id="kata_kunci" type="text" class="form-control @error('kata_kunci') is-invalid @enderror" name="kata_kunci" required autocomplete="false" autofocus aria-describedby="kata_kunciHelp" value="{{$datas->kata_kunci}}">
                <div id="kata_kunciHelp" class="form-text">Pisahkan masing-masing kata dengan menggunakan spasi atau ;</div>
            </div>
            <div class="mb-3">
                <label for="tautan" class="form-label">Tautan</label>
                <input id="tautan" type="text" class="form-control @error('tautan') is-invalid @enderror" name="tautan" required autocomplete="false" autofocus aria-describedby="tautanHelp" placeholder="https://namawebsite.com" value="{{$datas->tautan}}">
                <div id="tautanHelp" class="form-text">Input disertakan protokol http atau https</div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')

@endsection