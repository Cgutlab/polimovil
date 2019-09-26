@extends('layouts.app')
@section('title', 'Novedades')
@section('content')
<div class="header mb-3">
	<div class=" d-flex align-items-end container" style="min-height: 80px">
		<h1 class="mb-0" style="font-weight: 800;">Novedades</h1>
	</div>	
</div>	
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<a class="" style="color: #666666; font-weight: 500;" href="{{route('novedades')}}">NOVEDADES</a>
			<span>|</span>
			<a class="" style="color: #666666; font-weight: 500;" href="{{route('novedades.cat', $active->category->id)}}">{{strtoupper($active->category->title_es)}}</a>
			<span>|</span>
			<span class="" style="color: #666666;">{{strtoupper($active->title_es)}}</span><br>
		</div>
	</div>
	<div class="row justify-content-between novedades mb-5">
		<div class="col-sm-12 col-md-8 mt-4 mb-5">
			<div style="border-bottom: 3px solid #0088c7;">
				<span class="pt-2 pl-4 pr-4" style="color: #33509e; background-color: #f2f2f2; font-size: 16px; font-weight: 500;
    padding-bottom: 3px;">{!!$active->category->title_es!!}</span>
			</div>
			<div style="margin-top: 10px;">
				@if(file_exists(public_path().'/img/novedad_articulo/'.$active->image))
				<img class="img-fluid d-block mx-auto mb-4" src="{!!asset('img/novedad_articulo/'.$active->image)!!}">
				@else
				<img class="img-fluid d-block mx-auto mb-4" src="{!!asset('img/logo/'.$default->image)!!}">
				@endif
			</div>
			<h3 style="color: #0088c7; font-weight: 600; margin-bottom: 15px;">{!! $active->title_es !!}</h3>
			<div class="articulo-descripcion">{!!$active->text_es!!}</div>
			<div>
				<a href="" class="d-inline-block mt-3 mb-3" style="font-size: 20px; font-weight: 600;">
					<img src="{{'/img/help/descarga.png'}}" alt="" class="img-fluid"> 
					<span style="color: #3f5aa4; font-size: 18px; font-weight: 600;">Descagar</span> 
				</a>
			</div>			
		</div>
		<div class="col-sm-12 col-md-4 col-lg-3 novedades-sidebar">
			<h4 class="pl-3 pb-3 mb-3" style="color: #33509e; font-weight: 600;">Categorías</h4>
			@foreach($novedades as $fam)
			<a class="" style="@if(isset($active) && $active->id == $fam->id) font-weight: 700; @endif" href="{{route('novedades.cat', $fam->id)}}"><i class="fas fa-angle-double-right"></i> {!!$fam->title_es!!}</a><br>
			@endforeach
			<a class="gris fs18 fw5" style="{{(\Request::is('novedades/categorias')?'font-weight: 700;':'')}}" href="{{route('novedades')}}"><i class="fas fa-angle-double-right"></i> Todos</a><br>
		</div>
	</div>
</div>
@endsection

