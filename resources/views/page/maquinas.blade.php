@extends('layouts.app')
@section('title')
	Maquinas
@endsection
@section('content')
<div class="content-text-hero mb-3">
	<div class="wrapper row flex-column justify-content-end hero-content-text-height">
		<h1 class="hero-content-text">Máquinas</h1>
	</div>
</div>
<div class="pt-5 pb-5 section-maquinas">
	<div class="wrapper">
		<div class="row">
		@foreach($datos as $dato)
			<div class="col-md-4 mb-4">
				<div class="card w-100" style="">
					<div class="position-relative">
					@forelse ($dato->galerias as $item)
					@if(file_exists(public_path().'/img/maquina/'.$item->image))
						<img src="{{asset('img/maquina/'.$item->image)}}" class="card-img-top img-fluid" alt="...">
					@else
						<img class="responsive-img" src="{{asset('img/logo/'.$default->image)}}">
					@endif
					@break						
					@empty
						<img class="responsive-img" src="{{asset('img/logo/'.$default->image)}}">
					@endforelse
						<div class="position-absolute maquinas-content-mas d-none">
							<p class=""><a class="color-white" href="{{route('maquina', ['id' => $dato->id])}}"><i class="fas fa-plus"></i> ver más</a></p>
						</div>
					</div>
					<div class="card-body">
						<p class="card-text">{{$dato->title_es}}</p>
					</div>
				</div>			
			</div>
		@endforeach
		<div class="w-100"></div>
		@if(count($datos) > 1 )
			{{ $datos->links() }}
		@endif
		</div>
	</div>
</div>
@endsection