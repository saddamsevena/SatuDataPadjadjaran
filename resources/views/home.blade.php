@extends('template.user')

@section('title')
	Satu Data Padjadjaran
@endsection

@section('css')
.head-content {
	background-image: url(/img/bg-1.png);
	background-size: cover;
	position: relative;
	background-repeat: no-repeat;
}

.heading {
    background-color: #1C213C;
}

.swiper {
	width: 100%;
	height: 100%;
}

.swiper-slide {
	text-align: center;
	font-size: 18px;

	/* Center slide text vertically */
	display: -webkit-box;
	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;
	-webkit-box-pack: center;
	-ms-flex-pack: center;
	-webkit-justify-content: center;
	justify-content: center;
	-webkit-box-align: center;
	-ms-flex-align: center;
	-webkit-align-items: center;
	align-items: center;
}

.swiper-slide img {
	display: block;
	width: 10vw;
	object-fit: cover;
}

.card {
	text-align: justify;
}
@endsection

@section('content')
<div class="container-fluid heading p-4">
	<div class="container text-light">
		<div class="row justify-content-between align-items-center">
			<div class="col-4 p-4">
				<img src="{{ asset('img/logo/bem-kema2.png') }}" width="70%" alt="BEM Kema">
			</div>
			<div class="col-8">
				<div class="row"><p class="fw-bold h1 mb-3">Satu Data Padjadjaran</p></div>
				<div class="row"><p class="fw-semibold h3 mb-3">Biro Riset Data dan Analisis BEM Kema Unpad</p></div>
				<div class="row">
					<p class="fw-normal h4" style="text-align: justify;">
						Satu Data Padjadjaran (SDP) merupakan sebuah platform berbasis website yang berisi integrasi data. 
						Data yang diintegrasikan adalah data yang dihimpun dari Kema Unpad dalam berbagai sektor
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid p-4 head-content">
	<div class="container gap-3">
		<p class="text-center fw-bold fs-3">Apa yang kami kumpulkan?</p>
		<div class="row row-cols-2">
			<div class="col p-2">
				<div class="card bg-light bg-opacity-75 shadow">
					<div class="card-body text-center">
						<i class="fa-solid fa-chart-pie fa-3x"></i>
						<p class="card-title h3">Infografis</p>
						<hr>
						<p class="card-text h5 fw-normal">Kumpulan informasi mengenai olahan data visual yang telah dilakukan oleh berbagai lembaga kemahasiswaan</p>
						<a class="stretched-link" href="{{ route('katalog.list') }}"></a>
					</div>
				</div>
			</div>
			<div class="col p-2">
				<div class="card bg-light bg-opacity-75 shadow">
					<div class="card-body text-center">
						<i class="fa-regular fa-folder-open fa-3x"></i>
						<p class="card-title h3">Arsip Lembaga</p>
						<hr>
						<p class="card-text h5 fw-normal">Kumpulan data arsip organisasi yang bersifat terbuka untuk umum dari berbagai lembaga kemahasiswaan</p>
						<a class="stretched-link" href="{{ route('katalog.list') }}"></a>
					</div>
				</div>
			</div>
			<div class="col p-2">
				<div class="card bg-light bg-opacity-75 shadow">
					<div class="card-body text-center">
						<i class="fa-solid fa-file-lines fa-3x"></i>
						<p class="card-title h3"></i>Kajian</p>
						<hr>
						<p class="card-text h5 fw-normal">Informasi mengenai kajian-kajian yang telah dilakukan oleh berbagai lembaga kemahasiswan</p>
						<a class="stretched-link" href="{{ route('katalog.list') }}"></a>
					</div>
				</div>
			</div>
			<div class="col p-2">
				<div class="card bg-light bg-opacity-75 shadow">
					<div class="card-body text-center">
						<i class="fa-solid fa-database fa-3x"></i>
						<p class="card-title h3"></i>Database</p>
						<hr>
						<p class="card-text h5 fw-normal">Kumpulan informasi database yang telah dihimpun oleh berbagai lembaga kemahasiswaan</p>
						<a class="stretched-link" href="{{ route('katalog.list') }}"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid bg-secondary bg-gradient py-4 bg-opacity-75">
	<p class="fw-bold h4 text-center text-light">Kontributor Data</p>
	<div class="swiper mySwiper">
		<div class="swiper-wrapper align-items-center">
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/faperta.png') }}" alt="BEM Faperta"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/fapet.png') }}" alt="BEM Fapet"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/fapsi.png') }}" alt="BEM Fapsi"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/feb.png') }}" alt="BEM FEB"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/ff.png') }}" alt="BEM FF"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/fh.png') }}" alt="BEM FH"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/FIB.png') }}" alt="BEM FIB"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/fikom.png') }}" alt="BEM Fikom"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/fisip.png') }}" alt="BEM FISIP"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/fk.png') }}" alt="BEM FK"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/fkep.png') }}" alt="BEM FKep"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/FKG.png') }}" alt="BEM FKG"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/fmipa.png') }}" alt="BEM FMIPA"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/fpik.png') }}" alt="BEM FPIK"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/FTG.png') }}" alt="BEM FTG"></div>
			<div class="swiper-slide"><img src="{{ asset('img/logo/fakultas/ftip.png') }}" alt="BEM FTIP"></div>
		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-pagination"></div>
	</div>
</div>
@endsection

@section('scripts')
var swiper = new Swiper(".mySwiper", {
	autoplay: {
		delay: 2500,
		disableOnInteraction: false,
	},
	loop: true,
	loopFillGroupWithBlank: true,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
		dynamicBullets: true,
	},
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	breakpoints: {
		360: {
			slidesPerView: 3,
			spaceBetween: 10,
		},
		540: {
			slidesPerView: 4,
			spaceBetween: 10,
		},
		768: {
			slidesPerView: 6,
			spaceBetween: 20,
		},
		1024: {
			slidesPerView: 8,
			spaceBetween: 30,
		},
	},
});
@endsection