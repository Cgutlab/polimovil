@extends('layouts.app')
@section('title', 'Familias')
@section('content')
<div class="header">
	<div class=" d-flex align-items-end container" style="min-height: 80px">
		<a href="{{route('productos.fam')}}" class="mb-0 font-weight-bold d-block" style="line-height: 58px;"><i class="fas fa-angle-double-left"></i> Volver</a>
	</div>	
</div>
<div aria-label="breadcrumb" class="container mt-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('productos.fam')}}" style="font-weight: 500; color: #737373;">Productos</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-weight: 500; color: #737373;">Industrial</li>
  </ol>
</div>
<div class="container pt-5 pb-5 rp-movil">
	<div class="row align-items-start rOrderMovil">
		<div class="col-sm-12 col-md-4 col-lg-3 mb-4">
			@include('page.partials.sidebar-collapse')
		</div>
		<div class="col-sm-12 col-md-8 col-lg-9 row mx-auto">
			@foreach($productos as $article)
			<div class="col-sm-12 col-md-4 mb-3" >
				<div class="card w-100 mb-4">
					<div class="position-relative mb-3">
						@forelse($article->images as $imgdest)
							@if(file_exists(public_path().'/img/gallery/'.$imgdest->image))
								<img class="img-fluid w-100" style="border: 1px solid #dadada;" src="{!!asset('img/gallery/'.$imgdest->image)!!}">
							@else
								<img class="img-fluid w-100" style="border: 1px solid #dadada;" src="{!!asset('img/logo/'.$default->image)!!}">
							@endif
							@break
						@empty
							<img src="{!!asset('img/logo/'.$default->image)!!}">
						@endforelse
						<div class="position-absolute capa-product" style="">
							<a href="{{route('productos.art', ['id' => $article->id])}}"><i class="fas fa-plus"></i> ver más</a>
						</div>
					</div>
					<p class="card-content editorRico blanco text-center" style="">
						{!!$article->title_es!!}
					</p>		
				</div>
			</div>
			@endforeach
			@foreach($familias as $family)
			<div class="col-sm-12 col-md-4 mb-3" >
				<div class="card w-100 mb-4" style="">				
					<div class="position-relative mb-3">
						@if(file_exists(public_path().'/img/producto_familia/'.$family->image))
						<img class="img-fluid w-100" style="border: 1px solid #dadada;" src="{!!asset('img/producto_familia/'.$family->image)!!}">
						@else
						<img class="img-fluid w-100" style="border: 1px solid #dadada;" src="{!!asset('img/logo/'.$default->image)!!}">
						@endif
						<div class="position-absolute capa-product" style="">
							<a href="{{route('productos.sub', ['id' => $family->id])}}"><i class="fas fa-plus"></i> ver más</a>
						</div>				
					</div>
					<p class="card-content editorRico blanco text-center">
						{!!$family->title_es!!}
					</p>						
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection

