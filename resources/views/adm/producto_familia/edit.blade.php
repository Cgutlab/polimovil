@extends('adm.dashboard')

@section('content', trans('translator.main-option-edit') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
      <a href="{{route('item_'.strtolower($model).'.index')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
      <a href="{{route('item_'.strtolower($model).'.create') }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
  	</div>
  </div>
  {!!Form::model($data, ['route'=>['item_'.strtolower($model).'.update', $data->id], 'method'=>'PUT', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">
        <div class="file-field input-field col s12 right">
          <!-- Debe haber un registro en la tabla (familias) donde id sea cero (0) -->
          <label for="family_id">@lang('translator.main-foreign')</label><br>
          <select name="family_id" id="family_id" class="validate">
            <option value="0">Familia Principal</option>
            @foreach($familias as $f)
              <option value="{{$f->id}}"  @if($f->id == $data->family_id) selected @endif>#Fam: {{$f->title_es}}</option>

              @foreach($subfam as $v)
              @if($v->family_id == $f->id)
                <option disabled value="{{$v->id}}">#SubFam: {{$v->title_es}}</option>
              @endif
              @endforeach

            @endforeach
          </select>
        </div>
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
        <div class="input-field col s12">
          {!!Form::label('title_es', trans('translator.main-title'))!!}
          {!!Form::text('title_es',$data->title_es,['class'=>'validate'])!!}
        </div>
  	</div>
  {!!Form::submit(trans('translator.main-option-update'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>

@endsection
