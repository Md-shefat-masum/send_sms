@include('layouts.admin.logo')

<ul class="metismenu" id="menu">
    <li>
        <div class="side_bar_top">
            <img src="{{ asset(''.Auth::user()->photo) }}" alt="profile pic">
            <h6>{{ Auth::user()->name }}</h6>
        </div>
    </li>
    <li>
        <a href="/admin">
            <div class="parent-icon"><i class="fa fa-envelope-o"></i></div>
            <div class="menu-title">Send Sms</div>
        </a>
    </li>

    @if(Auth::user()->role_id == 1)
        <li>
            <a class="has-arrow" href="#">
                <div class="parent-icon"><i class="zmdi zmdi-account-box-o"></i></div>
                <div class="menu-title">User Management</div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin_user_index') }}"><i class="zmdi zmdi-account-box-o"></i> All Users</a>
                </li>
            </ul>
        </li>
    @endif
{{--
    <li>
        <a class="has-arrow" href="#">
            <div class="parent-icon"><i class="zmdi zmdi-reader"></i></div>
            <div class="menu-title">Dropdown</div>
        </a>
        <ul class="">
            <li>
                <a href=""><i class="zmdi zmdi-dot-circle-alt"></i> eCommerce v1</a>
            </li>
            <li>
                <a href="#"><i class="zmdi zmdi-dot-circle-alt"></i> eCommerce v2</a>
                <ul class="">
                    <li>
                        <a href=""><i class="zmdi zmdi-dot-circle-alt"></i> eCommerce v1</a>
                    </li>
                    <li>
                        <a href="dashboard-eCommerce-v2.html"><i class="zmdi zmdi-dot-circle-alt"></i> eCommerce v2</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li> --}}

    <li class="menu-label">Extra</li>
    {{-- <li>
        <a href="/" target="_blank">
            <div class="parent-icon"><i class="zmdi zmdi-globe"></i></div>
            <div class="menu-title">Visit Site</div>
        </a>
    </li> --}}
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="parent-icon"><i class="zmdi zmdi-power-off"></i></div>
            <div class="menu-title">Logout</div>
        </a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>
