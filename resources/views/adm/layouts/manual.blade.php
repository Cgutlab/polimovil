@extends('adm.dashboard')

@section('content', trans('translator.main-actions'))

@section('cuerpo')
<main>
<div class="container" style="width: 100%;">
<div class="row">
	{{-- <div class="col s8"> --}}
		{{-- @include('adm.layouts.report') --}}
	{{-- </div> --}}
	<div class="offset-s8 col s4">
			&nbsp;
	</div>
</div>
<div class="row">
	<div class="col s12">
		<table class="highlight bordered">
			<thead>
				<td>@lang('translator.main-image')</td>
				<td>@lang('translator.main-actions')</td>
			</thead>
			<tbody>
				<tr>
					<td>
						<p style="float:left;">
					    <label>
					      {!!Form::checkbox('value', null, null) !!}
					      <span>@lang('translator.main-option-repeat')</span>
					    </label>
					  </p>
					</td>
					<td>Repetir, para mantener los datos, en un formulario recien creado.</td>
				</tr>
				<tr>
					<td>
						<div class="input-field">
		          {!! Form::label('color', trans('translator.main-actions').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
							{!! Form::select('color[]', ['1' => 'Primero', '2' => 'Segundo', '3' => 'Tercero'], isset($repeat['color']) ? $repeat['color']: '' . old('color'), ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
						</div>
					</td>
					<td>Los registros con este diseño, son de selección múltiple.</td>
				</tr>
				<tr>
					<td><i class="fab fa-facebook-square"></i></td>
					<td>Redes -> Iconos. Sólo deberá colocar el código del vector.</td>
				</tr>
				<tr>
					<td><i class="material-icons">shopping_cart</i></td>
					<td>Productos, los formularios; Tamaños, Gramajes, Presentaciones; Se dividen por categorias.</td>
				</tr>
				<tr>
					<td><a  class="btn-floating btn-small waves-effect waves-light blue ml-3x"><i class="material-icons">keyboard_backspace</i></a></td>
					<td>Volver</td>
				</tr>
				<tr>
					<td><a href="##" class="btn-floating btn-small waves-effect waves-light green ml-3x"><i class="material-icons">add</i></a></td>
					<td>Crear</td>
				</tr>

				<tr>
					<td><a  class="btn-floating btn-small waves-effect waves-light orange ml-3x"><i class="fas fa-pencil-alt"></i></a></td>
					<td>Editar</td>
				</tr>
				<tr>
					<td><a href="##" class="btn-floating btn-small waves-effect waves-light green ml-3x"><i class="material-icons">content_copy</i></a></td>
					<td>Duplicar, sólo el registro actual</td>
				</tr>
				<tr>
					<td><button type="submit" onclick="return confirm('¿Realmente desea eliminar este registro?')"  href="" class="btn-floating btn-small waves-effect red ml-3x"><i class="fas fa-trash-alt"></i></button></td>
					<td>Eliminar, el registro y todos los que dependan de éste</td>
				</tr>
				<tr>
					<td><a  class="btn-floating btn-small waves-effect waves-light blue ml-3x"><i class="fas fa-sort"></i></a></td>
					<td>Tamaños</td>
				</tr>
				<tr>
					<td><a href="##" class="btn-floating btn-small waves-effect waves-light blue ml-3x"><i class="fas fa-balance-scale"></i></a></td>
					<td>Gramajes</td>
				</tr>
				<tr>
					<td><a  class="btn-floating btn-small waves-effect waves-light blue ml-3x"><i class="fas fa-shopping-bag"></i></a></td>
					<td>Presentaciones</td>
				</tr>
				<tr>
					<td><a href="##" class="btn-floating btn-small waves-effect waves-light blue ml-3x"><i class="material-icons">shopping_cart</i></a></td>
					<td>Productos</td>
				</tr>
				<tr>
					<td><a  class="btn-floating btn-small waves-effect waves-light blue ml-3x"><i class="far fa-images"></i></a></td>
					<td>Galeria, imagenes de los productos</td>
				</tr>
				<tr>
					<td><img src="{!!asset('img/logo/'.$default->image)!!}" alt="" style="width: 45px;"></td>
					<td>Imágen por defecto, se mostrará esto cuando no exista una imagen, en la web, excepto Banner, Sliders</td>
				</tr>
				<tr>
					<td><img src="{!!asset('img/logo/'.$logo->image)!!}" alt="" style="width: 45px;"></td>
					<td>Imágen de seguridad, se mostrará para iniciar sesion y en el panel administrativo.</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2">Argentina - Abril, 2019 - Carlos Gutiérrez - Contacto: Cgutlab@gmail.com</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
</div>
</main>

@endsection
