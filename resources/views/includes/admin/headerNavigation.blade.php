<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{ route('index') }}" style="font-size: 40px">iWrite</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle mt-1" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- SEARCH -->
        <!--<li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li> -->
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                                aria-label="Open Profile Menu"><img class="app-sidebar__user-avatar"
                                                                    src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
                                                                    width="30px" height="30px" alt="User Image">{{ Auth::user()->name }}</a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <form method="POST" id="logout-form" action="{{ route ('logout') }}">@csrf</form>
                <li><a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>