@extends('layouts')

@section('css')
.head-wrap {
	overflow: hidden;
	position: relative;
}
.head-bg {
	position: absolute;
	left: 0;
	width: 100%;
	height: auto;
}
.head-content {
	position: relative;
}
@endsection

@section('content')
<div class="container-fluid head-wrap">
    <img src="{{ asset('img/bg-1.png') }}" alt="" class="head-bg">
	<div class="container mt-5 head-content">
		<div class="row justify-content-center align-items-center">
			<div class="col">
				<img src="{{ asset('img/logo/bem-kema2.png') }}" alt="BEM" height="auto" width="20%">
			</div>
        </div>
        <div class="row justify-content-center align-items-center">
            <h1 class="fw-bold">Satu Data Padjadjaran</h1>
            <h4>Satu Data Padjadjaran adalah...</h4>
		</div>
	</div>
</div>
@endsection