@extends('adm.dashboard')

@section('content', trans('translator.main-option-create') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
  		<a href="{{route(strtolower($model).'.index')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
  		{{-- <a href="{{route(strtolower($model).'.create') }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a> --}}
  	</div>
  </div>
  {!!Form::open(['route'=>[strtolower($model).'.store'], 'method'=>'POST', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">

          {{--
          <div class="file-field input-field col s12 right hide">
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
              {!!Form::text(old('image'), isset($repeat['image']) ? $repeat['image'] : old('image'), ['placeholder' => trans('translator.main-image-logo'), 'class'=>'file-path validate']) !!}
              @if(isset($repeat['image'])) {!!Form::text('image', isset($repeat['image']) ? $repeat['image'] : old('image'), ['class' => 'hide']) !!} @endif
          </div>
        </div>
         --}}
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
          <span style="position: absolute; padding: 7px; right: 5px;">
            <i class="material-icons small">touch_app</i>
          </span>
          {!!Form::text('route', isset($repeat['route']) ? $repeat['route']: '' . old('route'), ['class'=>'validate', 'required', 'id' => 'route'])!!}
        </div>
        {{--
        <div class="input-field col s12">
          {!!Form::label('title_es', trans('translator.main-title'))!!}
          {!!Form::text('title_es', isset($repeat['title_es']) ? $repeat['title_es']: '' . old('title_es'),['class'=>'validate', 'id' => 'title_es'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('subtitle_es', trans('translator.main-subtitle'))!!}
          {!!Form::text('subtitle_es', isset($repeat['subtitle_es']) ? $repeat['subtitle_es']: '' . old('subtitle_es'),['class'=>'validate', 'id' => 'subtitle_es'])!!}
        </div>
         --}}
  	</div>
    {{--
  <p style="float:left;">
    <label>
      {!!Form::checkbox('repeatcheck', null, isset($repeat) ? 'on' : '' . (old('repeat') ==  '1'), array('id'=>'repeat')) !!}
      <span>@lang('translator.main-option-repeat')</span>
    </label>
  </p>
   --}}
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
