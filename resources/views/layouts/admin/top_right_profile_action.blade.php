<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown" href="javascript:void();">
    <span class="user-profile"><img src="{{ asset(''.Auth::user()->photo) }}" class="img-circle" alt="user avatar" /></span>
</a>
<ul class="dropdown-menu dropdown-menu-right">
    <li class="dropdown-item user-details">
        <a href="javaScript:void();">
            <div class="media">
                <div class="avatar"><img class="align-self-start mr-3" src="{{ asset(''.Auth::user()->photo) }}" alt="user avatar" /></div>

                <div class="media-body">
                    <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                    <p class="user-subtitle">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </a>
    </li>
    <li class="dropdown-divider"></li>
    <li class="dropdown-item"><i class="zmdi zmdi-comments mr-3"></i>Inbox</li>
    <li class="dropdown-divider"></li>
    <li class="dropdown-item">
        <a href="{{ route('admin_user_profile',Auth::user()->slug) }}">
            <i class="zmdi zmdi-balance-wallet mr-3"></i>Account
        </a>
    </li>
    <li class="dropdown-divider"></li>
    <li class="dropdown-item"><i class="zmdi zmdi-settings mr-3"></i>Setting</li>
    <li class="dropdown-divider"></li>
    <li class="dropdown-item"><i class="zmdi zmdi-power mr-3"></i>Logout</li>
</ul>
