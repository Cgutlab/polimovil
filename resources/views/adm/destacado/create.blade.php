@extends('adm.dashboard')

@section('content', trans('translator.main-option-create') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
  		<a href="{{route(strtolower($model).'.index')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
  		<a href="{{route(strtolower($model).'.create') }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
  	</div>
  </div>
  {!!Form::open(['route'=>[strtolower($model).'.store'], 'method'=>'POST', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">
      {{-- 
        <h4><a href="https://fontawesome.com/icons?d=gallery">Listado Iconos</a> - Ícono ó Imágen.</h4>
        <h6>Ejemplo: <i class="fab fa-facebook-square"></i> <b>fab fa-facebook-square</b> </h6>
        <div class="file-field input-field col s12 right hide">
          {!! Form::label('section', trans('translator.main-section')) !!}
          {!! Form::select('section', ['footer' => trans('translator.main-section') . ' footer',
                                    // 'empresa' => trans('translator.main-section') . ' empresa'
                                  ],
                                    $section, ['class'=>'validate', 'required', 'id' => 'section']) !!}
        </div>
 --}}
        <div class="file-field input-field col m8 s12">
          <div class="btn">
              <span>@lang('translator.main-image')</span>
              {!! Form::file('image') !!}
          </div>
          <div class="file-path-wrapper">
              {!!Form::text('', isset($repeat['image']) ? $repeat['image'] : old('image'), ['placeholder' => trans('translator.main-image-red'), 'class'=>'file-path validate']) !!}
              @if(isset($repeat['image'])) {!!Form::text('image', isset($repeat['image']) ? $repeat['image'] : old('image'), ['class' => 'hide']) !!} @endif
          </div>
        </div>
        <div class="input-field col m4 s12">
          {!!Form::label('order', trans('translator.main-order'))!!}
          {!!Form::text('order', isset($repeat['order']) ? $repeat['order']: '' . old('order'),['class'=>'validate', 'id' => 'order'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('title', trans('translator.main-title'))!!}
          {!!Form::text('title', isset($repeat['title']) ? $repeat['title']: '' . old('title'),['class'=>'validate', 'id' => 'title'])!!}
        </div>
{{-- 
        <div class="input-field col s12">
          {!!Form::label('route', trans('translator.main-route'))!!}
          {!!Form::text('route', isset($repeat['route']) ? $repeat['route']: '' . old('route'),['class'=>'validate', 'id' => 'route'])!!}
        </div>
 --}}
  	</div>
    <p style="float:left;">
      <label>
        {!!Form::checkbox('repeatcheck', null, isset($repeat) ? 'on' : '' . (old('repeat') ==  '1'), array('id'=>'repeat')) !!}
        <span>@lang('translator.main-option-repeat')</span>
      </label>
    </p>
  {!!Form::submit(trans('translator.main-option-create'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>

@endsection
