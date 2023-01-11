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
<div class="container-fluid heading">
    <div class="container text-center py-4 text-light">
        <p class="fs-1 fw-bold">List Data</p>
    </div>
</div>
<div class="container-fluid py-4 content">
    <div class="container">
        <nav class="nav nav-pills flex-column flex-sm-row" id="dataList-tab" role="tablist">
            <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" id="dataList-all-tab" data-bs-toggle="pill" data-bs-target="#dataList-all" type="button" role="tab" aria-controls="dataList-all" aria-selected="true">Semua</a>
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
                @foreach($datas as $data)
                    @if($data->status == "Accepted")
                    <div class="card p-3 mb-3">
                        <div class="card-header text-center bg-white fs-5">{{$data->nama}}</div>
                        <div class="row row-cols-auto g-0">
                            <div class="col-auto col-sm-4 col-md-4 col-lg-4 align-items-center align-self-center">
                                @if($data->image == NULL)
                                <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @else
                                <img src="{{$data->image}}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @endif
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-6 align-items-center align-self-center">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">
                                        Kategori : {{$data->kategori}}
                                        <br>
                                        Keyword : {{$data->kata_kunci}}
                                        <br>
                                        Sumber : {{$data->sumber}}
                                        <br>
                                        Status : {{$data->status}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-2 flex-column align-items-center align-self-center">
                                <div class="btn-group-vertical">
                                    <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                    <button class="btn btn-outline-primary"><a href="{{ route('edit.data', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-infografis" role="tabpanel" aria-labelledby="dataList-infografis-tab" tabindex="0">
            <div class="container">
                @foreach($datas as $data)
                    @if($data->status == "Accepted" && $data->kategori == "Infografis")
                    <div class="card p-3 mb-3">
                        <div class="card-header text-center bg-white fs-5">{{$data->nama}}</div>
                        <div class="row row-cols-auto g-0">
                            <div class="col-auto col-sm-4 col-md-4 col-lg-4 align-items-center align-self-center">
                                @if($data->image == NULL)
                                <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @else
                                <img src="{{$data->image}}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @endif
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-6 align-items-center align-self-center">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">
                                        Kategori : {{$data->kategori}}
                                        <br>
                                        Keyword : {{$data->kata_kunci}}
                                        <br>
                                        Sumber : {{$data->sumber}}
                                        <br>
                                        Status : {{$data->status}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-2 flex-column align-items-center align-self-center">
                                <div class="btn-group-vertical">
                                    <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                    <button class="btn btn-outline-primary"><a href="{{ route('edit.data', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-arsip" role="tabpanel" aria-labelledby="dataList-arsip-tab" tabindex="0">
            <div class="container">
                @foreach($datas as $data)
                    @if($data->status == "Accepted" && $data->kategori == "Arsip Lembaga")
                    <div class="card p-3 mb-3">
                        <div class="card-header text-center bg-white fs-5">{{$data->nama}}</div>
                        <div class="row row-cols-auto g-0">
                            <div class="col-auto col-sm-4 col-md-4 col-lg-4 align-items-center align-self-center">
                                @if($data->image == NULL)
                                <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @else
                                <img src="{{$data->image}}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @endif
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-6 align-items-center align-self-center">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">
                                        Kategori : {{$data->kategori}}
                                        <br>
                                        Keyword : {{$data->kata_kunci}}
                                        <br>
                                        Sumber : {{$data->sumber}}
                                        <br>
                                        Status : {{$data->status}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-2 flex-column align-items-center align-self-center">
                                <div class="btn-group-vertical">
                                    <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                    <button class="btn btn-outline-primary"><a href="{{ route('edit.data', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-kajian" role="tabpanel" aria-labelledby="dataList-kajian-tab" tabindex="0">
            <div class="container">
                @foreach($datas as $data)
                    @if($data->status == "Accepted" && $data->kategori == "Kajian")
                    <div class="card p-3 mb-3">
                        <div class="card-header text-center bg-white fs-5">{{$data->nama}}</div>
                        <div class="row row-cols-auto g-0">
                            <div class="col-auto col-sm-4 col-md-4 col-lg-4 align-items-center align-self-center">
                                @if($data->image == NULL)
                                <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @else
                                <img src="{{$data->image}}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @endif
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-6 align-items-center align-self-center">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">
                                        Kategori : {{$data->kategori}}
                                        <br>
                                        Keyword : {{$data->kata_kunci}}
                                        <br>
                                        Sumber : {{$data->sumber}}
                                        <br>
                                        Status : {{$data->status}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-2 flex-column align-items-center align-self-center">
                                <div class="btn-group-vertical">
                                    <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                    <button class="btn btn-outline-primary"><a href="{{ route('edit.data', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-database" role="tabpanel" aria-labelledby="dataList-database-tab" tabindex="0">
            <div class="container">
                @foreach($datas as $data)
                    @if($data->status == "Accepted" && $data->kategori == "Database")
                    <div class="card p-3 mb-3">
                        <div class="card-header text-center bg-white fs-5">{{$data->nama}}</div>
                        <div class="row row-cols-auto g-0">
                            <div class="col-auto col-sm-4 col-md-4 col-lg-4 align-items-center align-self-center">
                                @if($data->image == NULL)
                                <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @else
                                <img src="{{$data->image}}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @endif
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-6 align-items-center align-self-center">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">
                                        Kategori : {{$data->kategori}}
                                        <br>
                                        Keyword : {{$data->kata_kunci}}
                                        <br>
                                        Sumber : {{$data->sumber}}
                                        <br>
                                        Status : {{$data->status}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-2 flex-column align-items-center align-self-center">
                                <div class="btn-group-vertical">
                                    <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                    <button class="btn btn-outline-primary"><a href="{{ route('edit.data', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-lainnya" role="tabpanel" aria-labelledby="dataList-lainnya-tab" tabindex="0">
            <div class="container">
                @foreach($datas as $data)
                    @if($data->status == "Accepted" && $data->kategori == "Lainnya")
                    <div class="card p-3 mb-3">
                        <div class="card-header text-center bg-white fs-5">{{$data->nama}}</div>
                        <div class="row row-cols-auto g-0">
                            <div class="col-auto col-sm-4 col-md-4 col-lg-4 align-items-center align-self-center">
                                @if($data->image == NULL)
                                <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @else
                                <img src="{{$data->image}}" class="img-fluid rounded-start" alt="Header {{$data->nama}}">
                                @endif
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-6 align-items-center align-self-center">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">
                                        Kategori : {{$data->kategori}}
                                        <br>
                                        Keyword : {{$data->kata_kunci}}
                                        <br>
                                        Sumber : {{$data->sumber}}
                                        <br>
                                        Status : {{$data->status}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto col-sm-4 col-md-4 col-lg-2 flex-column align-items-center align-self-center">
                                <div class="btn-group-vertical">
                                    <button class="btn btn-outline-primary"><a href="{{$data->tautan}}" class="nav-link">Tautan</a></button>
                                    <button class="btn btn-outline-primary"><a href="{{ route('edit.data', $data->id) }}" class="nav-link">Lihat Detail</a></button>    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="card-text text-center"><small class="text-muted">Last update : {{$data->updated_at}}</small></p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <a href="{{ route('katalog.add') }}"><button class="btn btn-secondary"><i class="fa-regular fa-square-plus fa-xl"></i></button></a>
    </div>
</div>
@endsection

@section('scripts')

@endsection
