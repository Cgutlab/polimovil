@extends('layouts.app')
@section('title', 'Empresa')
@section('content')
<div id="sliderEmpresa" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		@php $count = 0; @endphp
		@foreach($sliders as $sd)
		@if($count == 0)
		<li data-target="#sliderEmpresa" data-slide-to="{{$count}}" class="active"></li>
		@else
		<li data-target="#sliderEmpresa" data-slide-to="{{$count}}"></li>
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
<section class="empresa pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h2 class="mb-4" style="color: #0088c7;">Empresa</h2>
				<div class="content-text-empresa">
					{!!$content->text_es!!}
				</div>
				
			</div>
			<div class="col-sm-12 col-md-6">
				@if(file_exists(public_path().'/img/content/'.$content->image1))
					<img src="{!!asset('img/content/'.$content->image1)!!}" class="img-fluid">
				@else
					<img src="{!!asset('img/logo/'.$default->image)!!}" class="img-fluid">
				@endif				
			</div>
		</div>
	</div>
</section>
@endsection

