@extends('template.user')

@section('title')
	SDP - {{$datas->nama}}
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
<div class="container-fluid heading">
    <div class="container text-center py-4 text-light">
        <p class="fs-1 fw-bold">{{$datas->nama}}</p>
    </div>
</div>
<div class="contaner-fluid bg-white">
    <div class="d-flex justify-content-center">
        <div class="container col-lg-8 mt-3">
            <div class="row gx-sm-2 gx-md-3 gx-lg-5 row-cols-1 row-cols-lg-2">
                <div class="col-lg-3 d-flex flex-column justify-content-start">
                    @if($datas->image == NULL)
                        <img src="{{ asset('img/no-image.png') }}" class="img-thumbnail border-0 rounded-start" alt="Header {{$datas->nama}}">
                    @else
                        <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $datas->image) }}" class="img-thumbnail border-0 rounded-start" alt="Header {{$datas->nama}}">
                    @endif
                    <div class="px-2 border-top">
                        <p class="text-start fw-bold mt-0 mb-0">Judul</p>
                        <p class="text-end fw-normal mt-0 mb-0">{{$datas->nama}}</p>
                        <p class="text-start fw-bold mt-0 mb-0">Author</p>
                        <p class="text-end fw-normal mt-0 mb-0">{{$datas->penerbit}}</p>
                        <p class="text-start fw-bold mt-0 mb-0">Sumber Data</p>
                        <p class="text-end fw-normal mt-0 mb-0">{{$datas->sumber}}</p>
                        <p class="text-start fw-bold mt-0 mb-0">Kategori</p>
                        <p class="text-end fw-normal mt-0 mb-0">{{$datas->kategori}}</p>
                    </div>
                    <div class="btn-toolbar justify-content-center">
                        <button class="btn btn-outline-primary"><a href="{{$datas->tautan}}" class="nav-link">Tautan</a></button>
                    </div>
                </div>
                <div class="col-lg-9 d-flex flex-column align-content-between">
                    <div class="row">
                        <p class="text-center fs-5 fw-bold">Deskripsi Data</p>
                        <p class="fw-normal" style="text-align:justify;">{{$datas->deskripsi}}</p>
                    </div>
                    <div class="row">
                        <p class="fs-5 fw-bold">Preview</p>
                        <div class="ratio ratio-16x9">
                            <iframe src="{{$datas->tautan}}" frameborder="1" class="border border-black" height="50rem"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection