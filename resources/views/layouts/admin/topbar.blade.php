<nav class="navbar navbar-expand fixed-top">
    <div class="toggle-menu">
        <i class="zmdi zmdi-menu"></i>
    </div>

    <div class="search-bar flex-grow-1 d-none">
        @include('layouts.admin.top_search')
    </div>

    <ul class="navbar-nav align-items-center right-nav-link ml-auto">
        <li class="nav-item dropdown search-btn-mobile">
            <a class="nav-link position-relative" href="javascript:void();">
                <i class="zmdi zmdi-search align-middle"></i>
            </a>
        </li>

        <li class="nav-item dropdown dropdown-lg d-none">
            @include('layouts.admin.top_message_alert')
        </li>

        <li class="nav-item dropdown dropdown-lg d-none">
            @include('layouts.admin.top_notification_alert')
        </li>

        <li class="nav-item dropdown language d-none">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown" href="javascript:void();"><i class="flag-icon flag-icon-gb align-middle"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-item"><i class="flag-icon flag-icon-gb mr-3"></i>English</li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            @include('layouts.admin.top_right_profile_action')
        </li>
    </ul>
</nav>
