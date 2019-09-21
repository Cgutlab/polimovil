@extends('adm.dashboard')

@section('content', trans('translator.main-option-create') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
    <div class="col s8">
  		<h4 style="color: var(--main-color-links)">
  				{{$master->title_es}}
  		{{-- @include('adm.layouts.report') --}}
  	</div>
    <div class="col s4">
      <a href="{{route('item_'.strtolower($model).'.show', ['id' => $master->id])}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
      <a href="{{route('item_'.strtolower($model).'.create', ['id' => $master->id]) }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
  	</div>
  </div>
  {!!Form::open(['route'=>['item_'.strtolower($model).'.store'], 'method'=>'POST', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">
        <div class="file-field input-field col s12 right hide">
          {{-- Debe haber un registro en la tabla (familias) donde id sea cero (0) --}}
          <label for="family_id">@lang('translator.main-foreign')</label><br>
          <select name="family_id" id="family_id" class="validate">
              <option value="{{$master->id}}">#Fam: {{$master->title_es}}</option>
          </select>
        </div>
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
        </div>{{-- 
        <div class="input-field col s12">
          {!!Form::label('code', trans('translator.main-code'))!!}
          {!!Form::text('code', isset($repeat['code']) ? $repeat['code']: '' . old('code'),['class'=>'validate', 'id' => 'code'])!!}
        </div> --}}

        <div class="input-field col s12">
          {!!Form::label('title_es', trans('translator.main-title'))!!}
          {!!Form::text('title_es', isset($repeat['title_es']) ? $repeat['title_es']: '' . old('title_es'),['class'=>'validate', 'id' => 'title_es'])!!}
        </div>
        <div class="file-field input-field col s12">
          <div class="btn">
              <span>@lang('translator.main-ficha')</span>
              {!! Form::file('document') !!}
          </div>
          <div class="file-path-wrapper">
              {!!Form::text('', isset($repeat['document']) ? $repeat['document'] : old('document'), ['placeholder' => trans('translator.main-ficha'), 'class'=>'file-path validate']) !!}
              @if(isset($repeat['document'])) {!!Form::text('document', isset($repeat['document']) ? $repeat['document'] : old('document'), ['class' => 'hide']) !!} @endif
          </div>
        </div>
        {{-- 
				<div class="input-field col m6 s12">
          {!! Form::label('color', trans('translator.main-color').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
					{!! Form::select('color[]', $color, isset($repeat['color']) ? $repeat['color']: '' . old('color'), ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
				</div>
        <div class="input-field col m6 s12">
          {!! Form::label('pttn', trans('translator.main-presentation').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
          {!! Form::select('pttn[]', $pttn, isset($repeat['pttn']) ? $repeat['pttn']: '' . old('pttn'), ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
        </div>
        <div class="input-field col m6 s12">
          {!! Form::label('gmge', trans('translator.main-presentation').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
          {!! Form::select('gmge[]', $gmge, isset($repeat['gmge']) ? $repeat['gmge']: '' . old('gmge'), ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
        </div>
        <div class="input-field col m6 s12">
          {!! Form::label('size', trans('translator.main-size').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
          {!! Form::select('size[]', $size, isset($repeat['size']) ? $repeat['size']: '' . old('size'), ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
        </div>
 --}}
        <div class="input-field col s12">
          <div>{!!Form::label('text_es', trans('translator.main-text'))!!}</div>
          {!!Form::textarea('text_es', isset($repeat['text_es']) ? $repeat['text_es']: '' . old('text_es'), ['class'=>'validate', 'required', 'cols'=>'74', 'rows'=>'1', 'id' => 'text_es'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('keyword_es', trans('translator.main-keyword'))!!}
          {!!Form::text('keyword_es', isset($repeat['keyword_es']) ? $repeat['keyword_es']: '' . old('keyword_es'),['class'=>'validate', 'id' => 'keyword_es'])!!}
        </div>{{-- 
        <div class="input-field col m6 s12">
          {!! Form::label('outstanding', trans('translator.main-outstanding').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
          {!! Form::select('outstanding', ['off' => 'No Mostrar', 'on' => 'Mostrar'], null, ['class' => 'form-control', 'style' => 'line-height: 0;']) !!}
        </div> --}}
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
