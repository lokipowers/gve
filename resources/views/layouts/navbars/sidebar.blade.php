<div class="sidebar" data-color="purple" data-background-color="black" data-image="/images/sidebar.jpg">
    @php

        if(!isset($activePage)){
            $activePage = '';
        }


    @endphp
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            <img src="/images/logo-wings-small.png" alt="gve.world" width="260">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'character' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('character.viewOwn') }}">
                    <i class="material-icons">assignment_ind</i>
                    <p>{{ $currentUser->character->name ?? 'Create Character' }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'characters' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('character.viewAll') }}">
                    <i class="material-icons">group</i>
                    <p>Game Characters</p>
                </a>
            </li>
            <li class="nav-item {{ ($activePage == 'equipment/buy') ? ' active' : '' }}">
                <a class="nav-link collapsed" data-toggle="collapse" href="#equipment" aria-expanded="false">
                    <i class="material-icons">style</i>
                    <p>
                        Equipment
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="equipment">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'equipment' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('equipment.inventory') }}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">style</i>
                                </span>
                                <span class="sidebar-normal">{{ __('Inventory') }}</span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'equipment/buy' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('equipment.marketplace') }}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">shopping_cart</i>
                                </span>
                                <span class="sidebar-normal">{{ __('Purchase') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        <!--<li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('upgrade') }}">
          <i class="material-icons">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>-->
        </ul>
    </div>
</div>
