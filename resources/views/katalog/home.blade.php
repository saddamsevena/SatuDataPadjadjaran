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
.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: contain;
}

@media screen and (max-width: 768px){
    .card-img-top {
        width: 100%;
        height: 100%;
    }
}
@endsection

@section('content')
<div class="container-fluid heading">
    <div class="container text-center py-4 text-light">
        <p class="fs-1 fw-bold">List Data</p>
    </div>
</div>
<div class="container-fluid py-4 content">
    <div class="container">
        <nav class="nav nav-pills flex-column flex-sm-row" id="dataList-tab" role="tablist">
            <a class="flex-sm-fill text-sm-center nav-link active" id="dataList-all-tab" data-bs-toggle="pill" data-bs-target="#dataList-all" type="button" role="tab" aria-controls="dataList-all" aria-selected="true">Semua</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="dataList-infografis-tab" data-bs-toggle="pill" data-bs-target="#dataList-infografis" type="button" role="tab" aria-controls="dataList-infografis" aria-selected="false">Infografis</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="dataList-arsip-tab" data-bs-toggle="pill" data-bs-target="#dataList-arsip" type="button" role="tab" aria-controls="dataList-arsip" aria-selected="false">Arsip Lembaga</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="dataList-kajian-tab" data-bs-toggle="pill" data-bs-target="#dataList-kajian" type="button" role="tab" aria-controls="dataList-kajian" aria-selected="false">Kajian</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="dataList-database-tab" data-bs-toggle="pill" data-bs-target="#dataList-database" type="button" role="tab" aria-controls="dataList-database" aria-selected="false">Database</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="dataList-lainnya-tab" data-bs-toggle="pill" data-bs-target="#dataList-lainnya" type="button" role="tab" aria-controls="dataList-lainnya" aria-selected="false">Lainnya</a>
        </nav>
    </div>
    <hr>
    <div class="tab-content" id="dataList-tabContent">
        <div class="tab-pane fade show active" id="dataList-all" role="tabpanel" aria-labelledby="dataList-all-tab" tabindex="0">
            <div class="container">
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-5 g-3 g-sm-3 g-md-3 g-lg-3">
                    @foreach($datas as $data)
                        @if($data->status == "Accepted")
                            <div class="col-sm-12 col-md-6">
                                <div class="card h-100">
                                    @if($data->image == NULL)
                                        <img src="{{ asset('img/no-image.png') }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @else
                                        <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-center">{{$data->nama}}</h5>
                                        <p class="card-text text-truncate text-center">{{$data->deskripsi}}</p>
                                        <p class="card-text">
                                            Kategori : {{$data->kategori}}
                                            <br>
                                            Keyword : {{$data->kata_kunci}}
                                            <br>
                                            Sumber : {{$data->sumber}}
                                            <br>
                                        </p>
                                        <div class="btn-toolbar justify-content-center mt-auto" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                                <button class="btn btn-outline-primary"><a href="{{ route('katalog.detail', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-infografis" role="tabpanel" aria-labelledby="dataList-infografis-tab" tabindex="0">
            <div class="container">
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-5 g-3 g-sm-3 g-md-3 g-lg-3">
                    @foreach($datas as $data)
                        @if($data->status == "Accepted" && $data->kategori == "Infografis")
                            <div class="col col-sm-12 col-md-6">
                                <div class="card h-100">
                                    @if($data->image == NULL)
                                        <img src="{{ asset('img/no-image.png') }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @else
                                        <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-center">{{$data->nama}}</h5>
                                        <p class="card-text text-truncate text-center">{{$data->deskripsi}}</p>
                                        <p class="card-text">
                                            Kategori : {{$data->kategori}}
                                            <br>
                                            Keyword : {{$data->kata_kunci}}
                                            <br>
                                            Sumber : {{$data->sumber}}
                                            <br>
                                        </p>
                                        <div class="btn-toolbar justify-content-center mt-auto" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                                <button class="btn btn-outline-primary"><a href="{{ route('katalog.detail', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-arsip" role="tabpanel" aria-labelledby="dataList-arsip-tab" tabindex="0">
            <div class="container">
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-5 g-3 g-sm-3 g-md-3 g-lg-3">
                    @foreach($datas as $data)
                        @if($data->status == "Accepted" && $data->kategori == "Arsip Lembaga")
                            <div class="col col-sm-12 col-md-6">
                                <div class="card h-100">
                                    @if($data->image == NULL)
                                        <img src="{{ asset('img/no-image.png') }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @else
                                        <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-center">{{$data->nama}}</h5>
                                        <p class="card-text text-truncate text-center">{{$data->deskripsi}}</p>
                                        <p class="card-text">
                                            Kategori : {{$data->kategori}}
                                            <br>
                                            Keyword : {{$data->kata_kunci}}
                                            <br>
                                            Sumber : {{$data->sumber}}
                                            <br>
                                        </p>
                                        <div class="btn-toolbar justify-content-center mt-auto" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                                <button class="btn btn-outline-primary"><a href="{{ route('katalog.detail', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-kajian" role="tabpanel" aria-labelledby="dataList-kajian-tab" tabindex="0">
            <div class="container">
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-5 g-3 g-sm-3 g-md-3 g-lg-3">
                    @foreach($datas as $data)
                        @if($data->status == "Accepted" && $data->kategori == "Kajian")
                            <div class="col col-sm-12 col-md-6">
                                <div class="card h-100">
                                    @if($data->image == NULL)
                                        <img src="{{ asset('img/no-image.png') }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @else
                                        <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-center">{{$data->nama}}</h5>
                                        <p class="card-text text-truncate text-center">{{$data->deskripsi}}</p>
                                        <p class="card-text">
                                            Kategori : {{$data->kategori}}
                                            <br>
                                            Keyword : {{$data->kata_kunci}}
                                            <br>
                                            Sumber : {{$data->sumber}}
                                            <br>
                                        </p>
                                        <div class="btn-toolbar justify-content-center mt-auto" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                                <button class="btn btn-outline-primary"><a href="{{ route('katalog.detail', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-database" role="tabpanel" aria-labelledby="dataList-database-tab" tabindex="0">
            <div class="container">
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-5 g-3 g-sm-3 g-md-3 g-lg-3">
                    @foreach($datas as $data)
                        @if($data->status == "Accepted" && $data->kategori == "Database")
                            <div class="col col-sm-12 col-md-6">
                                <div class="card h-100">
                                    @if($data->image == NULL)
                                        <img src="{{ asset('img/no-image.png') }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @else
                                        <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-center">{{$data->nama}}</h5>
                                        <p class="card-text text-truncate text-center">{{$data->deskripsi}}</p>
                                        <p class="card-text">
                                            Kategori : {{$data->kategori}}
                                            <br>
                                            Keyword : {{$data->kata_kunci}}
                                            <br>
                                            Sumber : {{$data->sumber}}
                                            <br>
                                        </p>
                                        <div class="btn-toolbar justify-content-center mt-auto" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                                <button class="btn btn-outline-primary"><a href="{{ route('katalog.detail', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-lainnya" role="tabpanel" aria-labelledby="dataList-lainnya-tab" tabindex="0">
            <div class="container">
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-5 g-3 g-sm-3 g-md-3 g-lg-3">
                    @foreach($datas as $data)
                        @if($data->status == "Accepted" && $data->kategori == "Lainnya")
                            <div class="col col-sm-12 col-md-6">
                                <div class="card h-100">
                                    @if($data->image == NULL)
                                        <img src="{{ asset('img/no-image.png') }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @else
                                        <img src="{{ asset('https://satudatapadjadjaran.site/storage/' . $data->image) }}" class="card-img-top img-fluid" alt="Header {{$data->nama}}">
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-center">{{$data->nama}}</h5>
                                        <p class="card-text text-truncate text-center">{{$data->deskripsi}}</p>
                                        <p class="card-text">
                                            Kategori : {{$data->kategori}}
                                            <br>
                                            Keyword : {{$data->kata_kunci}}
                                            <br>
                                            Sumber : {{$data->sumber}}
                                            <br>
                                        </p>
                                        <div class="btn-toolbar justify-content-center mt-auto" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                                <button class="btn btn-outline-primary"><a href="{{ route('katalog.detail', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center mt-4">
        <a href="{{ route('katalog.add') }}"><button class="btn btn-secondary"><i class="fa-regular fa-square-plus fa-xl"></i></button></a>
    </div>
</div>
@endsection

@section('scripts')

@endsection
