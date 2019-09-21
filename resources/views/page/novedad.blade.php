@extends('layouts.app')

@section('title')

Novedades

@endsection

@section('content')

<div class="container mt-35" style="width: 87%; padding-top: 35px;">
<div class="row">
<div class="col l3 s12 right">
<div class="col s12 gris fs18 fw7" style="border-bottom: 2px solid #58585A; padding: 0 0 7px 0; margin: 0;">CATEGORÍAS</div>
@foreach($novedades as $fam)
	<a class="gris fs18 fw5" style="padding: 0; margin: 0; @if(isset($active) && $active->id == $fam->id) font-weight: 700; @endif" href="{{route('novedades.cat', $fam->id)}}">{!!$fam->title_es!!}</a><br>
@endforeach
<a class="gris fs18 fw5" style="padding: 0; margin: 0; {{(\Request::is('novedades/categorias')?'font-weight: 700;':'')}}" href="{{route('novedades')}}">Todos</a><br>
</div>
<div class="col l9 s12">
	<a class="fw7 gris" href="{{route('novedades')}}">NOVEDADES</a>
	|
	<a class="fw7 gris" href="{{route('novedades.cat', $active->category->id)}}">{{strtoupper($active->category->title_es)}}</a>
	|
	<span class="fw7 gris">{{strtoupper($active->title_es)}}</span><br>
	<div style="margin-top: 10px;">
	@if(file_exists(public_path().'/img/novedad_articulo/'.$active->image))
		<img class="responsive-img" src="{!!asset('img/novedad_articulo/'.$active->image)!!}">
	@else
		<img class="responsive-img" src="{!!asset('img/logo/'.$default->image)!!}">
	@endif
	</div>
	<div class="fw7" style="">
		<div class="rojo">{!!$active->title_es!!}</div>
		<div class="gris fw5">{!!$active->text_es!!}</div>
	</div>
</div>

</div>
</div>

@endsection

