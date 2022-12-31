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
            Semua Data disini <br>
            <div class="container ratio ratio-16x9">
                <iframe height="100vh" width="100%" src="https://docs.google.com/spreadsheets/d/1VjS_blEqoo-jrrSpMA_8dn3ZuqJQoCjtrmZ6QeAKVI0/edit#gid=0" frameborder="1" allowfullscreen title="Database Kelembagaan"></iframe>
            </div>
        </div>
        <div class="tab-pane fade" id="dataList-infografis" role="tabpanel" aria-labelledby="dataList-infografis-tab" tabindex="0">
            Infografis disini
        </div>
        <div class="tab-pane fade" id="dataList-arsip" role="tabpanel" aria-labelledby="dataList-arsip-tab" tabindex="0">
            Arsip disini
        </div>
        <div class="tab-pane fade" id="dataList-kajian" role="tabpanel" aria-labelledby="dataList-kajian-tab" tabindex="0">
            Kajian disini
        </div>
        <div class="tab-pane fade" id="dataList-database" role="tabpanel" aria-labelledby="dataList-database-tab" tabindex="0">
            Database disini
        </div>
        <div class="tab-pane fade" id="dataList-lainnya" role="tabpanel" aria-labelledby="dataList-lainnya-tab" tabindex="0">
            Lainnya disini
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <a href="{{ route('katalog.add') }}"><button class="btn btn-secondary"><i class="fa-regular fa-square-plus fa-xl"></i></button></a>
    </div>
</div>
@endsection

@section('scripts')

@endsection