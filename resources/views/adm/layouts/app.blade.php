<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#083756" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrf_token: '{{ csrf_token() }}' }</script>
    <title>@yield('title')</title>

    <link rel='shortcut icon' href='{{asset('img/logo/'.$favicon->image)}}' type='image/png' />
    <link rel='icon' href='{{asset('img/logo/'.$favicon->image)}}' type='image/png' />
        <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> --}}
    <link href=" {{ asset('css/materialize/materialize.min.css')}}" rel="stylesheet">
    <link href="{{ asset('icons/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>
<body class="main-bg-color-dark">

<div class="row" style="margin: 0;">

  @include('adm.layouts.navbar')
  @include('adm.layouts.sidebar')

  <div class="col l9 s12 offset-l3" style="padding: 3px;">
  <div class="container" style="width:95%; margin-top:5px;">
      @yield('cuerpo')
    </div>
  </div>
</div>


    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/materialize/materialize.min.js') }}"></script>
    <script>
      $(document).ready(function(){
        $('.collapsible').collapsible();
        $('.sidenav').sidenav({
            closeOnClick: false
        });
        $('.dropdown-trigger').dropdown({
            constrainWidth: false,
            closeOnClick: true,
            hover: false
        });
        $('.dropdown-buscador').dropdown({
            constrainWidth: false,
            closeOnClick: false,
        });
        $('select').formSelect();
        $('.materialboxed').materialbox();
      });

/*
      url = '{{url()->current()}}';
      $(".active").removeClass("active");
      $(".collapsible-body").hide();
      $(`a[href="${url}"]`).closest("li").addClass("only");
      $(`a[href="${url}"]`).closest("div").addClass("on");
      $(".only").addClass("active").show();
*/
    </script>
    <script type="text/javascript">
        function confirm_delete() {
          var result = confirm('¿Desea eliminar este registro?');
            if (result) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <script>
    @if(isset($success))
      M.toast({html: '{!!$success!!}', classes: 'rounded'});
    @endif

    @if(session('success'))
      M.toast({html: '{!!session('success')!!}', classes: 'rounded'});
    @endif

    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
      M.toast({html: '{!!$error!!}', classes: 'rounded'});
    @endforeach
    @endif
    </script>
</body>
</html>
