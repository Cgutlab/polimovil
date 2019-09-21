@extends('adm.dashboard')

@section('content', trans('translator.main-option-create') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
  		<a href="{{route(strtolower($model).'_product.index')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
  		<a href="{{route(strtolower($model).'_product.create') }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
  	</div>
  </div>
  {!!Form::open(['route'=>[strtolower($model).'_product.store'], 'method'=>'POST', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">
        {{--
        <div class="file-field input-field col s12 right hide">
          {!! Form::label('section', trans('translator.main-section')) !!}
          {!! Form::select('section', ['home' => trans('translator.main-section') . ' home',
                                    'empresa' => trans('translator.main-section') . ' empresa'],
                                    $section, ['class'=>'validate', 'id' => 'section']) !!}
        </div>
        --}}
        <div class="file-field input-field col m8 s12">
          <div class="btn">
              <span>@lang('translator.main-image')</span>
              {!! Form::file('image') !!}
          </div>
          <div class="file-path-wrapper">
              {!!Form::text('', isset($repeat['image']) ? $repeat['image'] : old('image'), ['placeholder' => trans('translator.main-image-slider'), 'class'=>'file-path validate']) !!}
              @if(isset($repeat['image'])) {!!Form::text('image', isset($repeat['image']) ? $repeat['image'] : old('image'), ['class' => 'hide']) !!} @endif
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
          <div>{!!Form::label('text_es', trans('translator.main-text'))!!}</div>
          {!!Form::textarea('text_es', isset($repeat['text_es']) ? $repeat['text_es']: '' . old('text_es'), ['class'=>'validate', 'cols'=>'74', 'rows'=>'1', 'id' => 'text_es'])!!}
        </div>
        <div class="file-field input-field col s12">
          <div class="btn">
              <span>@lang('translator.main-ficha')</span>
              {!! Form::file('ficha') !!}
          </div>
          <div class="file-path-wrapper">
              {!!Form::text('', isset($repeat['ficha']) ? $repeat['ficha'] : old('ficha'), ['placeholder' => trans('translator.main-image-ficha'), 'class'=>'file-path validate']) !!}
              @if(isset($repeat['ficha'])) {!!Form::text('ficha', isset($repeat['ficha']) ? $repeat['ficha'] : old('ficha'), ['class' => 'hide']) !!} @endif
          </div>
        </div>
        <div class="input-field col m6 s12">
          {!! Form::label('esquema', trans('translator.main-esquema').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
					{!! Form::select('esquema[]', $esquema, isset($repeat['esquema']) ? $repeat['esquema']: '' . old('esquema'), ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
				</div>
        <div class="input-field col m6 s12">
          {!! Form::label('prestacion', trans('translator.main-prestacion').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
					{!! Form::select('prestacion[]', $prestacion, isset($repeat['prestacion']) ? $repeat['prestacion']: '' . old('prestacion'), ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
				</div>
        <div class="input-field col m6 s12">
          {!! Form::label('video', trans('translator.main-video').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
					{!! Form::select('video[]', $video, isset($repeat['video']) ? $repeat['video']: '' . old('video'), ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
				</div>
        <div class="input-field col m6 s12">
          {!! Form::label('relacion', trans('translator.main-relacion').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
					{!! Form::select('relacion[]', $relacion, isset($repeat['relacion']) ? $repeat['relacion']: '' . old('relacion'), ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
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
  	CKEDITOR.replace('text_es');
  	CKEDITOR.config.width = '100%';
  </script>
@endsection
