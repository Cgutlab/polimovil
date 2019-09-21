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
{{-- 
      <h4><a href="https://fontawesome.com/icons?d=gallery">Listado Iconos</a> - Ícono ó Imágen.</h4>
      <h6>Ejemplo: <i class="fab fa-facebook-square"></i> <b>fab fa-facebook-square</b> </h6>
          <div class="file-field input-field col s12 right">
            {!! Form::label('section', trans('translator.main-section')) !!}
            {!! Form::select('section', [
                'footer' => trans('translator.main-section') . ' footer',
                // 'empresa' => trans('translator.main-section') . ' empresa'
                ], $section, ['class'=>'validate', 'required', 'id' => 'section']) !!}
          </div>
           --}}

    		<div class="file-field input-field col m8 s12">
    			<div class="btn">
    				<span>@lang('translator.main-image')</span>
    				{!! Form::file('image') !!}
    			</div>
    			<div class="file-path-wrapper">
            @if($data->image)
            <span style="position: absolute; padding: 7px;">
              <i class="material-icons small">image</i>
    					{{-- <img src="{{asset('img/slider/'.$data->image)}}" class="materialboxed" style="height: 30px; width: 30px;"> --}}
            </span>
            @endif
    				{!!Form::text('',$data->image, ['placeholder' => trans('translator.main-image-slider'), 'class'=>'file-path validate', 'style' => 'padding-left: 40px;']) !!}
    			</div>
    		</div>
        <div class="input-field col m4 s12 right">
          {!!Form::label('order', trans('translator.main-order'))!!}
          {!!Form::text('order',$data->order,['class'=>'validate', 'required'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('title', trans('translator.main-title'))!!}
          {!!Form::text('title',$data->title,['class'=>'validate'])!!}
        </div>
{{-- 
        <div class="input-field col s12">
          {!!Form::label('route', trans('translator.main-route'))!!}
          {!!Form::text('route',$data->route,['class'=>'validate', 'required'])!!}
        </div>
 --}}        
  	</div>
  {!!Form::submit(trans('translator.main-option-update'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>

@endsection
