@extends('layouts.app')

@section('title')

Buscador

@endsection

@section('content')

<div class="container mt-35" style="width: 87%;">
	<div class="row pt-5 pb-5">
		@foreach($productos as $article)
		<div class="col-sm-12 col-md-3 mb-3">
			<div style="display: flex; justify-content: center; align-items: center;">
				<div class="card w-100" style="width: 211px;">
					<div class="text-center position-relative" style="background: #E5E5E9; display: flex; align-items: center; justify-content: center; overflow: hidden;">
						@forelse($article->images as $imgdest)
						@if(file_exists(public_path().'/img/gallery/'.$imgdest->image))
						<img class="responsive-img" src="{!!asset('img/gallery/'.$imgdest->image)!!}" style="border: 1px solid #cbcbcb;">
						@else
						<img class="responsive-img" src="{!!asset('img/logo/'.$default->image)!!}" style="border: 1px solid #cbcbcb;">
						@endif
						@break
						@empty
						<img src="{!!asset('img/logo/'.$default->image)!!}">
						@endforelse
						<div class="position-absolute capa-product" style="">
							<a href="{{route('productos.art', ['id' => $article->id])}}"><i class="fas fa-plus"></i> ver más</a>
						</div>
					</div>
					<div class="card-content text-center pt-2" style="font-weight: 700; color: #868686; font-size: 16px;">{!!$article->title_es!!}</div>
				</div>
			</div>
		</div>
		@endforeach
		<span class="center">
			{!! $productos->render() !!}
		</span>
	</div>
</div>

@endsection

