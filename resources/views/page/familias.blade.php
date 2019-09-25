@extends('layouts.app')
@section('title', 'Productos')
@section('content')
<section class="productos">
	<div class="header">
		<div class=" d-flex align-items-end container" style="min-height: 80px">
			<h1 class="mb-0 font-weight-bold">Productos</h1>
		</div>	
	</div>
	<div class="container pt-5 pb-5">
		<div class="row pt-3 pb-3">
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


@endsection

