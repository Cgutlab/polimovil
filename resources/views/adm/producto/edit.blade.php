@extends('adm.dashboard')

@section('content', trans('translator.main-option-edit') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
    <div class="col s8">
  		<h4 style="color: var(--main-color-links)">
  				{{$data->family->title_es}}
  		{{-- @include('adm.layouts.report') --}}
  	</div>
    <div class="col s4">
      <a href="{{route('item_'.strtolower($model).'.show', ['id' => $data->family->id])}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
      <a href="{{route('item_'.strtolower($model).'.create', ['id' => $data->family->id]) }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
  	</div>
  </div>
  {!!Form::model($data, ['route'=>['item_'.strtolower($model).'.update', $data->id], 'method'=>'PUT', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">
        <div class="file-field input-field col m4 s12 right">
          {{-- Debe haber un registro en la tabla (familias) donde id sea cero (0) --}}
          <label for="family_id">@lang('translator.main-foreign')</label><br>
          <select name="family_id" id="family_id" class="validate">
             @foreach($master as $fam)
             @if($fam->family_id == 0)
               <option value="{{ $fam->id }}" {!! $data->family_id == $fam->id ? 'selected':'' !!}>#Fam: {{$fam->id.' '.$fam->title_es}}</option>
             
               @foreach($fam->familias as $sub)
                @if($sub->family_id == $fam->id)
                <option value="{{ $sub->id }}" {!!$data->family_id == $sub->id ? 'selected':''!!}>#&nbsp;&nbsp;&nbsp;&nbsp; Sub: {{$sub->id.' '.$sub->title_es}}</option>
                 @endif
                @endforeach
             
             @endif
             @endforeach
          </select>
        </div>
        <div class="file-field input-field col m8 s12">
          <div class="btn">
            <span>@lang('translator.main-ficha')</span>
            {!! Form::file('document') !!}
          </div>
          <div class="file-path-wrapper">
            @if($data->document)
            <span style="position: absolute; padding: 7px;">
              <i class="material-icons small">folder</i>
              {{-- <img src="{{asset('img/slider/'.$data->document)}}" class="materialboxed" style="height: 30px; width: 30px;"> --}}
            </span>
            @endif
            {!!Form::text('',$data->document, ['placeholder' => trans('translator.main-ficha'), 'class'=>'file-path validate', 'required', 'style' => 'padding-left: 40px;']) !!}
          </div>
        </div>
        <div class="input-field col m4 s12">
          {!!Form::label('order', trans('translator.main-order'))!!}
          {!!Form::text('order',$data->order,['class'=>'validate'])!!}
        </div>
        {{-- <div class="input-field col s12">
          {!!Form::label('code', trans('translator.main-code'))!!}
          {!!Form::text('code',$data->code,['class'=>'validate', 'required'])!!}
        </div> --}}
        <div class="input-field col s12">
          {!!Form::label('title_es', trans('translator.main-title'))!!}
          {!!Form::text('title_es',$data->title_es,['class'=>'validate'])!!}
        </div>

        <div class="input-field col s12">
          <div>{!!Form::label('text_es', trans('translator.main-text'))!!}</div>
          {!!Form::textarea('text_es', $data->text_es, ['class'=>'validate', 'required', 'cols'=>'74', 'rows'=>'1', 'id' => 'text_es'])!!}
        </div>
        <div class="input-field col s12">
          {!!Form::label('keyword_es', trans('translator.main-keyword'))!!}
          {!!Form::text('keyword_es',$data->keyword_es,['class'=>'validate'])!!}
        </div>

        {{-- <div class="input-field col m6 s12">
          {!! Form::label('outstanding', trans('translator.main-outstanding').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
          {!! Form::select('outstanding', ['off' => 'No Mostrar', 'on' => 'Mostrar'], null, ['class' => 'form-control', 'style' => 'line-height: 0;']) !!}
        </div> --}}
  	</div>
  {!!Form::submit(trans('translator.main-option-update'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>
  <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
  <script>
  	CKEDITOR.replace('text_es');
  	CKEDITOR.config.width = '100%';
  </script>
@endsection
