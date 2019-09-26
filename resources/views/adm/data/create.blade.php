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
          {!!Form::label('type', trans('translator.main-type'))!!}
          {!!Form::text('type', isset($repeat['type']) ? $repeat['type']: '' . old('type'),['class'=>'validate', 'required', 'id' => 'type'])!!}
        </div>
        <div class="input-field col s12">
          <div>{!!Form::label('text', trans('translator.main-text'))!!}</div>
          {!!Form::textarea('text', isset($repeat['text']) ? $repeat['text']: '' . old('text'), ['class'=>'validate', 'required', 'cols'=>'74', 'rows'=>'1', 'id' => 'text'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('route', trans('translator.main-route'))!!}
          {!!Form::text('route', isset($repeat['route']) ? $repeat['route']: '' . old('route'), ['class'=>'validate', 'required', 'id' => 'route'])!!}
        </div>
  	</div>
  {!!Form::submit(trans('translator.main-option-create'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>
  <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
  <script>
  	CKEDITOR.replace('text');
  	CKEDITOR.config.width = '100%';
  </script>
@endsection
