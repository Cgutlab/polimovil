@extends('layouts.app')

@section('title')

Home

@endsection

@section('content')

  <div class="slider">
    <ul class="slides">
    @foreach($sliders as $sd)
      <li>
        <img src="{!!asset('img/slider/'.$sd->image)!!}">
        <div class="caption right-align">
          <h3 class="editorRico sd blanco fs40">{!!$sd->text_es!!}</h3>
        </div>
      </li>
    @endforeach
    </ul>
  </div>

	<div class="container" style="width: 87%;">
	<div class="center-align fs34 fw6 gris mt-35 mb-35">PRODUCTOS DESTACADOS</div>
	<div class="row">
	@foreach($products as $dest)

	<div class="col s12 m6 l3">
		<div style="display: flex; justify-content: center; align-items: center;">
		<a href="{{route('productos.art', $dest->id)}}">
		<div class="card center-align" style="width: 211px;">
			<div class="card-action" style="padding: 0 0 0 0;">
				<div style="background-image: url({{asset('img/help/article.jpg')}});background-repeat: no-repeat; background-size: cover; height: 38px; margin-bottom: 0; padding-bottom: 0;">
					<div class="row mb-0">
						<div class="col s6">
							
						</div>
						<div class="col s6">
							<span class="flex-center blanco fw6" style="height: 30px; padding-top: 5px;">
							Art. {!!$dest->code!!}
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="card-image" style="background: #E5E5E9; height: 211px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
				@forelse($dest->images as $imgdest)
					@if(file_exists(public_path().'/img/gallery/'.$imgdest->image))
						<img src="{!!asset('img/gallery/'.$imgdest->image)!!}">
					@else
						<img src="{!!asset('img/logo/'.$default->image)!!}">
					@endif
					@break
					@empty
					<img src="{!!asset('img/logo/'.$default->image)!!}">
				@endforelse
			</div>
			<div class="card-content editorRico blanco fw6 left-align" style="background: #58585A; padding: 10px; height: 85px; overflow: hidden;">
				{!!$dest->title_es!!}
			</div>
		</div>
		</a>
		</div>
	</div>

	@endforeach
	</div>
	<div class="center-align mt-50 mb-50"><a class="boton" href="{{route('productos.fam')}}">VER MÁS</a></div>
	</div>

	<div class="pt-35" style="background: #E7052D;">
	<div class="center-align fs24 fw6 blanco container pt-35">CALIDAD, SEGURIDAD Y PRODUCCIÓN</div>
	<div class="row container mb-0" style="width: 87%; padding-bottom: 90px;">
	@foreach($contents as $cont)
		<div class="col l3 m6 s12">
			<div class="center-align pt-35">
				@if(file_exists(public_path().'/img/content/'.$cont->image1))
					<img src="{!!asset('img/content/'.$cont->image1)!!}">
				@else
					<img src="{!!asset('img/logo/'.$default->image)!!}">
				@endif
			</div>
			<div class="center-align blanco fw6">
				{!!$cont->title_es!!}
			</div>
		</div>
	@endforeach
	</div>
	</div>
@endsection

