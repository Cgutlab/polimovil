<div class="col-xs-12 col-md-3 hidden-xs">
  <ul class="menuleft">
     @foreach($keypad as $familia)
          <li class="fam-name arvo"><a style="color: #{{$familia->color}}" href="{{route('productos.art',$familia->id)}}">{{$familia->nombre}} </a><span ids="{{ $familia->id }}" class="glyphicon glyphicon-chevron-down"></span></li>
          <div class="lineamenu"></div>
          <ul id="{{'s'.$familia->id}}" class="submenu @if($familia->id == $familiaIs->id) abierto @endif">
              @foreach($familia->productos()->orderBy('nombre')->get() as $producto)
                  <a href="{{route('producto',$producto->id)}}"><li class="pro-name @if($producto->id==$productoIs->id) activo @endif">{{ $producto->nombre }}</li></a>
              @endforeach
          </ul>
     @endforeach
  </ul>
</div>



