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
	height: 10vh;
	object-fit: cover;
}

.content {
    background-color: #EEEFF7;
}

.wrapper-font {
	color: #FFFFFF;
	font-family: 'Montserrat', Sans-serif;
}
@endsection

@section('content')
<div class="container-fluid heading p-4">
	<div class="container text-light">
		<div class="row row-cols-1 row-cols-lg-2 gx-2 gx-lg-2 align-items-center">
			<div class="col col-lg-8">
				<div class="row"><p class="fw-bold display-3 font-montserrat" style="letter-spacing: 5px;">Satu Data<br>Padjadjaran</p></div>
				<div class="row"><p class="fw-semibold fst-italic fs-3 font-montserrat" style="letter-spacing: 5px;">Biro Riset Data dan Analisis <br>BEM Kema Unpad 2022</p></div>
			</div>
			<div class="col col-lg-4 py-4 ms-auto d-none d-lg-block">
				<img src="{{ asset('img/logo/sdp.png') }}" width="100%" alt="BEM Kema">
			</div>
		</div>
	</div>
</div>
<div class="container-fluid content py-5">
	<div class="container">
		<div class="text-center fs-4">
			<p class="font-montserrat"><strong>Satu Data Padjadjaran (SDP) </strong>merupakan sebuah platform berbasis website yang berisi integrasi data. Data yang diintegrasikan adalah data yang dihimpun dari Kema Unpad dalam berbagai sektor.  Selain itu, Kema Unpad juga dapat mengajukan entri data yang dirasa penting agar dapat dipublikasikan di SDP.</p>
		</div>
		<div class="py-2">
			<hr style="height:4px;border-width:0;color:gray;background-color:gray">
		</div>
		<div class="container">
			<div class="row row-cols-1 row-cols-lg-4 g-5 g-lg-5">
				<div class="col">
					<div class="card text-center" style="border-radius:20px; background: linear-gradient(152.29deg, rgba(17, 68, 185, 0.7) 0.85%, rgba(54, 109, 237, 0.7) 100.44%); box-shadow: 2px 2px 50px rgba(0, 0, 0, 0.15); backdrop-filter: blur(25px);">
						<div class="card-body">
							<p class="fw-semibold wrapper-font display-2">{{$kontributor}}</p>
							<p class="fw-semibold wrapper-font h4 text-light">Kontributor</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-center" style="border-radius:20px; background: linear-gradient(150.62deg, rgba(199, 154, 53, 0.7) -1.93%, rgba(225, 199, 141, 0.7) 78.93%); box-shadow: 2px 2px 50px rgba(0, 0, 0, 0.15); backdrop-filter: blur(25px);">
						<div class="card-body">
							<p class="fw-semibold wrapper-font display-2">{{$kajian}}</p>
							<p class="fw-semibold wrapper-font h4 text-light">Kajian</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-center" style="border-radius:20px; background: linear-gradient(150.67deg, rgba(95, 95, 95, 0.7) 1.71%, rgba(194, 194, 194, 0.7) 121.49%); box-shadow: 2px 2px 50px rgba(0, 0, 0, 0.15); backdrop-filter: blur(25px);">
						<div class="card-body">
							<p class="fw-semibold wrapper-font display-2">{{$infografis}}</p>
							<p class="fw-semibold wrapper-font h4 text-light">Infografis</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-center" style="border-radius:20px; background: linear-gradient(158.28deg, rgba(255, 35, 101, 0.7) 10.3%, rgba(255, 115, 157, 0.7) 114.46%), linear-gradient(158.28deg, rgba(255, 35, 101, 0.7) 10.3%, rgba(255, 115, 157, 0.7) 114.46%); box-shadow: 2px 2px 50px rgba(0, 0, 0, 0.15); backdrop-filter: blur(25px);">
						<div class="card-body">
							<p class="fw-semibold wrapper-font display-2">{{$total}}</p>
							<p class="fw-semibold wrapper-font h4 text-light">Total Data</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid py-4 head-content">
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
						<a class="stretched-link" href="{{ route('katalog.home') }}"></a>
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
						<a class="stretched-link" href="{{ route('katalog.home') }}"></a>
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
						<a class="stretched-link" href="{{ route('katalog.home') }}"></a>
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
						<a class="stretched-link" href="{{ route('katalog.home') }}"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid py-4" style="background-color: transparent; background-image: linear-gradient(180deg, #07266E 0%, #2752B8 51%);">
	<p class="fw-bold h4 text-center text-light">Kontributor Data</p>
	<div class="container swiper mySwiper">
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
			slidesPerView: 1,
			spaceBetween: 10,
		},
		540: {
			slidesPerView: 2,
			spaceBetween: 10,
		},
		768: {
			slidesPerView: 4,
			spaceBetween: 20,
		},
		1024: {
			slidesPerView: 7,
			spaceBetween: 30,
		},
	},
});
@endsection