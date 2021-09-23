@php
    $user = Illuminate\Support\Facades\Auth::user();
    $menus = App\Menu::all();
    $menu_id_active = App\MenuItem::select("menu_id")->where("slug", $slug)->first() ?? new App\MenuItem(); 
@endphp

<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('assets/images/user.jpg')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$user->name}}</div>
            <div class="email">{{$user->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>Déconnection
                    </a></li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">NAVIGATION PRINCIPALE</li>
            @foreach ($menus as $menu)
                <li class="{{$menu_id_active->menu_id == $menu->menu_id ? "active" : ""}}">
                    @if ($menu->slug == "dashboard_view")
                        <a href="/admin" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">{{$menu->icon}}</i>
                            <span>{{$menu->name}}</span>
                        </a>
                    @else
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">{{$menu->icon}}</i>
                            <span>{{$menu->name}}</span>
                        </a>
                    @endif
                    <ul class="ml-menu">
                        @foreach ($menu->menuItems as $item)
                            <li class="{{$item->slug == $slug ? "active" : ""}}">
                                <a href="/admin/{{$item->slug}}" class="{{$item->slug == $slug ? "toggled" : ""}} waves-effect waves-block">
                                    <span>{{$item->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2020 - 2021 <a href="javascript:void(0);">Emmanuel Narrys - Geschool</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.2
        </div>
    </div>
    <!-- #Footer -->
</aside>