@extends('adm.dashboard')

@section('content', trans('translator.main-option-list') .' '. $model)

@section('cuerpo')
<main>
<div class="container" style="width: 100%;">
<div class="row">
	<div class="col s12 right">
		<a href="{{ route('adm.dashboard')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
		@if(Auth::user()->type == 'admin')
		<a href="{{ route(strtolower($model).'.create') }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
	@endif
	</div>
</div>
<div class="row">
	<div class="col s12">
		<table class="highlight bordered">
			<thead>
				<td class="hide-on-small-only">@lang('translator.main-name')</td>
				<td>@lang('translator.main-username')</td>
				<td>@lang('translator.main-type')</td>
				<td>@lang('translator.main-status')</td>
				@if(Auth::user()->type == 'admin')
				<td class="right">Acciones</td>
			@endif
			</thead>
			<tbody>
				@foreach($data as $dat)
				<tr style="padding:5px 5px;">
					<td class="hide-on-small-only">{!! $dat->name !!}</td>
					<td>{!! $dat->username !!}</td>
					<td>{!! $dat->type !!}</td>
					<td>{!! $dat->status !!}</td>
					@if(Auth::user()->type == 'admin')
					<td class="right">
						{!!Form::model($dat, ['route'=>[strtolower($model).'.update', $dat->id], 'method'=>'PUT', 'files' => true])!!}
						{{ csrf_field() }}
            			<div class="flex-center" style="display: flex; justify-content: center; align-items: center;">
							<a href="{{ route(strtolower($model).'.edit', ['id' => $dat->id]) }}" class="btn-floating btn-small waves-effect waves-light orange right ml-3x"><i class="fas fa-pencil-alt"></i></a>
							<button type="submit" onclick="return confirm('¿Realmente desea eliminar este registro?')"  href="{{route(strtolower($model).'.destroy', $dat->id)}}" class="btn-floating btn-small waves-effect red ml-3x"><i class="fas fa-trash-alt"></i></button>
							{!!Form::open(['class'=>'en-linea', 'route'=>[strtolower($model).'.destroy', 'id' => $dat->id], 'method' => 'DELETE'])!!}
            			</div>
						{!!Form::close()!!}
					</td>
				@endif
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
