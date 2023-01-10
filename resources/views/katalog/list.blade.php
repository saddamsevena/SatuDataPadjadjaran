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
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered text-center align-middle">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
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
                    @if($data->status == "Accepted")
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->nama}}</td>
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
                    @endif
                @endforeach
                </tbody>
            </table>
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
