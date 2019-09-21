@extends('adm.dashboard')

@section('content', trans('translator.main-option-edit') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
      <a href="{{route(strtolower($model).'.show', ['section' => $section])}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
      {{-- <a href="{{route(strtolower($model).'.create',['section' => $section]) }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a> --}}
  	</div>
  </div>
  {!!Form::model($data, ['route'=>[strtolower($model).'.update', $data->id], 'method'=>'PUT', 'files' => true])!!}
  {{ csrf_field() }}

    <div class="row">
          <div class="file-field input-field col s12 right hide">
            {!! Form::label('section', trans('translator.main-section')) !!}
            {!! Form::select('section', ['home' => trans('translator.main-section') . ' home',
                                      'empresa' => trans('translator.main-section') . ' empresa'],
                                      $section, ['class'=>'validate', 'id' => 'section']) !!}
          </div>

    		<div class="file-field input-field col m8 s12">
    			<div class="btn">
    				<span>@lang('translator.main-image')</span>
    				{!! Form::file('image1') !!}
    			</div>
    			<div class="file-path-wrapper">
            @if($data->image1)
            <span style="position: absolute; padding: 7px;">
              <i class="material-icons small">image</i>
            </span>
            @endif
    				{!!Form::text('',$data->image1, ['placeholder' => trans('translator.main-image-empresa'), 'class'=>'file-path validate', 'style' => 'padding-left: 40px;']) !!}
    			</div>
        </div>
        {{--
        <div class="file-field input-field col m8 s12">
          <div class="btn">
            <span>@lang('translator.main-image')</span>
            {!! Form::file('image2') !!}
          </div>
          <div class="file-path-wrapper">
            @if($data->image2)
            <span style="position: absolute; padding: 7px;">
              <i class="material-icons small">image</i>
            </span>
            @endif
            {!!Form::text('',$data->image2, ['placeholder' => trans('translator.main-image-empresa'), 'class'=>'file-path validate', 'style' => 'padding-left: 40px;']) !!}
          </div>
        </div>
        <div class="file-field input-field col m8 s12">
          <div class="btn">
            <span>@lang('translator.main-image')</span>
            {!! Form::file('image3') !!}
          </div>
          <div class="file-path-wrapper">
            @if($data->image3)
            <span style="position: absolute; padding: 7px;">
              <i class="material-icons small">image</i>
            </span>
            @endif
            {!!Form::text('',$data->image3, ['placeholder' => trans('translator.main-image-empresa'), 'class'=>'file-path validate', 'style' => 'padding-left: 40px;']) !!}
          </div>
        </div>
         --}}
        <div class="input-field col m4 s12">
          {!!Form::label('order', trans('translator.main-order'))!!}
          {!!Form::text('order',$data->order,['class'=>'validate'])!!}
        </div>

        @php
          $verForm = explode('-', $data->type);
        @endphp

        @if($verForm[1] == '1t')
        <div class="input-field col s12">
          {!!Form::label('title_es', trans('translator.main-title'))!!}
          {!!Form::text('title_es',$data->title_es,['class'=>'validate'])!!}
        </div>
        @endif

        @if($verForm[1] == '1c')
        <div class="input-field col s12">
          {!!Form::label('text_es', trans('translator.main-text'))!!}
          {!!Form::textarea('text_es', $data->text_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'1', 'id' => 'text_es'])!!}
        </div>
        @endif

        @if($verForm[1] == '2c')
          <div class="input-field col s12">
            {!!Form::label('title_es', trans('translator.main-title'))!!}
            {!!Form::text('title_es',$data->title_es,['class'=>'validate'])!!}
          </div>
        <div class="input-field col s12">
          {!!Form::label('text_es', trans('translator.main-text'))!!}
          {!!Form::textarea('text_es', $data->text_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'1', 'id' => 'text_es'])!!}
        </div>
        @endif
  	</div>
  {!!Form::submit(trans('translator.main-option-update'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>
  <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
  <script>
    @if($verForm[1] == '1c')
  	  CKEDITOR.replace('text_es');
    @endif
    @if($verForm[1] == '2c')
  	  CKEDITOR.replace('text_es');
    @endif
  	CKEDITOR.config.width = '100%';
  </script>
@endsection
