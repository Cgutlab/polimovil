@extends('adm.dashboard')

@section('content', trans('translator.main-option-create') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
  		<a href="{{route(strtolower($model).'.show', ['section' => $section])}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
  		{{-- <a href="{{route(strtolower($model).'.create',['section' => $section]) }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a> --}}
  	</div>
  </div>
  {!!Form::open(['route'=>[strtolower($model).'.store'], 'method'=>'POST', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">
        <div class="file-field input-field col m6 s12">
          {!! Form::label('section', trans('translator.main-section')) !!}
          {!! Form::select('section', [
            'home' => trans('translator.main-section') . ' home',
            'empresa' => trans('translator.main-section') . ' empresa',
          ], $section, ['class'=>'validate', 'required', 'id' => 'section']) !!}
        </div>


{{--
        <div class="file-field input-field col m8 s12">
          <div class="btn">
              <span>@lang('translator.main-image')</span>
              {!! Form::file('image2') !!}
          </div>
          <div class="file-path-wrapper">
              {!!Form::text('', isset($repeat['image2']) ? $repeat['image2'] : old('image2'), ['placeholder' => trans('translator.main-image-logo'), 'class'=>'file-path validate']) !!}
              @if(isset($repeat['image2'])) {!!Form::text('image2', isset($repeat['image2']) ? $repeat['image2'] : old('image2'), ['class' => 'hide']) !!} @endif
          </div>
        </div>
        <div class="file-field input-field col m8 s12">
          <div class="btn">
              <span>@lang('translator.main-image')</span>
              {!! Form::file('image3') !!}
          </div>
          <div class="file-path-wrapper">
              {!!Form::text('', isset($repeat['image3']) ? $repeat['image3'] : old('image3'), ['placeholder' => trans('translator.main-image-logo'), 'class'=>'file-path validate']) !!}
              @if(isset($repeat['image3'])) {!!Form::text('image3', isset($repeat['image3']) ? $repeat['image3'] : old('image3'), ['class' => 'hide']) !!} @endif
          </div>
        </div>
         --}}
        <div class="file-field input-field col m6 s12">
          {!! Form::label('type', trans('translator.main-type')) !!}
          {!! Form::select('type', [
            '1i-1t' => trans('translator.main-type') . ' Imagen/Titulo',
            '1i-1c' => trans('translator.main-type') . ' Imagen/Texto',
            '1i-2c' => trans('translator.main-type') . ' Imagen/Titulo/Texto',
          ], null, ['class'=>'validate', 'required', 'id' => 'type']) !!}
        </div>
        <div class="file-field input-field col m8 s12">
            <div class="btn">
                <span>@lang('translator.main-image')</span>
                {!! Form::file('image1') !!}
            </div>
            <div class="file-path-wrapper">
                {!!Form::text('', isset($repeat['image1']) ? $repeat['image1'] : old('image1'), ['placeholder' => trans('translator.main-image-logo'), 'class'=>'file-path validate']) !!}
                @if(isset($repeat['image1'])) {!!Form::text('image1', isset($repeat['image1']) ? $repeat['image1'] : old('image1'), ['class' => 'hide']) !!} @endif
            </div>
          </div>
        <div class="input-field col m4 s12">
          {!!Form::label('order', trans('translator.main-order'))!!}
          {!!Form::text('order', isset($repeat['order']) ? $repeat['order']: '' . old('order'),['class'=>'validate', 'id' => 'order'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('title_es', trans('translator.main-title'))!!}
          {!!Form::text('title_es', isset($repeat['title_es']) ? $repeat['title_es']: '' . old('title_es'),['class'=>'validate', 'id' => 'title_es'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('subtitle_es', trans('translator.main-subtitle'))!!}
          {!!Form::text('subtitle_es', isset($repeat['subtitle_es']) ? $repeat['subtitle_es']: '' . old('subtitle_es'),['class'=>'validate', 'id' => 'subtitle_es'])!!}
        </div>
        <div class="input-field col s12">
          <div>
          {!!Form::label('text_es', trans('translator.main-text'))!!}
          </div>
          {!!Form::textarea('text_es', isset($repeat['text_es']) ? $repeat['text_es']: '' . old('text_es'), ['class'=>'validate', 'required', 'cols'=>'74', 'rows'=>'1', 'id' => 'text_es'])!!}
        </div>
  	</div>
  <p style="float:left;">
    <label>
      {!!Form::checkbox('repeatcheck', null, isset($repeat['order']) ? 'on' : '' . (old('repeat') ==  '1'), array('id'=>'repeat')) !!}
      <span>@lang('translator.main-option-repeat')</span>
    </label>
  </p>
  {!!Form::submit(trans('translator.main-option-create'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>
  <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('text_es');
    CKEDITOR.config.width = '100%';
  </script>
@endsection
