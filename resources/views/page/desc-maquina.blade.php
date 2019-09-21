@extends('layouts.app')

@section('title')

@endsection

@section('content')

<style type="text/css">

	.EditorRico p{

		padding: 0;

		margin: 0;

	}

</style>

<div class="content-text-hero mb-5">

	<div class="wrapper row flex-column justify-content-end hero-content-text-height">

		<a href="{{route('maquinas')}}"><h1 class="hero-content-text"><i class="fas fa-angle-double-left"></i> Volver</h1></a>

	</div>

</div>

<div>

	<div class="wrapper row" style="margin-bottom: 50px;">

		<div class="col-md-6">

			<div class="slideshow-container position-relative">
				@forelse ($maquinas->galerias as $slider)
				<div class="mySlides fade">
				@if(file_exists(public_path().'/img/maquina/'.$slider->image))
					<img src="{{asset('img/maquina/'.$slider->image)}}" class="card-img-top img-fluid" alt="...">
				@else
					<img class="responsive-img" src="{{asset('img/logo/'.$default->image)}}">
				@endif
				</div>
				@break						
				@empty
				<div class="mySlides fade">
					<img class="responsive-img" src="{{asset('img/logo/'.$default->image)}}">
				</div>
				@endforelse

			</div>			

		</div>

		<div class="col-md-6">

			<h2 class="titulo-producto-individual">{{ $maquinas->title_es }}</h2>

			<div class="EditorRico">{!! $maquinas->text_es !!}</div>

			<div class="mb-2 mt-3">

				@if(file_exists(public_path().'/img/maquina_ficha/'.$maquinas->ficha) && $maquinas->ficha)

				<a href="{{asset('img/maquina_ficha/'.$maquinas->ficha)}}" target="_blank" class="btn btn-primary mr-5">Ficha técnica</a>

				@endif

				<a href="{{route('solicitar', ['id' => $maquinas->id])}}" class="btn btn-primary">Consultar</a>

			</div>

		</div>

	</div>

	@if(count($maquinas->esquemas) > 0)

	<div class="wrapper row pb-4 mt-3">

		<div class="col-md-12">

			<h3 class="subtitulo-producto-individual pb-2 color-azul-bootstrap font-weight-bold-600 mb-4">Esquemas</h3>

		</div>

		@foreach($maquinas->esquemas as $esq)

		<div class="col-sm-6 col-md-4 text-center">

			<img class="img-fluid" src="{{asset('img/esquema/'.$esq->image)}}" alt="">

			<p class="pl-3 mt2 font-weight-bold-600">{{$esq->title_es}}</p>

		</div>

{{-- 		<div class="col-sm-6 col-md-2">

			<img class="img-fluid" src="{{asset('img/ficha_producto/e2.jpg')}}" alt="">

			<p class="pl-3 mt2 font-weight-bold-600">Polvo</p>

		</div> --}}

		@endforeach

	</div>

	@endif

	@if(count($maquinas->prestaciones) > 0)

	<div class="wrapper row pb-4 section-prestaciones">

		<div class="col-md-12">

			<h3 class="subtitulo-producto-individual pb-2 color-azul-bootstrap font-weight-bold-600 mb-4">Prestaciones</h3>

		</div>

		<div class="col-md-12">

			<div class="row">

				@foreach($maquinas->prestaciones as $prest)

				<div class="col-md-2 col-sm-6  text-center">

					<img class="img-fluid" src="{{asset('img/prestacion/'.$prest->image)}}" alt="">

					<p class="font-weight-bold-600">{{$prest->title_es}}</p>

				</div>

{{-- 				<div class="col-md-2 col-sm-6">

					<img class="img-fluid" src="{{asset('img/ficha_producto/'.$prest->image)}}" alt="">

					<p class="font-weight-bold-600">{{$prest->title_es}}</p>

				</div> --}}

				@endforeach

			</div>

		</div>

	</div>

	@endif

	@if(count($maquinas->videos) > 0)

	<div class="wrapper row pb-4 section-prestaciones">

		<div class="col-md-12">

			<h3 class="subtitulo-producto-individual pb-2 color-azul-bootstrap font-weight-bold-600 mb-4">Videos</h3>

		</div>

		<div class="col-md-12">

			<div class="row">

				@foreach($maquinas->videos as $video)

					<div class="col-md-4 mb-5 text-center">

						<div class="card" style="">

							<iframe width="100%" height="280" src="https://www.youtube.com/embed/{!!$video->enlace!!}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

							{{-- <iframe style="max-width: 100%; max-height: 250px; border-radius: 5px;" width="853" height="480" src="{{ $video->enlace }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

						  	{{-- <div class="card-body"> --}}

						    	{{-- <p class="card-text">{{ $video->title_es }}</p> --}}

				 	 		{{-- </div> --}}

						</div>		

					</div>

				@endforeach

			</div>

		</div>

	</div>

	@endif

	@if(count($maquinas->relacionados) > 0)

	<div class="pt-4 pb-4" style="background-color: rgba(128, 128, 128, 0.06);">

		<div class="wrapper row pb-4 section-productos-relacionados">

			<div class="col-md-12 mb-3">

				<div class="row">

					<div class="col"><h3 class="font-weight-bold-600">Productos Relacionados</h3></div>

					<div class="col-md-7 linea oso-mobile-d-none"></div>

					<div class="col-1 d-inline-block mt-2 text-center oso-mobile-d-none"><i class="fas fa-plus icon-pructos-relacionados"></i></div>

				</div>

			</div>

			<div class="col-md-12">

				<div class="row">		

					@foreach($maquinas->relacionados as $rel)

					<div class="col-md-4">

						<a href="{{route('maquina', $rel->id)}}">

							@foreach($rel->galerias as $imgRel)

								<img class="img-fluid" src="{{asset('img/maquina/'.$imgRel->image)}}" alt="">

							@break

							@endforeach

							<p class="mt-3">{{$rel->title_es}}</p>

						</a>

					</div>

					@endforeach

				</div>

			</div>

		</div>

	</div>

	@endif

</div>

<script src="{{asset('js/slider.js')}}"></script>

@endsection