@extends('layouts.app')

@section('title')

Empresa

@endsection

@section('content')

<style type="text/css">
.slider .slides li .caption{
	left: 8%;
}
</style>


  <div class="slider">
    <ul class="slides">
    @foreach($sliders as $sd)
      <li>
        <img src="{!!asset('img/slider/'.$sd->image)!!}">
        <div class="caption left-align">
          <h3 class="editorRico sd blanco fs40">{!!$sd->text_es!!}</h3>
        </div>
      </li>
    @endforeach
    </ul>
  </div>
<style>
	.diagonal{
	  width: 0;
	  height: 0;
	  border-style: solid;
	  border-width: 400px 80px 0 0;
	  border-color: transparent #A8A9AD transparent transparent;
	  transform: scale(1.0001);
	}
</style>

	<div style="display: flex; justify-content: center; align-items: center;">
		<div style="width: 50%; background-color: red;">

		</div>
		<div style="width: 50%; background-color: blue;">
			
		</div>
	</div>
	<div class="row mb-0">
		<div class="col l5 m5 s12 mt-35 center-align">
			<div class="container" style="width: 100%;">
				@if(file_exists(public_path().'/img/content/'.$content->image1))
					<img src="{!!asset('img/content/'.$content->image1)!!}">
				@else
					<img src="{!!asset('img/logo/'.$default->image)!!}">
				@endif
			</div>
		</div>
		<div class="col l1 m2 hide-on-small-only blanco fw5 diagonal" style="padding: 0; margin: 0;">
		</div>
		<div class="col l6 m5 s12 blanco fw5" style="background-color: #A8A9AD; height: 400px; display: flex; align-items: center;">
			<div class="container" style="width: 100%;">
			<div class="editorRico left-align" style="padding-left: 25px;">
				{!!$content->text_es!!}
			</div>
			</div>
		</div>
	</div>
@endsection

