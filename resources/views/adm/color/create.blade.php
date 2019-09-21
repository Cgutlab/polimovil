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
        <div class="input-field col m4 s12">
          {!!Form::label('cod', trans('translator.main-code'))!!}
          {!!Form::text('cod', isset($repeat['cod']) ? $repeat['cod']: '' . old('cod'),['class'=>'validate jscolor', 'required', 'id' => 'cod'])!!}
        </div>
        <div class="input-field col m8 s12">
          {!!Form::label('title_es', trans('translator.main-title'))!!}
          {!!Form::text('title_es', isset($repeat['title_es']) ? $repeat['title_es']: '' . old('title_es'),['class'=>'validate', 'required', 'id' => 'title_es'])!!}
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
  <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
  <script>
  	CKEDITOR.replace('text');
  	CKEDITOR.config.width = '100%';
  </script>
  <script src="{{asset('js/jscolor.min.js')}}"></script>
  <script src="{{asset('js/jscolor.js')}}"></script>
@endsection
