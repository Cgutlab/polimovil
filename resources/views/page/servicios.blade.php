@extends('layouts.app')

@section('title')

	Servicios

@endsection

@section('content')



	@foreach($contenidos as $contenido)



		<div class="content-text-hero mb-3">

			<div class="wrapper row flex-column justify-content-end hero-content-text-height">

				<h1 class="hero-content-text">{{ ucwords($contenido->section) }}</h1>

			</div>

		</div>



	@endforeach



	<div class="wrapper row pt-3 pb-3 font-weight-bold-600 text-left" style="font-size: 1.1em;">

		<div class="col-md-11 mx-auto mb-5 text-center font-weight-bold-600">

			{!! $contenido->text_es !!}

		</div>

		<div class="w-100"></div>

		<div class="col-sm-12">

			<div class="row mb-5">

				<div class="col-12">

					<div class="row">

						

						@foreach($datos as $dato)



							<div class="col-6 icon-center-mobile mb-5">

								<div class="row">

									<div class="col-sm-12 mb-sm-3 col-md-2">

										@if(file_exists(public_path().'/img/servicios/'.$dato->image))

											<img src="{{asset('img/servicios/'.$dato->image)}}" alt="">

										@endif

									</div>

									<div class="col-sm-12 mb-sm-3 col-md-10">

										<h4 class="font-weight-bold-600 mb-3">{{$dato->title_es}}</h4>

										{!! $dato->text_es !!}							

									</div>

								</div>

							</div>



						@endforeach	



					</div>

				</div>

			</div>

		</div>

	</div>



	<div style="background-color: rgba(128, 128, 128, 0.06);">

		<div class="wrapper row pt-5 pb-5">

			<div class="col-md-12 mb-3"><h2 class="font-weight-bold" style="color: #bcb6b6;">Post Venta</h2></div>

			<div class="col-md-10 mx-auto">

				<p class="text-center font-weight-bold-600 pb-5 pt-3" style="color: #0009; font-size: 1.2em;">Brindamos propuestas que generen valor y la mejor relación costo-beneficio. Nuestro equipo de profesionales está disponible para brindar una atención personalizada y una gestión técnica eficaz.</p>

			</div>

			<div class="col-md-9 mx-auto">

				<div class="row">

					<div class="col-md-4">

						<img class="d-block mx-auto" src="{{asset('img/servicios/ps1.png')}}" alt="">

						<p class="text-center color-azul-bootstrap pt-3 pb-3 font-weight-bold-600"><span style="font-size: 1.2em;" class="azul">Atención Personalizada</span></p>

					</div>

					<div class="col-md-4">

						<img class="d-block mx-auto" src="{{asset('img/servicios/ps2.png')}}" alt="">

						<p class="text-center color-azul-bootstrap pt-3 pb-3 font-weight-bold-600"><span style="font-size: 1.2em;" class="azul">Respuesta Inmediata</span></p>

					</div>

					<div class="col-md-4">

						<img class="d-block mx-auto" src="{{asset('img/servicios/ps3.png')}}" alt="">

						<p class="text-center color-azul-bootstrap pt-3 pb-3 font-weight-bold-600"><span style="font-size: 1.2em;" class="azul">Asistencia 24 hs</span></p>

					</div>

				</div>

			</div>

		</div>

	</div>

@endsection