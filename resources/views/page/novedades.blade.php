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
	@foreach($article as $fam)
	<div class="col s12 m6 l4">
		<div class="card" style="padding: 5px;">
			<a href="{{route('novedades.art', ['id' => $fam->id])}}">
			<div class="center-align" style="background: #E5E5E9; display: flex; align-items: center; justify-content: center; overflow: hidden; height: 200px;">
					@if(file_exists(public_path().'/img/novedad_articulo/'.$fam->image))
						<img class="responsive-img" src="{!!asset('img/novedad_articulo/'.$fam->image)!!}">
					@else
						<img class="responsive-img" src="{!!asset('img/logo/'.$default->image)!!}">
					@endif
			</div>
			</a>
			<div class="fw7" style="height: 90px; overflow: hidden;">
				<div class="rojo">{!!$fam->category->title_es!!}</div>
				<div class="gris fw5">{!!$fam->extract_es!!}</div>
			</div>
		</div>
	</div>
	@endforeach
</div>

</div>
</div>

@endsection

