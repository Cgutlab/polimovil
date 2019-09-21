@extends('layouts.app')

@section('title')

	Casos de Éxito

@endsection

@section('content')

<div class="content-text-hero mb-5">

	<div class="wrapper row flex-column justify-content-end hero-content-text-height">

		<h1 class="hero-content-text">Casos de éxito</h1>

	</div>

</div>

<div>

	<div class="wrapper row section-casos-exitos">

		@foreach($datos as $dato)

			<div class="col-md-3 mb-5">

				<div class="card" style="">

					<div class="card" style="display: flex; justify-content: center; align-items: center; overflow: hidden;">

						@if(file_exists(public_path().'/img/casoexito/'.$dato->image))

					  		<img src="{{asset('img/casoexito/'.$dato->image)}}" alt="Card image cap" style="width: none!important; height: none!important; max-width: none!important;">

						@endif

					</div>

					<ul class="list-group list-group-flush">

					    <li class="list-group-item text-center">{{ $dato->title_es }}</li>

					</ul>

				</div>

			</div>

		@endforeach

	</div>

	<div class="w-100 pt-5"></div>	

</div>



@endsection