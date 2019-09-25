@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div id="sliderHome" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		@php $count = 0; @endphp
		@foreach($sliders as $sd)
		@if($count == 0)
		<li data-target="#sliderHome" data-slide-to="{{$count}}" class="active"></li>
		@else
		<li data-target="#sliderHome" data-slide-to="{{$count}}"></li>
		@endif
		@php $count++; @endphp
		@endforeach
	</ol>
	<div class="carousel-inner">
		@php $count = 0; @endphp
		@foreach($sliders as $sd)
			@php $count++; @endphp
			@if($count == 1)
				<div class="carousel-item active">
					<img src="{!!asset('img/slider/'.$sd->image)!!}">
					<div class="carousel-caption d-none d-md-block">
						<h1 style="color: #33509e;">{!!$sd->text_es!!}</h1>
					</div>
				</div>
			@else
				<div class="carousel-item">
					<img src="{!!asset('img/slider/'.$sd->image)!!}">
					<div class="carousel-caption d-none d-md-block">
						<h1 style="color: #35529C;">{!!$sd->text_es!!}</h1>
					</div>
				</div>		
			@endif
		@endforeach
	</div>
</div>
<section class="usos-aplicaciones p-5" style="background-color: #f1f1f1; padding-bottom: 90px !important;">
	<div class="container">
		<h2 class="text-center mb-5" style="color: #777777;">USOS Y APLICACIONES</h2>
		<div class="row">
			@foreach($familias as $fam)
				<div class="col-sm-12 col-md-4 col-lg-3 mb-3">
					<div style="display: flex; justify-content: center; align-items: center;">
						<div class="card w-100">					
							<div class="position-relative" style="">
								@if(file_exists(public_path().'/img/producto_familia/'.$fam->image))
									<img class="img-fluid mb-2 w-100" src="{!!asset('img/producto_familia/'.$fam->image)!!}">
								@else
									<img class="img-fluid mb-2 w-100" src="{!!asset('img/logo/'.$default->image)!!}">
								@endif
								<div class="position-absolute capa-product" style="bottom: 15px;">
									<a href="{{route('productos.sub', ['id' => $fam->id])}}"><i class="fas fa-plus"></i> ver más</a>							
								</div>
							</div>
							<p class="card-content editorRico blanco text-center" style="font-weight: 700; color: #868686;">
								{!!$fam->title_es!!}
							</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>		
	</div>
</section>
@foreach($contents as $content)
	@if($content->order == 'AA')
		<section class="linea-mas-completa pt-5 pb-5" style='background-image: url();'>
			<div class="container pt-4 pb-4">
				<div class="row justify-content-between position-relative">
					<div class="col-sm-12 col-md-6 col-lg-7">
						<h2 class="mb-3" style="color: #0088c7;">{{$content->title_es}}</h2>
						<div class="" style="color: #666666; font-weight: 700;">{!! $content->text_es !!}</div>
						<a href="{{route('productos.fam')}}" class="btn mt-3 color-white pr-4 pl-4" style="background-color: #0088c7;">Ver Productos</a>
					</div>
					<img src='{{asset("img/content/$content->image1")}}' alt="" class="position-absolute d-sm-none d-md-block col-md-4 img-fluid" style="right: 0; bottom: -10px; max-height: 330px;">	
				</div>
			</div>
		</section>
	@else
		<section class="linea-mas-completa pt-5 pb-5" style='background-image: url({{asset("img/content/$content->image1")}});'>
			<div class="container p-5">
				<div class="row justify-content-between position-relative">
					<div class="col-sm-12 text-center">
						<h1 class="color-white" style="font-weight: 900;">{{$content->title_es}}</h1>
						<h5 class="mb-4" style="color: #bbbbbb;">{!! $content->text_es !!}</h5>
						<a href="{{route('solicitar-presupuesto')}}" class="btn btn-primary pl-4 pr-4">Ingresar</a>
					</div>
				</div>
			</div>
		</section>
	@endif
@endforeach

@endsection