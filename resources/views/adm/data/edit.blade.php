@extends('adm.dashboard')



@section('content', trans('translator.main-option-edit') .' '. $model)



@section('cuerpo')



  <main>

  <div class="container" style="width: 100%;">

  <div class="row">

  	<div class="col s12 right">

      <a href="{{route(strtolower($model).'.index')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>

  	</div>

  </div>

  {!!Form::model($data, ['route'=>[strtolower($model).'.update', $data->id], 'method'=>'PUT', 'files' => true])!!}

  {{ csrf_field() }}

  	<div class="row">

        <h5>{{$data->type}}</h5>

        <div class="input-field col s12">

          <div>{!!Form::label('text', trans('translator.main-text'))!!}</div>

          {!!Form::textarea('text', $data->text, ['class'=>'validate', 'cols'=>'74', 'rows'=>'1', 'id' => 'text'])!!}

        </div>

        <div class="input-field col s12">

          {!!Form::label('route', trans('translator.main-route'))!!}

          <span style="position: absolute; padding: 7px; right: 5px;">

            <i class="material-icons small">touch_app</i>

          </span>

          {!!Form::text('route', $data->route, ['class'=>'validate', 'id' => 'route'])!!}

        </div>


  	</div>

  {!!Form::submit(trans('translator.main-option-update'), ['class' => 'btn right'])!!}

  {!!Form::close()!!}

  </div>

  </main>

  <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>

  <script>

  	CKEDITOR.replace('text');

  	CKEDITOR.config.width = '100%';

  </script>

@endsection

