@extends('layouts.app')

@section('title')

Familias

@endsection

@section('content')

<div class="container mt-35" style="width: 65%;">
<div class="row center-align">
	@foreach($familias as $fam)
	<div class="col s12 m6 l4 mt-35">
		<div style="display: flex; justify-content: center; align-items: center;">
		<div class="card center-align" style="width: 211px;">
		<a href="{{route('productos.sub', ['id' => $fam->id])}}">
			<div class="center-align" style="background: #E5E5E9; display: flex; align-items: center; justify-content: center; overflow: hidden;">
					@if(file_exists(public_path().'/img/producto_familia/'.$fam->image))
						<img class="responsive-img" src="{!!asset('img/producto_familia/'.$fam->image)!!}">
					@else
						<img class="responsive-img" src="{!!asset('img/logo/'.$default->image)!!}">
					@endif
			</div>
			<div class="card-content editorRico blanco fw7" style="background-image: url({{asset('img/help/article.jpg')}});background-repeat: no-repeat; background-size: cover; height: 56px; margin: 0; display: flex; justify-content: center; align-items: center;">
				{!!$fam->title_es!!}
			</div>
		</a>
		</div>
		</div>
	</div>
	@endforeach
</div>
</div>

@endsection

