<!-- side bar navigation-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">

    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>

            @if(Auth::user()->admin == true)
                <small class="app-sidebar__user-designation">Frontend Developer</small>
            @endif
        </div>
    </div>

    <!-- Side menu starting from here -->
    <ul class="app-menu">

        @if(Auth::user()->admin != true && Auth::user()->author != true)

        <!-- User side bar options start-->
        <li class="nav-title ml-2" style="color: #f8fafc; font-size: 13px">User</li>
        <hr color="#ffffff">

        <li><a class="app-menu__item {{ Route::currentRouteName() == 'userDashboard' ? 'active' : '' }}" href="{{ route('userDashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item {{ Route::currentRouteName() == 'userComments' ? 'active' : '' }}" href="{{ route('userComments') }}"><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Comments</span></a></li>

        @endif

        <!-- Author side bar options start-->
        @if(Auth::user()->author)
            <li class="nav-title ml-2 mt-2" style="color: #f8fafc; font-size: 13px">Author</li>
            <hr color="#ffffff">

            <li><a class="app-menu__item {{ Route::currentRouteName() == 'authorDashboard' ? 'active' : '' }}" href="{{ route('authorDashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            <li><a class="app-menu__item {{ Route::currentRouteName() == 'authorPosts' ? 'active' : '' }}" href="{{ route('authorPosts') }}"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Posts</span></a></li>
            <li><a class="app-menu__item {{ Route::currentRouteName() == 'authorComments' ? 'active' : '' }}" href="{{ route('authorComments') }}"><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Comments</span></a></li>
        @endif

        <!-- Admin side bar options start-->
        @if(Auth::user()->admin)
            <li class="nav-title ml-2 mt-2" style="color: #f8fafc; font-size: 13px">Admin</li>
            <hr color="#ffffff">

            <li><a class="app-menu__item {{ Route::currentRouteName() == 'adminDashboard' ? 'active' : '' }}" href="{{ route('adminDashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            <li><a class="app-menu__item {{ Route::currentRouteName() == 'adminPosts' ? 'active' : '' }}" href="{{ route('adminPosts') }}"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Posts</span></a></li>
            <li><a class="app-menu__item {{ Route::currentRouteName() == 'adminComments' ? 'active' : '' }}" href="{{ route('adminComments') }}"><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Comments</span></a></li>
            <li><a class="app-menu__item {{ Route::currentRouteName() == 'adminUsers' ? 'active' : '' }}" href="{{ route('adminUsers') }}"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Users</span></a></li>
         @endif
    </ul>
</aside>