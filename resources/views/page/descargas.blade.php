@extends('layouts.app')
@section('title', 'Familias')
@section('content')
<div class="header">
	<div class=" d-flex align-items-end container" style="min-height: 80px">
		<h1 class="mb-0" style="font-weight: 800;">Descargas</h1>
	</div>	
</div>
<section class="Descargas pt-5 pb-5">
	<div class="container pt-5 pb-5">
		<div class="row">
			<div class="col-sm-12 d-flex align-items-center">
				<img src='{{asset("img/descarga/$descarga->image")}}' alt="">
				<div class="ml-4" style="max-width: 350px;">
					<h1 class="mb-3" style="color: #0088c7; font-weight: 600;">{{$descarga->title_es}}</h1>
					<a href="{{asset('img/descarga/'.$descarga->file)}}" target="_blank" class="d-inline-block mr-3" style="font-size: 25px;">
						<img src="{{'img/help/vista.png'}}" alt="" class="img-fluid">
					</a>
					<a href="{{asset('img/descarga/'.$descarga->file)}}" target="_blank" download class="" style="font-size: 25px;">
						<img src="{{'img/help/descarga.png'}}" alt="" class="img-fluid">
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

