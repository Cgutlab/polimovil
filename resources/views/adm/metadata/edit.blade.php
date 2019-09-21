@extends('adm.dashboard')

@section('content', trans('translator.main-option-edit') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
      <a href="{{route(strtolower($model).'.index')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
      {{-- <a href="{{route(strtolower($model).'.create') }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a> --}}
  	</div>
  </div>
  {!!Form::model($data, ['route'=>[strtolower($model).'.update', $data->id], 'method'=>'PUT', 'files' => true])!!}
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
             {{--
    		<div class="file-field input-field col m8 s12">
    			<div class="btn">
    				<span>@lang('translator.main-image')</span>
    				{!! Form::file('image') !!}
    			</div>
    			<div class="file-path-wrapper">
            @if($data->image)
            <span style="position: absolute; padding: 7px;">
              <i class="material-icons small">image</i>
    					<img src="{{asset('img/slider/'.$data->image)}}" class="materialboxed" style="height: 30px; width: 30px;">
            </span>
            @endif
    				{!!Form::text('',$data->image, ['placeholder' => trans('translator.main-image-recomendded'), 'class'=>'file-path validate', 'required', 'style' => 'padding-left: 40px;']) !!}
    			</div>
    		</div>
         --}}
        <h5>{{$data->section}}</h5>

        <div class="input-field col s12">
          {!!Form::label('keyword_es', trans('translator.main-keyword'))!!}
          {!!Form::text('keyword_es',$data->keyword_es,['class'=>'validate', 'required'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('description_es', trans('translator.main-description'))!!}
          {!!Form::text('description_es',$data->description_es,['class'=>'validate', 'required'])!!}
        </div>
        {{--
        <div class="input-field col s12">
          {!!Form::label('title_es', trans('translator.main-title'))!!}
          {!!Form::text('title_es',$data->title_es,['class'=>'validate', 'required'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('subtitle_es', trans('translator.main-subtitle'))!!}
          {!!Form::text('subtitle_es',$data->subtitle_es,['class'=>'validate', 'required'])!!}
        </div>
         --}}
  	</div>
  {!!Form::submit(trans('translator.main-option-update'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>
@endsection
