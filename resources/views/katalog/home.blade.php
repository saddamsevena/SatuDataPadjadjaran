@extends('template.user')

@section('title')
	SDP - Katalog Data
@endsection

@section('css')
.heading {
    background-color: #1C213C;
}
.wrapper {
    background: linear-gradient(62.46deg, #07266E 28.76%, rgba(7, 38, 110, 0) 177.81%)
}
.wrapper-font {
	font-family: 'Montserrat';
	color: #FFFFFF;
}
.content {
    background-color: #EEEFF7;
}
@endsection

@section('content')
<div class="container-fluid heading py-4">
	<div class="container col-10 text-center text-light">
		<p class="fw-semibold fs-1">Katalog Satu Data Padjadjaran</p>
	</div>
</div>
<div class="container-fluid p-4 content d-flex justify-content-center">
	<div class="col-lg-6 col-md-10 col-sm-12 gap-3">
		<div class="row row-cols-sm-2 d-flex justify-content-center">
			<div class="col-sm p-2">
				<div class="card shadow">
					<div class="card-body text-center">
						<i class="fa-solid fa-chart-pie fa-2x"></i>
						<p class="card-title fs-5">Infografis</p>
						<a class="stretched-link" href="{{ route('katalog.list') }}"></a>
					</div>
				</div>
			</div>
			<div class="col-sm p-2">
				<div class="card shadow">
					<div class="card-body text-center">
						<i class="fa-regular fa-folder-open fa-2x"></i>
						<p class="card-title fs-5">Arsip Lembaga</p>
						<a class="stretched-link" href="{{ route('katalog.list') }}"></a>
					</div>
				</div>
			</div>
			<div class="col-sm p-2">
				<div class="card shadow">
					<div class="card-body text-center">
						<i class="fa-solid fa-file-lines fa-2x"></i>
						<p class="card-title fs-5"></i>Kajian</p>
						<a class="stretched-link" href="{{ route('katalog.list') }}"></a>
					</div>
				</div>
			</div>
			<div class="col-sm p-2">
				<div class="card shadow">
					<div class="card-body text-center">
						<i class="fa-solid fa-database fa-2x"></i>
						<p class="card-title fs-5"></i>Database</p>
						<a class="stretched-link" href="{{ route('katalog.list') }}"></a>
					</div>
				</div>
			</div>
			<div class="col-sm-6 p-2 align-self-center">
				<div class="card shadow">
					<div class="card-body text-center">
						<i class="fa-solid fa-database fa-2x"></i>
						<p class="card-title fs-5"></i>Lainnya</p>
						<a class="stretched-link" href="{{ route('katalog.list') }}"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid content pb-5">
	<div class="container">
		<div class="text-center fs-4">
			<p class="font-montserrat"><strong>Satu Data Padjadjaran (SDP) </strong>merupakan sebuah platform berbasis website yang berisi integrasi data. Data yang diintegrasikan adalah data yang dihimpun dari Kema Unpad dalam berbagai sektor.  Selain itu, Kema Unpad juga dapat mengajukan entri data yang dirasa penting agar dapat dipublikasikan di SDP.</p>
		</div>
		<div class="py-2">
			<hr style="height:4px;border-width:0;color:gray;background-color:gray">
		</div>
		<div class="container">
			<p class="fs-4 fw-semibold text-center">Data Terkumpul :</p>
			<div class="row row-cols-1 row-cols-lg-4 g-5 g-lg-5">
				<div class="col">
					<div class="card text-center" style="border-radius:20px; background: linear-gradient(152.29deg, rgba(17, 68, 185, 0.7) 0.85%, rgba(54, 109, 237, 0.7) 100.44%); box-shadow: 2px 2px 50px rgba(0, 0, 0, 0.15); backdrop-filter: blur(25px);">
						<div class="card-body">
							<p class="fw-semibold wrapper-font display-2">{{$infografis}}</p>
							<p class="fw-semibold wrapper-font h4 text-light">Infografis</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-center" style="border-radius:20px; background: linear-gradient(150.62deg, rgba(199, 154, 53, 0.7) -1.93%, rgba(225, 199, 141, 0.7) 78.93%); box-shadow: 2px 2px 50px rgba(0, 0, 0, 0.15); backdrop-filter: blur(25px);">
						<div class="card-body">
							<p class="fw-semibold wrapper-font display-2">{{$kajian}}</p>
							<p class="fw-semibold wrapper-font h4 text-light">Kajian Ilmiah</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-center" style="border-radius:20px; background: linear-gradient(150.67deg, rgba(95, 95, 95, 0.7) 1.71%, rgba(194, 194, 194, 0.7) 121.49%); box-shadow: 2px 2px 50px rgba(0, 0, 0, 0.15); backdrop-filter: blur(25px);">
						<div class="card-body">
							<p class="fw-semibold wrapper-font display-2">{{$database}}</p>
							<p class="fw-semibold wrapper-font h4 text-light">Database</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-center" style="border-radius:20px; background: linear-gradient(158.28deg, rgba(255, 35, 101, 0.7) 10.3%, rgba(255, 115, 157, 0.7) 114.46%), linear-gradient(158.28deg, rgba(255, 35, 101, 0.7) 10.3%, rgba(255, 115, 157, 0.7) 114.46%); box-shadow: 2px 2px 50px rgba(0, 0, 0, 0.15); backdrop-filter: blur(25px);">
						<div class="card-body">
							<p class="fw-semibold wrapper-font display-2">{{$arsip}}</p>
							<p class="fw-semibold wrapper-font h4 text-light">Arsip Lembaga</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection