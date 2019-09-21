@extends('adm.dashboard')

@section('content', trans('translator.main-option-edit') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
      <a href="{{route(strtolower($model).'.index')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
      <a href="{{route(strtolower($model).'.create') }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
  	</div>
  </div>
  {!!Form::model($data, ['route'=>[strtolower($model).'.update', $data->id], 'method'=>'PUT', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">
        <div class="input-field col s12">
          {!!Form::label('local', trans('translator.main-local'))!!}
          {!!Form::text('local',$data->local,['class'=>'validate'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('direction', trans('translator.main-direction'))!!}
          {!!Form::text('direction',$data->direction,['class'=>'validate'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('phone', trans('translator.main-phone'))!!}
          {!!Form::text('phone',$data->phone,['class'=>'validate'])!!}
        </div>
        <div class="input-field col s6">
          {!!Form::label('altitude', trans('translator.main-altitude'))!!}
          {!!Form::text('altitude',$data->altitude,['class'=>'validate'])!!}
        </div>
        <div class="input-field col s6">
          {!!Form::label('length', trans('translator.main-length'))!!}
          {!!Form::text('length',$data->length,['class'=>'validate'])!!}
        </div>
        <div class="input-field col s6 right">
          {!!Form::label('order', trans('translator.main-order'))!!}
          {!!Form::text('order',$data->order,['class'=>'validate'])!!}
        </div>
  	</div>
  {!!Form::submit(trans('translator.main-option-update'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>

@endsection
