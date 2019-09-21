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
        <div class="input-field col s12">
          {!!Form::label('local', trans('translator.main-local'))!!}
          {!!Form::text('local', isset($repeat['local']) ? $repeat['local']: '' . old('local'),['class'=>'validate', 'id' => 'local'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('direction', trans('translator.main-direction'))!!}
          {!!Form::text('direction', isset($repeat['direction']) ? $repeat['direction']: '' . old('direction'),['class'=>'validate', 'id' => 'direction'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('phone', trans('translator.main-phone'))!!}
          {!!Form::text('phone', isset($repeat['phone']) ? $repeat['phone']: '' . old('phone'),['class'=>'validate', 'id' => 'phone'])!!}
        </div>
        <div class="input-field col s6">
            {!!Form::label('altitude', trans('translator.main-altitude'))!!}
            {!!Form::text('altitude', isset($repeat['altitude']) ? $repeat['altitude']: '' . old('altitude'),['class'=>'validate', 'id' => 'altitude'])!!}
          </div>
          <div class="input-field col s6">
              {!!Form::label('length', trans('translator.main-length'))!!}
              {!!Form::text('length', isset($repeat['length']) ? $repeat['length']: '' . old('length'),['class'=>'validate', 'id' => 'length'])!!}
            </div>
        <div class="input-field col m4 s12 right">
          {!!Form::label('order', trans('translator.main-order'))!!}
          {!!Form::text('order', isset($repeat['order']) ? $repeat['order']: '' . old('order'),['class'=>'validate', 'id' => 'order'])!!}
        </div>
  
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
