@extends('adm.dashboard')

@section('content', trans('translator.main-option-index') .' '. $model)

@section('cuerpo')
<main>
<div class="container" style="width: 100%;">
<div class="row">
	{{-- <div class="col s8"> --}}
		{{-- @include('adm.layouts.report') --}}
	{{-- </div> --}}
	<div class="offset-s8 col s4">
		<a href="{{ route('adm.dashboard')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
		{{-- <a href="{{ route(strtolower($model).'.create',['section' => $section]) }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a> --}}
	</div>
</div>
<div class="row">
	<div class="col s12">
		<table class="highlight bordered">
			<thead>
				<td>@lang('translator.main-image')</td>
				<td>@lang('translator.main-title')</td>
				<td>@lang('translator.main-order')</td>
				<td class="right">@lang('translator.main-actions')</td>
			</thead>
			<tbody>
				@foreach($data as $dat)
				<tr>
					<td>
							@if(file_exists(public_path().'/img/'.strtolower($model).'/'.$dat->image1) && $dat->image1)
								<img class="materialboxed" src="{{asset('img/'.strtolower($model).'/'.$dat->image1)}}" alt="{{$dat->title_es}}" class="responsive-img" style="max-height: 50px; max-width: 160px;">
							@else
								<img src="{{asset('img/logo/'.$default->image1)}}" alt="{{$default->image1}}" class="responsive-img" style="width: 50px;">
							@endif
						</td>
					<td>
						@php
							$verForm = explode('-', $dat->type);
						@endphp
						@if($verForm[1] == '1t')
							{!! $dat->title_es !!}
						@endif
						@if($verForm[1] == '1c')
						{!! $dat->text_es !!}
						@endif
						@if($verForm[1] == '2c')
						{!! $dat->title_es !!}
						@endif
					</td>
					<td>
						{!! $dat->order !!}
					</td>
					<td class="right">
						{!!Form::model($dat, ['route'=>[strtolower($model).'.destroy', $dat->id], 'method'=>'DELETE', 'files' => true])!!}
						{{ csrf_field() }}
            			<div class="flex-center" style="display: flex; justify-content: center; align-items: center;">
							<a href="{{ route(strtolower($model) . '.edit', ['id' => $dat->id, 'section' => $dat->section]) }}" class="btn-floating btn-small waves-effect waves-light orange right ml-3x"><i class="fas fa-pencil-alt"></i></a>
							{{-- <a href="{{route(strtolower($model).'.duplicate',['id' => $dat->id])}}" class="btn-floating btn-small waves-effect waves-light green right ml-3x"><i class="material-icons">content_copy</i></a> --}}
							{{-- <button type="submit" onclick="return confirm('¿Realmente desea eliminar este registro?')"  href="{{route(strtolower($model).'.destroy', $dat->id)}}" class="btn-floating btn-small waves-effect red ml-3x"><i class="fas fa-trash-alt"></i></button> --}}
							{!!Form::open(['class'=>'en-linea', 'route'=>[strtolower($model).'.destroy', 'id' => $dat->id], 'method' => 'DELETE'])!!}
            			</div>
						{!!Form::close()!!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<span class="right">
{!! $data->render() !!}
</span>
</div>
</main>

@endsection
