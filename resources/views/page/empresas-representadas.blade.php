@extends('layouts.app')
@section('title')
	Casos de Éxito
@endsection
@section('content')
<div class="content-text-hero mb-5">
	<div class="wrapper row flex-column justify-content-end hero-content-text-height">
		<h1 class="hero-content-text">Empresas Representadas</h1>
	</div>
</div>
<div>
	<div class="wrapper row section-empresas-representadas">
		@foreach($datos as $dato)
			<div class="col-md-3 mb-5">
				<div class="card" style="">
					<a @if($dato->link) target="_blank" href="{{$dato->link}}" @endif class="card" style="">
						@if(file_exists(public_path().'/img/representada/'.$dato->image))
					  		<img class="card-img-top" src="{{asset('img/representada/'.$dato->image)}}" alt="Card image cap">
						@endif
					</a>
					<ul class="list-group list-group-flush">
					    <li class="list-group-item text-center">{{ $dato->title_es }} @if($dato->file) <a href="{{asset('img/representada/'.$dato->file)}}" target="_blank"><span class="pull-right"><i class="fas fa-download"></i></span></a> @endif</li>
					</ul>
				</div>
			</div>
		@endforeach
	</div>
	<div class="w-100 pt-5"></div>	
</div>

@endsection