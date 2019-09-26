<div class="col-md-3" id="sidebar">
    <ul class="list-unstyled">
        @forelse($keypad as $key=>$item)
            <li class="list-group-item border-0 px-0">
                <a href="{{ route('productos.cat', ['id' => $item->id]) }}" data-target="#categoria_{{$key}}" data-toggle="collapse" aria-expanded="false" class="d-flex align-items-center p-2 border-bottom {{ $item->id == $active->id ? 'distren-color' : null }}">
                   <span onclick="location.href='{{ route('productos.cat',['id' => $item->id]) }}'">{!! $item->title !!}</span><i class="fas fa-chevron-right ml-auto"></i>
                </a>
                <ul class="list-unstyled collapse {{ $item->id == $active->id ? 'show' : null }}" id="categoria_{{$key}}">
                    @forelse($item->familias as $k=>$data)
                        <li class="list-group-item border-0 px-3" style="font-size: 14px">
                            <a href="{{ route('productos.sub', ['id' => $data->id]) }}" data-target="#subcategoria_{{$k}}" data-toggle="collapse" aria-expanded="false" class="d-flex align-items-center p-2 border-bottom  ">
                                <span onclick="location.href='{{ route('productos.sub', ['id' => $data->id]) }}'">{!! $data->title !!}</span><i class="fas fa-chevron-right ml-auto"></i>
                            </a>
                            <ul class="list-unstyled" id="subcategoria_{{$k}}">
                                @forelse($data->producto as $art)
                                    <li><a href="{{ route('producto',$art->id) }}" class="px-3 py-2  @if(isset($producto)) {{$art->id == $producto->id ? 'distren-color': null }}@endif">{{ $art->title  }}</a></li>
                                @empty
                                    <li><a href="" class="p-2">No hay registros</a></li>
                                @endforelse
                            </ul>
                        </li>
                    @empty
                        <li><a href="" class="p-2">No hay registros</a></li>
                    @endforelse
                </ul>
            </li>
        @empty
            <li><a href="" class="p-2">No hay registros</a></li>
        @endforelse
    </ul>
</div>
{{-- 
<div id="wrapper">
   <div id="sidebar-wrapper">
      <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
         @php $count = 0; @endphp
         @foreach($keypad->sortBy('order') as $keyp)
            @php $count++; @endphp
            @if($keyp->family_id == 0)
               <li class="">
                  <a href="#" class="principal position-relative">
                     {!!$keyp->title_es!!}
                     <i class="fas fa-angle-right position-absolute" style="right: 0; top: 12px;"></i>
                  </a>
                  <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                     @foreach($keyp->familias->sortBy('order') as $sub)
                     <li>
                        <a href="{!!route('productos.sub', $sub->id)!!}">{!!$sub->title_es!!}</a>
                     </li>
                     @endforeach
                  </ul>
               </li>      
            @endif
         @endforeach
      </ul>
   </div>
</div>
 --}}

