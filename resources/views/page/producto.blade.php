@extends('layouts.app')
@section('title', 'Familias')
@section('content')
<div class="header">
	<div class=" d-flex align-items-end container" style="min-height: 80px">
		<a href="{{route('productos.fam')}}" class="mb-0 font-weight-bold d-block" style="line-height: 58px;"><i class="fas fa-angle-double-left"></i> Volver</a>
	</div>	
</div>
<div aria-label="breadcrumb" class="container mt-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('productos.fam')}}" style="font-weight: 500; color: #737373;">Productos</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}" style="font-weight: 500; color: #737373;">Sub Familias</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-weight: 500; color: #737373;">
    	{{$active->title_es}}
    </li>
  </ol>
</div>
<div class="container pt-5 pb-5 rp-movil">
	<div class="row align-items-start rOrderMovil">
		<div class="col-sm-12 col-md-4 col-lg-3">
			<ul class="list-unstyled">
			@forelse($keypad as $key=>$item)
			@if($item->id_family == 0)
			@php $key = '100'.$key; @endphp
			    <li class="list-group-item border-0 px-0">
			        <a href="{{ route('productos.cat', ['id' => $item->id]) }}" data-target="#categoria_{{$key}}" data-toggle="collapse" aria-expanded="false" class="d-flex align-items-center p-2 border-bottom" style="{{ $item->id == $active->id ? 'font-weight: 800;' : '' }}">
			           <span onclick="location.href='{{ route('productos.cat', ['id' => $item->id]) }}'">{!! $item->id. ' '.$item->title_es.' ? '. $item->family_id !!}</span><i class="fas fa-chevron-right ml-auto"></i>
			        </a>
			        <ul class="list-unstyled collapse {{ $item->id == $active->id ? 'show' : null }}" id="categoria_{{$key}}">
			            @forelse($item->familias as $k=>$data)
			            @php $k = '200'.$k; @endphp
			                <li class="list-group-item border-0 px-3" style="font-size: 14px">
			                    <a href="{{ route('productos.sub', ['id' => $data->id]) }}" data-target="#subcategoria_{{$k}}" data-toggle="collapse" aria-expanded="false" class="d-flex align-items-center p-2 border-bottom " style="{{ $data->id == $active->id ? 'font-weight: 800;' : '' }}">
			                        <span onclick="location.href='{{ route('productos.sub', ['id' => $data->id]) }}'">{!! $data->id. ' '.$data->title_es !!}</span><i class="fas fa-chevron-right ml-auto"></i>
			                    </a>
			                    <ul class="list-unstyled" id="subcategoria_{{$k}}">
			                        @forelse($data->producto as $art)
			                            <li><a href="{{ route('productos.art',['id' => $art->id]) }}" class="px-3 py-2 @if(isset($producto)) {{$art->id == $producto->id ? 'distren-color': null }}@endif" style="{{ $data->id == $active->id ? 'font-weight: 800;' : '' }}">{{ $art->id. ' '.$art->title_es }}</a></li>
			                        @empty
			                            {{-- <li>!!<a href="" class="p-2">No hay registros</a></li> --}}
			                        @endforelse
			                    </ul>
			                </li>
			            @empty
			                {{-- <li><a href="" class="p-2">No hay registros</a></li> --}}
			            @endforelse
			        </ul>
			    </li>
			@endif
			@empty
			    {{-- <li>#<a href="" class="p-2">No hay registros</a></li> --}}
			@endforelse
			</ul>
		</div>
		<div class="col-sm-12 col-md-8 col-lg-9">
			<div class="row">
				<div class="col-sm-12 col-md-5 mb-4">
					<div class="row">
						<div class="col-sm-12 mb-3">
						    @foreach($active->images as $sd)
						        <img src="{!!asset('img/gallery/'.$sd->image)!!}" class="img-fluid w-100" style="border: 1px solid #cbcbcb;">
						    @endforeach									
						</div>
						<div class="d-flex justify-content-between" style="padding-right: 15px; padding-left: 15px;">
							@for ($i = 0; $i < 3; $i++)
								<div class="" style="flex-basis: 30%;">
									<img src="{!!asset('img/gallery/'.$sd->image)!!}" class="img-fluid w-100" style="border: 1px solid #cbcbcb;">
								</div>
							@endfor							
						</div>

					</div>
				</div>
				<div class="col-sm-12 col-md-7 mb-4">
					<h2 style="color: #0088c7; font-weight: 600;">{{$active->title_es}}</h2>
					<div class="content-descripcion-uso mb-4">
						{!! $active->text_es !!}
					</div>
					<div class="mb-3">
						<a href="" class="btn btn-primary mr-3" style="background-color: #0088c7;">Descargar Ficha Técnica</a>
						<a href="{{route('solicitar-presupuesto')}}" class="btn btn-primary" style="background-color: #0088c7;">Consultar</a>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="p-5" style="background-color: #ececec;">
						<h6 class="mb-4 position-relative" style="color: #0088c7; font-weight: 600;">Productos relacionados</h6>
						<div class="row">
							@foreach($productos as $article)
							@if($active->family_id == $article->id_family)
							<div class="col-sm-12 col-md-4">
								<div class="card w-100 mb-4">
									<div class="position-relative mb-3">
										<img src="{{asset('img/gallery/06e2.jpg')}}" class="w-100 img-fluid" alt="">
										<div class="position-absolute capa-product" style="">
											<a href=""><i class="fas fa-plus"></i> ver más</a>
										</div>
									</div>
									<p class="card-content editorRico blanco text-center" style="font-size: 16px;">
										{!!$article->title_es!!}
									</p>		
								</div>								
							</div>
							@endif
							@endforeach
						</div>
					</div>			
				</div>
			</div>
		</div>				
	</div>
</div>
@endsection

