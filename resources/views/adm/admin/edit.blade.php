@extends('adm.dashboard')

@section('content', trans('translator.main-option-edit') .' '. $model)

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
  {!!Form::model($data, ['route'=>[strtolower($model).'.update', $data->id], 'method'=>'PUT', 'files' => true])!!}
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
    				{!!Form::text('',$data->image, ['class'=>'file-path validate', 'required', 'style' => 'padding-left: 40px;']) !!}
    			</div>
    		</div>
         --}}
        <div class="input-field col m6 s12">
          {!!Form::label('username', trans('translator.main-username'))!!}
          {!!Form::text('username',$data->username,['class'=>'validate', 'required'])!!}
        </div>
        <div class="input-field col m6 s12">
          {!!Form::label('password', trans('translator.main-password'), ['class' => 'fs15 fw5'])!!}
          {!!Form::password('password', ['class' => 'validate', 'id' => 'password', 'placeholder' => '******'])!!}
        </div>
        <div class="input-field col m6 s12">
          {!!Form::label('name', trans('translator.main-name'))!!}
          {!!Form::text('name',$data->name,['class'=>'validate', 'required'])!!}
        </div>
        <div class="input-field col m3 s6">
          {!!Form::label('type', trans('translator.main-name'))!!}
          {!!Form::select('type', $type , null,['class'=>'validate', 'id' => 'type'])!!}
        </div>
        <div class="input-field col m3 s6">
          {!!Form::label('status', trans('translator.main-name'))!!}
          {!!Form::select('status', $status , null,['class'=>'validate', 'id' => 'status'])!!}
        </div>
  	</div>
    @if(Auth::user()->type == 'admin')
  {!!Form::submit(trans('translator.main-option-update'), ['class' => 'btn right'])!!}
@endif
  {!!Form::close()!!}
  </div>
  </main>

@endsection
