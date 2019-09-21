@extends('layouts.app')
@section('title')
	Videos
@endsection
@section('content')
<div class="content-text-hero mb-5">
	<div class="wrapper row flex-column justify-content-end hero-content-text-height">
		<h1 class="hero-content-text">Videos</h1>
	</div>
</div>
<div>
	<div class="wrapper row section-videos">
		@foreach($videos as $video)
			<div class="col-md-4 mb-5">
				<div class="card" style="">
					<iframe width="100%" height="280" src="https://www.youtube.com/embed/{!!$video->enlace!!}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	<div class="card-body">
				    	<p class="card-text">{{ $video->title_es }}</p>
		 	 		</div>
				</div>		
			</div>
		@endforeach
	</div>
</div>
@endsection