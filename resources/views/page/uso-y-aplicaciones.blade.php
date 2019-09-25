@extends('layouts.app')
@section('title', 'Familias')
@section('content')
<div class="header">
	<div class=" d-flex align-items-end container" style="min-height: 80px">
		<h1 class="mb-0" style="font-weight: 800;">Usos y aplicaciones</h1>
	</div>	
</div>
<section class="uso-aplicaciones pt-5 pb-5">
	<div class="container">
		<div class="row">
			@foreach($usos as $uso)
				<div class="col-sm-12 col-md-4 col-lg-3 mb-3" >
					<div class="card w-100 mb-4">
						<div class="position-relative mb-3">
							@foreach($uso->usoimage as $img)
								@if(file_exists(public_path().'/img/uso/'.$img->image) && $img->image)
									<img class="img-fluid w-100" src="{{asset('img/uso/'.$img->image)}}" alt="{{$img->title_es}}" style="max-height: 230px; min-height: 230px;">
								@else
									<img src="{{asset('img/logo/'.$default->image)}}" alt="{{$default->image}}" class="img-fluid w-100" style="max-height: 230px; min-height: 230px;">
								@endif
							@endforeach
							<div class="position-absolute capa-product" style="">
								<a href="{{route('uso-y-aplicaciones-detalle', ['id' => $uso->id])}}"><i class="fas fa-plus"></i> ver más</a>
							</div>
						</div>
						<p class="card-content text-center" style="color: #0088c7 !important; font-size: 18px;">
							{!!$uso->title_es!!}
						</p>		
					</div>
				</div>		
			@endforeach
		</div>
	</div>
</section>
@endsection

