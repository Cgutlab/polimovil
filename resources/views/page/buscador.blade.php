@extends('layouts.app')

@section('title')

Buscador

@endsection

@section('content')

<div class="container mt-35" style="width: 87%;">
<div class="row">
	@foreach($productos as $article)
	<div class="col s12 m6 l3">
		<div style="display: flex; justify-content: center; align-items: center;">
		<div class="card center-align" style="width: 211px;">
		<a href="{{route('productos.art', ['id' => $article->id])}}">
			<div class="card-action" style="padding: 0 0 0 0;">
				<div style="background-image: url({{asset('img/help/article.jpg')}});background-repeat: no-repeat; background-size: cover; height: 38px; margin-bottom: 0; padding-bottom: 0;">
					<div class="row mb-0">
						<div class="col s6">
							
						</div>
						<div class="col s6">
							<span class="flex-center blanco fw6" style="height: 30px; padding-top: 5px;">
							Art. {!!$article->code!!}
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="center-align" style="background: #E5E5E9; display: flex; align-items: center; justify-content: center; overflow: hidden;">
				@forelse($article->images as $imgdest)
					@if(file_exists(public_path().'/img/gallery/'.$imgdest->image))
						<img class="responsive-img" src="{!!asset('img/gallery/'.$imgdest->image)!!}">
					@else
						<img class="responsive-img" src="{!!asset('img/logo/'.$default->image)!!}">
					@endif
					@break
				@empty
					<img src="{!!asset('img/logo/'.$default->image)!!}">
				@endforelse
			</div>
			<div class="card-content editorRico blanco fw6 left-align" style="background: #58585A; padding: 10px; height: 85px; overflow: hidden;">
				{!!$article->title_es!!}
			</div>
		</a>
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

