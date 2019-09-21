@extends('layouts.app')

@section('title')

Soluciones a Medida

@endsection

@section('content')

	<div class="content-text-hero mb-5">

		<div class="wrapper row flex-column justify-content-end hero-content-text-height">

			<h1 class="hero-content-text">Soluciones a medida</h1>

		</div>

	</div>

<div class="wrapper mb-5 content-soluciones">

	<div class="row">



		@php $items_contenidos = 0; @endphp



		@foreach($contenidos as $contenido)



			@php $items_contenidos = $items_contenidos + 1; @endphp

				

			@if( $items_contenidos % 2 )



				<div class="col-sm-12 mb-5">

					<div class="row">

						<div class="col-sm-12 col-md-5">

							@foreach($contenido->imagenes as $items_slider_img)

								@if(file_exists(public_path().'/img/solucion/'.$items_slider_img->image))

									<img src="{{ asset('img/solucion/'.$items_slider_img->image) }} " style="width:100%;">

								@else

									<img src="{{ asset('img/logo/default.png') }} " style="width:100%;">

								@endif

							@endforeach

						</div>



						<div class="col-2">

							@if(file_exists(public_path().'/img/solucion/'.$contenido->icon))

								<img class="d-lg-block d-md-none d-xs-none mx-auto" src=" {{asset('img/solucion/'.$contenido->icon)}} " alt="">

							@endif

							<div class="linerar-vertical"></div>

						</div>



						<div class="col-sm-12 col-md-5">

							<h3 class="color-azul-bootstrap font-weight-bold-600 mb-4"><span>{{ $contenido->title_es }}</span><br> {{ $contenido->subtitle_es }}</h3>

							{!! $contenido->text_es !!}

						</div>

						

					</div>

		

				</div>



			@else



				<div class="col-sm-12 mb-5">

					<div class="row">



						<div class="col-sm-12 col-md-5">

							<h3 class="color-azul-bootstrap font-weight-bold-600 mb-4"><span>{{ $contenido->title_es }}</span><br> {{ $contenido->subtitle_es }}</h3>

							{!! $contenido->text_es !!}

						</div>



						<div class="col-2">

							@if(file_exists(public_path().'/img/solucion/'.$contenido->icon))

								<img class="d-lg-block d-md-none d-xs-none mx-auto " src=" {{asset('img/solucion/'.$contenido->icon)}} " alt="">

							@endif

							<div class="linerar-vertical">

								

							</div>

						</div>



						<div class="col-sm-12 col-md-5">

							@foreach($contenido->imagenes as $items_slider_img)

								@if(file_exists(public_path().'/img/solucion/'.$items_slider_img->image))

									<img src="{{ asset('img/solucion/'.$items_slider_img->image) }} " style="width:100%; height: 100%;">

								@endif

							@endforeach

						</div>

						

					</div>

		

				</div>



			@endif



		@endforeach

	</div>

</div>

@endsection