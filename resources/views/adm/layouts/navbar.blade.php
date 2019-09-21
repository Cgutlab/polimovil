<nav>
    <ul id="nav-mobile col s12" class="nav-wrapper">
      <li style="margin-right:0;">
          <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
      </li>

      <li class="col l6 m9 s6 push-l3">
        <h1 style="line-height: 56px; font-size: 24px; margin: 0px;">
            @yield('title')
          <span class="hide-on-small-only">
          - @yield('content')
          @if(isset($section))
            {{' - '.substr(ucwords(strtolower($section)), 0, 20) .'..'}}
          @endif
          </span>
        </h1>
      </li>

      <li class="right">
          <a class='dropdown-trigger' href='#' data-target='dropdown-control'>
            <div style="height: 56px; display: flex; align-items: center; justify-content: center;">
              <i class="material-icons">settings</i>
            </div>
          </a>
      </li>
      <li class="right hide-on-med-and-down">
        <span class="var(--main-color-title-single)" style="padding-right: 20px">
          @lang('translator.main-welcome') {{ucwords(Auth::user()->type)}}, {{ ucwords(Auth::user()->name) }}
        </span>
      </li>
    </ul>
</nav>

<ul id='dropdown-control' class='dropdown-content' style="background: var(--main-color-body-login)">
  <li>
    <a href="{{route('home')}}">
      <i class="material-icons">airplay</i>
      @lang('translator.main-dropdown-home')
    </a>
  </li>


  <li>
    <a href="{{ route('admin.edit', ['id' => Auth::user()->id]) }}">
      <i class="material-icons">vpn_key</i>
      @lang('translator.main-dropdown-profile')
    </a>
  </li>

  <li>
    <a href="mailto:soporte@osole.es">
      <i class="material-icons">chat</i>
      @lang('translator.main-dropdown-support')
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="material-icons">exit_to_app</i>
        @lang('translator.main-dropdown-signOff')
    </a>
  </li>
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
  {{ csrf_field() }}
</form>
