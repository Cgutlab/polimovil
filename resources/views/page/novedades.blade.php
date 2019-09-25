@extends('layouts.app')
@section('title', 'Novedades')
@section('content')
<div class="header mb-5">
	<div class=" d-flex align-items-end container" style="min-height: 80px">
		<h1 class="mb-0" style="font-weight: 800;">Novedades</h1>
	</div>	
</div>
<div class="container" style="">
	<div class="row novedades">
		<div class="col-sm-12 col-md-8 col-lg-9">
			@foreach($article as $fam)
			<div class="col s12 m6 l4">
				<div class="card mb-5" style="">
					<div class="" style="border-bottom: 3px solid #0088c7;">
						<span class="pt-2 pl-4 pr-4" style="color: #33509e; background-color: #f2f2f2; font-size: 16px; font-weight: 500; padding-bottom: 3px;
">{!!$fam->category->title_es!!}</span>
					</div>
					<div class="row">
						<div class="col-sm-12 col-lg-3 novedades-content-image">
							@if(file_exists(public_path().'/img/novedad_articulo/'.$fam->image))
								<img class="img-fluid w-100 h-100" style="object-fit: cover;" src="{!!asset('img/novedad_articulo/'.$fam->image)!!}">
							@else
								<img class="img-fluid w-100 h-100" style="object-fit: cover;" src="{!!asset('img/logo/'.$default->image)!!}">
							@endif							
						</div>
						<div class="col-sm-12 col-lg-9 novedades-content-descripcion">
							<div class="pl-4 pt-4 h-100" style="background-color: #f2f2f2;">
								<h4 style="color: #00318c; font-weight: 600;">Lorem ipsum dolor sit amet</h4>
								<p class="mb-4">{!!$fam->extract_es!!}</p>		
								<a href="{{route('novedades.art', ['id' => $fam->id])}}" class="mb-3 d-inline-block"><img src="{{asset('img/help/flecha.fw.png')}}" alt=""> VER MÁS</a>
							</div>						
						</div>
					</div>
				</div>
			</div>
			@endforeach
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

