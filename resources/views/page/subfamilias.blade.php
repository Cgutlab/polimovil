@extends('layouts.app')

@section('title')

Familias

@endsection

@section('content')

<div class="container mt-35" style="width: 87%;">
<div class="row">
<div class="col l3 m4 s12">
<ul class="collapsible z-depth-0">
	@foreach($keypad->sortBy('order') as $keyp) {{-- familias --}}
	@if($keyp->family_id == 0)
	<li @if($keyp->id == $active->id || $keyp->id == $active->family_id) class="active" @endif>
		<div class="collapsible-header">
			<a class="" href="{!!route('productos.sub', $keyp->id)!!}" @if($keyp->id == $active->id || $keyp->id == $active->family_id) style="color: #CC2128;" @endif>{!!$keyp->title_es!!}</a>
		</div>
		<div class="collapsible-body accordion">
		<ul class="collapsible z-depth-0">
			@foreach($keyp->familias->sortBy('order') as $sub) {{-- subfamilias --}}
			<li @if($sub->id == $active->id) class="active" @endif>
				<div class="collapsible-header" style="border-bottom: 0;">
					<a href="{!!route('productos.sub', $sub->id)!!}" @if($sub->id == $active->id) style="color: #CC2128;" @endif>{!!$sub->title_es!!}</a>
				</div>
				<div class="collapsible-body" style="border-bottom: 0;">
				@foreach($sub->producto->sortBy('order') as $subitem) {{-- productos --}}
					<div><a href="{!!route('productos.art', $subitem->id)!!}">{!!$subitem->title_es!!}</a></div>
				@endforeach
				</div>
			</li>
			@endforeach
		</ul>
		@foreach($keyp->producto->sortBy('order') as $item) {{-- productos --}}
			<div><a href="{!!route('productos.art', $item->id)!!}">{!!$item->title_es!!}</a></div>
		@endforeach
		</div>
	</li>
	@endif
	@endforeach
</ul>
</div>
<div class="col l9 m8 s12">
	@foreach($productos as $article)
	<div class="col s12 m6 l3">
		<div style="display: flex; justify-content: center; align-items: center;">
		<div class="card center-align" style="width: 350px;">
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

	@foreach($familias as $family)
	<div class="col s12 m6 l3">
		<div style="display: flex; justify-content: center; align-items: center;">
		<div class="card center-align" style="width: 211px;">
		<a href="{{route('productos.sub', ['id' => $family->id])}}">
			<div class="center-align" style="background: #E5E5E9; display: flex; align-items: center; justify-content: center; overflow: hidden;">
					@if(file_exists(public_path().'/img/producto_familia/'.$family->image))
						<img class="responsive-img" src="{!!asset('img/producto_familia/'.$family->image)!!}">
					@else
						<img class="responsive-img" src="{!!asset('img/logo/'.$default->image)!!}">
					@endif
			</div>
			<div class="card-content editorRico blanco fw7" style="background-image: url({{asset('img/help/article.jpg')}});background-repeat: no-repeat; background-size: cover; height: 56px; margin: 0; display: flex; justify-content: center; align-items: center;">
				{!!$family->title_es!!}
			</div>
		</a>
		</div>
		</div>
	</div>
	@endforeach

</div>
</div>
</div>

@endsection

