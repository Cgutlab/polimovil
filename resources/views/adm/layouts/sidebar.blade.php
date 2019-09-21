<ul id="slide-out" class="sidenav sidenav-fixed col l3" style="padding:0;background: #f2f2f2; height: 100%;">

	<div style="padding: 15px;">

		<span style="display: flex; justify-content: left; align-items: center;">

			<a href="{{route('adm.dashboard')}}">

			<img class="responsive-img h-max-80" src="{{ asset('img/logo/'.$headband->image) }}">

			</a>

			<span style="margin-left: 20px;">

				<div class="fw5 fs18">@lang('translator.main-backend')</div>

			</span>

		</span>

	</div>

	<div style="padding: 15px; border-bottom: 1px solid var(--main-color-card-border)">

		<span style="display: flex; justify-content: left; align-items: center;">

			<i class="material-icons">account_circle</i>

			<span style="margin-left: 25px;">

				<div class="fw4 fs16">@lang('translator.main-welcome'),</div>

				<div class="fs16">{{ucwords(Auth::user()->name)}}</div>

			</span>

		</span>

	</div>



	<ul class="collapsible z-depth-0">

		<li class="bold @isset($section) {!!$section == 'home' ? 'only active' : ''!!} @endisset {{ (\Request::is('adm/destacad*'))?"only active":"" }}">

		    <a class="collapsible-header waves-effect"><i class="material-icons">home</i><span>Home</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body">

				<div class="@isset($section) @if($section == 'home' && $model == 'Slider') {!!'on'!!} @endif @endisset"><a href="{{route('slider.show', ['section' => 'home'])}}" class="collapsible-header waves-effect">Slider</a></div>

				<div class="@isset($section) @if($section == 'home' && $model == 'Content') {!!'on'!!} @endif @endisset"><a href="{{route('content.show', ['section' => 'home'])}}" class="collapsible-header waves-effect">Contenido</a></div>
				{{-- <div class="@isset($model) @if($model == 'Destacado') {!!'on'!!} @endif @endisset"><a href="{{route('destacado.index')}}" class="collapsible-header waves-effect">Destacado</a></div> --}}

				{{-- <div class="@isset($section) @if($section == 'home' && $model == 'Icon') {!!'on'!!} @endif @endisset"><a href="{{route('icon.show', ['section' => 'home'])}}" class="collapsible-header waves-effect">Iconos</a></div> --}}

				{{-- <div class="@isset($section) @if($section == 'home' && $model == 'Banner') {!!'on'!!} @endif @endisset"><a href="{{route('banner.show', ['section' => 'home'])}}" class="collapsible-header waves-effect">Banner</a></div> --}}

			</div>

	  </li>



		<li class="bold @isset($section) {!!$section == 'empresa' ? 'only active' : ''!!} @endisset {{(\Request::is('adm/empresaimg*'))?'only active':''}} ">

		    <a class="collapsible-header waves-effect"><i class="material-icons">location_city</i><span>Empresa</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body {{ (\Request::is('adm/home/*'))?"style=display:block;":"" }}">

				<div class="@isset($section) @if($section == 'empresa' && $model == 'Slider') {!!'on'!!} @endif @endisset"><a href="{{route('slider.show', ['section' => 'empresa'])}}" class="collapsible-header waves-effect">Slider</a></div>

				<div class="@isset($section) @if($section == 'empresa' && $model == 'Content') {!!'on'!!} @endif @endisset"><a href="{{route('content.show', ['section' => 'empresa'])}}" class="collapsible-header waves-effect">Contenido</a></div>

				{{-- <div class="{{(\Request::is('adm/empresaimg*'))?'on':''}}"><a href="{{route('empresaimg.index')}}" class="collapsible-header waves-effect">Galeria</a></div> --}}

			</div>

	  </li>

	<li class="bold {{(\Request::is('adm/item_producto*'))?'only active':''}}">

		    <a class="collapsible-header waves-effect"><i class="material-icons">shopping_cart</i><span>Productos</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body">

				<div class="{{(\Request::is('adm/item_producto*'))?'on':''}}"><a href="{{route('item_producto_familia.index')}}" class="collapsible-header waves-effect">Productos</a></div>

			</div>

	  </li>

	<li class="bold {{(\Request::is('adm/uso_*'))?'only active':''}}">

		    <a class="collapsible-header waves-effect"><i class="material-icons">devices</i><span>Usos y aplicaciones</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body">

				<div class="{{(\Request::is('adm/uso_*'))?'on':''}}"><a href="{{route('uso_aplicacion.index')}}" class="collapsible-header waves-effect">Contenido</a></div>

			</div>

	  </li>

	

	  {{-- <li class="bold @isset($model) {!!$model == 'Distribuidor' ? 'only active' : ''!!} @endisset {{ (\Request::is('adm/distribuidor*'))?"only active":"" }}">

		<a class="collapsible-header waves-effect"><i class="fas fa-store"></i><span>Distribuidores</span><i class="material-icons right">arrow_drop_down</i></a>

		<div class="collapsible-body">

			<div class="@isset($model) @if($model == 'Distribuidor') {!!'on'!!} @endif @endisset"><a href="{{route('distribuidor.index')}}" class="collapsible-header waves-effect">Distribuidores</a></div>

		</div>

	  </li> --}}
	  
	  <li class="bold @isset($model) {!!$model == 'CategoriaNovedad' ? 'only active' : ''!!} @endisset {{ (\Request::is('adm/categorianovedad*'))?"only active":"" }}">

		<a class="collapsible-header waves-effect"><i class="material-icons">dashboard</i><span>Novedades</span><i class="material-icons right">arrow_drop_down</i></a>

		<div class="collapsible-body">

			<div class="@isset($model) @if($model == 'CategoriaNovedad') {!!'on'!!} @endif @endisset"><a href="{{route('categorianovedad.index')}}" class="collapsible-header waves-effect">Categorias Novedad</a></div>

		</div>

  	</li>	  

		<li class="bold {{(\Request::is('adm/descarga*'))?'only active':''}}">

		    <a class="collapsible-header waves-effect"><i class="material-icons">cloud_download</i><span>Descargas</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body">

				<div class="{{(\Request::is('adm/descarga*'))?'on':''}}"><a href="{{route('descarga.index')}}" class="collapsible-header waves-effect">Contenido</a></div>

			</div>

	  </li>


{{-- 
	  <li class="bold {{(\Request::is('adm/solucion*'))?'only active':''}}">

		    <a class="collapsible-header waves-effect"><i class="material-icons">playlist_add_check</i><span>Soluciones a medida</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body">

				<div class="{{(\Request::is('adm/solucion*'))?'on':''}}"><a href="{{route('solucion.index')}}" class="collapsible-header waves-effect">Soluciones</a></div>

			</div>

	  </li>



	  <li class="bold {{(\Request::is('adm/servicio*'))?'only active':''}} @isset($section) {!!$section == 'servicios' ? 'only active' : ''!!} @endisset">

		    <a class="collapsible-header waves-effect"><i class="fas fa-hand-holding"></i><span>Servicios</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body">

				<div class="@isset($section) @if($section == 'servicios' && $model == 'Content') {!!'on'!!} @endif @endisset"><a href="{{route('content.show', ['section' => 'servicios'])}}" class="collapsible-header waves-effect">Contenido</a></div>

					<div class="{{(\Request::is('adm/servicio*'))?'on':''}}"><a href="{{route('servicio.index')}}" class="collapsible-header waves-effect">Servicios</a></div>

			</div>

	  </li>



	  <li class="bold {{(\Request::is('adm/video*'))?'only active':''}}">

		    <a class="collapsible-header waves-effect"><i class="material-icons">ondemand_video</i><span>Videos</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body">

				<div class="{{(\Request::is('adm/video*'))?'on':''}}"><a href="{{route('video.index')}}" class="collapsible-header waves-effect">Videos</a></div>

			</div>

	  </li>



		<li class="bold {{(\Request::is('adm/casoexito*'))?'only active':''}}">

			<a class="collapsible-header waves-effect"><i class="material-icons">star_border</i><span>Casos De Éxito</span><i class="material-icons right">arrow_drop_down</i></a>

			<div class="collapsible-body">

				<div class="{{(\Request::is('adm/casoexito*'))?'on':''}}"><a href="{{route('casoexito.index')}}" class="collapsible-header waves-effect">Casos De Éxito</a></div>

			</div>

		</li>

		<li class="bold {{(\Request::is('adm/representada*'))?'only active':''}}">

			<a class="collapsible-header waves-effect"><i class="material-icons">forum</i><span>Representadas</span><i class="material-icons right">arrow_drop_down</i></a>

			<div class="collapsible-body">

				<div class="{{(\Request::is('adm/representada*'))?'on':''}}"><a href="{{route('representada.index')}}" class="collapsible-header waves-effect">Representadas</a></div>

			</div>

		</li> --}}

		{{-- <li class="bold {{(\Request::is('adm/redsocial*'))?'only active':''}}">

		    <a class="collapsible-header waves-effect"><i class="material-icons">remove_red_eye</i><span>Redes Sociales</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body">

				<div class="{{(\Request::is('adm/redsocial*'))?'on':''}}"><a href="{{route('redsocial.index')}}" class="collapsible-header waves-effect">Editar</a></div>

			</div>

	  </li> --}}



		<li class="bold {{(\Request::is('adm/logo*'))?'only active':''}}">

			<a class="collapsible-header waves-effect"><i class="material-icons">perm_media</i><span>Logo</span><i class="material-icons right">arrow_drop_down</i></a>

			<div class="collapsible-body">

				<div class="{{(\Request::is('adm/logo*'))?'on':''}}"><a href="{{route('logo.index')}}" class="collapsible-header waves-effect">@lang('translator.main-option-edit')</a></div>

			</div>

		</li>



		<li class="bold {{(\Request::is('adm/data*'))?'only active':''}}">

		    <a class="collapsible-header waves-effect"><i class="material-icons">reorder</i><span>Data</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body">

				<div class="{{(\Request::is('adm/data*'))?'on':''}}"><a href="{{route('data.index')}}" class="collapsible-header waves-effect">@lang('translator.main-option-edit')</a></div>

			</div>

	  </li>



		<li class="bold {{(\Request::is('adm/metad*'))?'only active':''}}">

				<a class="collapsible-header waves-effect"><i class="material-icons">public</i><span>Metadata</span><i class="material-icons right">arrow_drop_down</i></a>

				<div class="collapsible-body">

					<div class="{{(\Request::is('adm/metad*'))?'on':''}}"><a href="{{route('metadata.index')}}" class="collapsible-header waves-effect">@lang('translator.main-option-edit')</a></div>

				</div>

		</li>

		@if(Auth::user()->type == 'admin')

		<li class="bold {{(\Request::is('adm/admin*'))?'only active':''}}">

		    <a class="collapsible-header waves-effect"><i class="material-icons">group</i><span>Admin</span><i class="material-icons right">arrow_drop_down</i></a>

		    <div class="collapsible-body">

				<div class="{{(\Request::is('adm/admin*'))?'on':''}}"><a href="{{route('admin.show', ['id' => '1'])}}" class="collapsible-header waves-effect">@lang('translator.main-option-edit')</a></div>

			</div>

	  </li>

	@endif

	</ul>

</ul>

