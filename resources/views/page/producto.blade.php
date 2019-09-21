@extends('layouts.app')

@section('title')

Familias

@endsection

@section('content')


<div class="container mt-35" style="width: 87%;">
<div class="row">
<div class="col l3 m4 s12" style="margin-top: 15px;">
<ul class="collapsible z-depth-0">
	@foreach($keypad as $keyp)
	@if($keyp->family_id == 0)
	{{-- familias --}}
	<li @if($keyp->id == $active->family->id || $keyp->id == $active->family->family_id) class="active" @endif>
		<div class="collapsible-header">
			<a class="" href="{!!route('productos.sub', $keyp->id)!!}" @if($keyp->id == $active->family->id || $keyp->id == $active->family->family_id) style="color: #CC2128;" @endif>{!!$keyp->title_es!!}</a>
		</div>
		<div class="collapsible-body accordion">
		<ul class="collapsible z-depth-0">
			{{-- subfamilias --}}
			@foreach($keyp->familias as $sub)
			<li @if($sub->id == $active->family->id) class="active" @endif>
				<div class="collapsible-header" style="border-bottom: 0;">
					<a href="{!!route('productos.sub', $sub->id)!!}" @if($sub->id == $active->family->id) style="color: #CC2128;" @endif>{!!$sub->title_es!!}</a>
				</div>
				<div class="collapsible-body" style="border-bottom: 0;">
				{{-- productos --}}
				@foreach($sub->producto as $subitem)
					<div><a href="{!!route('productos.art', $subitem->id)!!}" @if($subitem->id == $active->id) style="color: #CC2128;" @endif>{!!$subitem->title_es!!}</a></div>
				@endforeach
				</div>
			</li>
			@endforeach
		</ul>
		@foreach($keyp->producto as $item)
			<div><a href="{!!route('productos.art', $item->id)!!}" @if($item->id == $active->id) style="color: #CC2128;" @endif>{!!$item->title_es!!}</a></div>
		@endforeach
		</div>
	</li>
	@endif
	@endforeach
</ul>
</div>
<div class="col l9 m8 s12" style="margin-top: 15px;">
	<div class="responsive-img" style="background-image: url({{asset('img/help/description.jpg')}});background-repeat: no-repeat; background-size: cover; height: 39px; margin-bottom: 0; padding-bottom: 0; width: 100%;">
	<div class="row mb-0">
		<div class="col s10">
			<div class="blanco fw6 fs22" style="height: 39px; display: flex;justify-content: left; align-items: center; margin-left: 5px;">
			{!!$active->title_es!!}
			</div>
		</div>
		<div class="col s2">
			<div class="blanco fw6 fs18" style="height: 39px; display: flex;justify-content: center; align-items: center; margin-right: 5px;">
			Art.{!!$active->code!!}
			</div>
		</div>


	</div>
	<div class="row">
		<div class="col l5 s12 mt-35">
		  <div class="slider">
		    <ul class="slides">
		    @foreach($active->images as $sd)
		      <li>
		        <img src="{!!asset('img/gallery/'.$sd->image)!!}">
		      </li>
		    @endforeach
		    </ul>
		  </div>
		</div>
		<div class="col l7 s12 mt-35">
			<div class="col s12">
				{!!$active->text_es!!}
			</div>
			<div class="col s12">
				@if(count($active->colors)>0)
				<div class="fs18 fw6" style="color: #52525F;">Colores disponibles</div>
				<div class="row">
				@foreach($active->colors as $clr)
				<div class="col m3 s4">
					@if(file_exists(public_path().'/img/gallery/'.$clr->image))
						<img class="responsive-img materialboxed" src="{!!asset('img/gallery/'.$clr->image)!!}" style="max-width: 85px;">
					@else
						<img class="responsive-img materialboxed" src="{!!asset('img/logo/'.$default->image)!!}" style="max-width: 85px;">
					@endif
					<div class="fs18 fw6">{!!$clr->title_es!!}</div>
				</div>
					
				@endforeach
				@endif
				</div>
			</div>
		</div>
		<div class="col s12">
				@if(count($active->planos)>0)
				<div class="row">
				@foreach($active->planos as $plain)
				<div class="col m2 s4">
					@if(file_exists(public_path().'/img/gallery/'.$plain->image))
						<img class="responsive-img materialboxed" src="{!!asset('img/gallery/'.$plain->image)!!}" style="max-width: 150px;">
					@else
						<img class="responsive-img materialboxed" src="{!!asset('img/logo/'.$default->image)!!}" style="max-width: 150px;">
					@endif
				</div>
				@endforeach
				@endif
				</div>
		</div>
	</div>
	</div>
	<div class="row mb-0">
		<div class="col s12 fs24 gris fw7" style="">Productos relacionados</div>
		
		<div class="carousel row mb-0" style="min-height: 400px; background-color: #F2F2F4;">
		@foreach($keypad as $relfam)
		@if($relfam->id == $active->family_id)
		@foreach($relfam->producto as $rel)
		    <a class="carousel-item col m4 s12" href="{!!route('productos.art', $rel->id)!!}">
				<div style="display: flex; justify-content: center; align-items: center;">
				<div class="card center-align" style="width: 211px;">
					<div class="card-action" style="padding: 0 0 0 0;">
						<div style="background-image: url({{asset('img/help/article.jpg')}});background-repeat: no-repeat; background-size: cover; height: 38px; margin-bottom: 0; padding-bottom: 0;">
							<div class="row mb-0">
								<div class="col s6">
									
								</div>
								<div class="col s6">
									<span class="flex-center blanco fw6" style="height: 30px; padding-top: 5px;">
									Art. {!!$rel->code!!}
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="card-image" style="background: #E5E5E9; height: 211px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
						@forelse($rel->images as $imgdest)
							@if(file_exists(public_path().'/img/gallery/'.$imgdest->image))
								<img src="{!!asset('img/gallery/'.$imgdest->image)!!}">
							@else
								<img src="{!!asset('img/logo/'.$default->image)!!}">
							@endif
							@break
							@empty
							<img src="{!!asset('img/logo/'.$default->image)!!}">
						@endforelse
					</div>
					<div class="card-content editorRico blanco fw6 left-align" style="background: #58585A; padding: 10px; height: 85px; overflow: hidden;">
						{!!$rel->title_es!!}
					</div>
				</div>
				</div>
		    </a>
		@endforeach
		@endif
		@endforeach
		</div>
	</div>
</div>
</div>
</div>
<style type="text/css">
	.slider{
		height: 334px!important;
	}
	.slider .slides{
		height: 334px!important;
	}
	.slider .slides li .caption{
	    top: 33%;
	    overflow: hidden;
	}
	.slider .indicators .indicator-item{
	    bottom: 20px;
	    z-index: 99;
	        background: #58585A!important;
	    border: 1px solid white!important;
	    box-shadow: none!important;
	}
	.slider .indicators .indicator-item.active{
	    bottom: 20px;
	    z-index: 99;
	        background: white!important;
	    border: 1px solid #58585A!important;
	    box-shadow: none!important;
	}
</style>
@endsection

