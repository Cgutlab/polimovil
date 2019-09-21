@extends('adm.dashboard')

@section('content', trans('translator.main-option-create') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
  		<a href="{{ route(strtolower($model).'.show', ['id' => Auth::user()->id])}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
      @if(Auth::user()->type == 'admin')
  		<a href="{{ route(strtolower($model).'.create') }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
    @endif
  	</div>
  </div>
  {!!Form::open(['route'=>[strtolower($model).'.store'], 'method'=>'POST', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">
        {{--
    		<div class="file-field input-field col s12">
    			<div class="btn">
    				<span>@lang('translator.main-image')</span>
    				{!! Form::file('image') !!}
    			</div>
    			<div class="file-path-wrapper">
    				<span style="position: absolute; padding: 7px;">
    					<img src="#" alt="{{Auth::user()->username}}" class="circle responsive-img" style="height: 30px;">
    				</span>
    				{!!Form::text('',null, ['class'=>'file-path validate', 'required', 'style' => 'padding-left: 40px;']) !!}
    			</div>
    		</div>
         --}}
        <div class="input-field col m6 s12">
          {!!Form::label('username', trans('translator.main-username'))!!}
          {!!Form::text('username', isset($repeat->username) ? $repeat->username: '' . old('username'),['class'=>'validate', 'required'])!!}
        </div>
        <div class="input-field col m6 s12">
            {!!Form::label('password', trans('translator.main-password'), ['class' => 'fs15 fw5'])!!}
            {!!Form::password('password', ['class' => 'validate', 'required', 'id' => 'password'])!!}
        </div>
        <div class="input-field col m6 s12">
          {!!Form::label('name', trans('translator.main-name'))!!}
          {!!Form::text('name', isset($repeat->name) ? $repeat->name: '' . old('name'),['class'=>'validate', 'required'])!!}
        </div>
        <div class="input-field col m3 s6">
          {!!Form::label('type', trans('translator.main-name'))!!}
          {!!Form::select('type', $type , isset($repeat->type) ? $repeat->type : '' . old('type'),['class'=>'validate', 'id' => 'type'])!!}
        </div>
        <div class="input-field col m3 s6">
          {!!Form::label('status', trans('translator.main-name'))!!}
          {!!Form::select('status', $status , isset($repeat->status) ? $repeat->status : '' . old('status'),['class'=>'validate', 'id' => 'status'])!!}
        </div>
  	</div>
    <p style="float:left;">
      <label>
        {!!Form::checkbox('repeatcheck', null, isset($repeat) ? 'on' : '' . (old('repeat') ==  '1'), array('id'=>'repeat')) !!}
        <span>@lang('translator.main-option-repeat')</span>
      </label>
    </p>
    @if(Auth::user()->type == 'admin')
  {!!Form::submit(trans('translator.main-option-create'), ['class' => 'btn right'])!!}
@endif
  {!!Form::close()!!}
  </div>
  </main>

@endsection
