<div id="wrapper">
   <!-- Sidebar -->
   <div id="sidebar-wrapper">
      <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
         @php $count = 0; @endphp
         @foreach($keypad->sortBy('order') as $keyp) {{-- familias --}}
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


