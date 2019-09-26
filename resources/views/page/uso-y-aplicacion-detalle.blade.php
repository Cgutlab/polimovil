@extends('layouts.app')
@section('title', 'Uso y aplicaciones')
@section('content')
<div class="header">
	<div class=" d-flex align-items-end container" style="min-height: 80px">
		<h1 class="mb-0" style="font-weight: 800;">Usos y aplicaciones</h1>
	</div>	
</div>
<section class="uso-aplicaciones pt-5 pb-5">
	<div class="container pt-4">
		<div class="row">
			<div class="col-sm-12 col-md-4 col-lg-3 mb-5">
				<div id="wrapper">
				   <!-- Sidebar -->
				   <div id="sidebar-wrapper">
				      <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
				         @foreach($keypad->sortBy('order') as $keyp) {{-- familias --}}
				               <li class="">
				                  <a href="{!!route('uso-y-aplicaciones-detalle', ['id' => $keyp->id])!!}" class="principal position-relative {{$uso->id == $keyp->id ? 'rCollapseActive' : ''}}">
				                     {!!$keyp->title_es!!}
				                     <i class="fas fa-angle-right position-absolute" style="right: 0; top: 12px;"></i>
				                  </a>
				               </li>      
				         @endforeach
				      </ul>
				   </div>
				</div>
			</div>
			<div class="col-sm-12 col-md-8 col-lg-9">
				<div class="row mb-5">
					<div class="col-sm-12 col-md-5 mb-4">
						<div id="sliderUso" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								@php $count = 0; @endphp
								@foreach($uso->usoimage as $sd)
									@if($count == 0)
										<li data-target="#sliderUso" data-slide-to="{{$count}}" class="active"></li>
									@else
										<li data-target="#sliderUso" data-slide-to="{{$count}}"></li>
									@endif
									@php $count++; @endphp
								@endforeach
							</ol>
							<div class="carousel-inner">
								@php $count = 0; @endphp
								@foreach($uso->usoimage as $sd)
									@php $count++; @endphp
									@if($count == 1)
										<div class="carousel-item active">
											<img src="{!!asset('img/uso/'.$sd->image)!!}" class="w-100 img-fluid" style="object-fit: cover;">
											<div class="carousel-caption d-none d-md-block">
												<h1 style="color: #33509e;">{!!$sd->text_es!!}</h1>
											</div>
										</div>
									@else
										<div class="carousel-item">
											<img src="{!!asset('img/uso/'.$sd->image)!!}" class="w-100 img-fluid" style="object-fit: cover;">
											<div class="carousel-caption d-none d-md-block">
												<h1 style="color: #33509e;">{!!$sd->text_es!!}</h1>
											</div>
										</div>		
									@endif
								@endforeach
							</div>
						</div>						
					</div>
					<div class="col-sm-12 col-md-7">
						<h2 class="mb-3" style="color: #0088c7; font-weight: 600;">{{$uso->title_es}}</h2>
						<div class="content-descripcion-uso">
							{!! $uso->text_es !!}
						</div>
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-sm-12">
						<h3 style="color: #0088c7; font-weight: 600;">Productos del rubro</h3>
					</div>
				</div>
				<div class="row usos-product">
					@foreach($uso->product as $product)
						<div class="col-sm-12 col-md-4 mb-2" >
							<div class="card w-100 mb-4">
								<div class="position-relative mb-3">									
								@forelse($product->images as $imgdest)
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
										<a href="{!!route('productos.art', $product->id)!!}"><i class="fas fa-plus"></i> ver más</a>
									</div>
								</div>
								<p class="card-content text-center" style="">
									{!!$product->title_es!!}
								</p>		
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

