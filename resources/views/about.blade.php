@extends('template.user')

@section('title')
	SDP - About
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
<div class="container-fluid heading py-5">
    <div class="container col-10 d-flex justify-content-center align-items-center text-light">
        <div class="">
            <p class="fs-1 fw-bold">BEM Kema Unpad 2022</p>
            <p class="fs-3 fw-normal">Kabinet Garis Depan</p>
        </div>
        <div class="ms-auto">
            <img src="{{ asset('img/logo/logo-kabinet.png') }}" width="100" alt="">
        </div>
    </div>
    <div class="container col-10">
        <a href="#mainSection" class="btn btn-success">Tentang Kami</a>
    </div>
</div>
<div class="container-fluid content py-5" id="mainSection">
    <div class="container">
        <p class="fs-1 fw-bold">Biro Riset Data dan Analisis</p>
        <p class="fs-5 fw-normal" style="text-align: justify;">
            Biro Riset Data dan Analisis merupakan sebuah biro yang bertanggung jawab melakukan riset data dan analisis kebutuhan BEM Kema Unpad, 
            dimana riset tersebut bertujuan untuk melahirkan sebuah informasi atau landasan dari sebuah kebijakan agar kebijakan tersebut menjadi tepat sasaran. 
            Selain itu, Biro Riset Data dan Analisis memiliki tanggung jawab untuk menjadi pionir pemusatan data dan informasi di Kema Unpad
            melalui program kerja <strong>"Satu Data Padjadjaran"</strong>
        </p>
    </div>
    <div class="container">
        <p class="fs-1 fw-bold text-end">Satu Data Padjadjaran</p>
        <p class="fs-5 fw-normal" style="text-align: justify;">
            Satu Data Padjadjaran (SDP) merupakan sebuah platform berbasis website yang berisi integrasi data. 
            Data yang diintegrasikan adalah data yang dihimpun dari Kema Unpad dalam berbagai sektor. 
            Mulai  dari data soal arsip organisasi yang terbuka, arsip data kemahasiswaan, pustaka keilmuan, arsip kegiatan dan lain-lain. 
            SDP dapat diakses dan digunakan oleh Kema Unpad yang membutuhkan. 
            Selain itu, Kema Unpad juga dapat mengajukan entri data yang dirasa penting agar dapat dipublikasikan di SDP
        </p>
    </div>
    <div class="container text-center fs-5">
        <p class="fs-1 fw-bold">Struktur</p>
        <img src="{{ asset('img/assets/Struktur.png') }}" class="img-thumbnail" alt="Struktur Biro">
        <p class="fs-4 text-start">Penjelasan :</p>
        <p>
            <ol style="text-align: justify;">
                <li>
                    Tim Persiapan
                    <p>
                        Tim Persiapan merupakan tim yang melakukan segala persiapan pra-survei
                        seperti membuat kerangka riset dengan menggunakan prinsip data driven/informed
                        policy sesuai kebutuhan.
                    </p>
                </li>
                <li>
                    Tim Analisis Data
                    <p>
                        Tim Analisis data merupakan tim yang melakukan eksplorasi, pengolahan, dan interpretasi data 
                        hingga menjadi sebuah informasi
                    </p>
                </li>
                <li>
                    Tim Multimedia
                    <p>
                        Tim Multimedia merupakan tim yang memiliki ranah kerja sebagai
                        pembuat visualisasi data, pengelola website dan akun media sosial, serta pembuat konten kreatif.
                    </p>
                </li>
            </ol>
        </p>
    </div>
</div>
@endsection