@extends('adm.dashboard')

@section('content', trans('translator.main-option-edit') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
    <div class="col s8">
  		{{-- <h4 style="color: var(--main-color-links)">{!!$data->maquina->title_es!!}</h4> --}}
  		{{-- @include('adm.layouts.report') --}}
  	</div>
  	<div class="col s4">
      <a href="{{ route('maq_'.strtolower($model).'.show', ['master' => $data->id]) }}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
  		<a href="{{ route('maq_'.strtolower($model).'.create', ['master' => $data->id]) }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
  	</div>
  </div>
  {!!Form::model($data, ['route'=>['maq_'.strtolower($model).'.update', $data->id], 'method'=>'PUT', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">
      {{--
          <div class="file-field input-field col s12 right">
            {!! Form::label('section', trans('translator.main-section')) !!}
            {!! Form::select('section', ['home' => trans('translator.main-section') . ' home',
                                      'empresa' => trans('translator.main-section') . ' empresa'],
                                      $section, ['class'=>'validate', 'required', 'id' => 'section']) !!}
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
    				{!!Form::text('',$data->image, ['placeholder' => trans('translator.main-image-slider'), 'class'=>'file-path validate', 'required', 'style' => 'padding-left: 40px;']) !!}
    			</div>
    		</div>
        <div class="input-field col m4 s12">
          {!!Form::label('order', trans('translator.main-order'))!!}
          {!!Form::text('order',$data->order,['class'=>'validate'])!!}
        </div>
  	</div>
  {!!Form::submit(trans('translator.main-option-update'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>

@endsection
