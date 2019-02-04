<!-- side bar navigation-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
            <small class="app-sidebar__user-designation">Frontend Developer</small>
        </div>
    </div>
    <ul class="app-menu">

        <!-- User side bar options start-->
        <li class="nav-title ml-2" style="color: #f8fafc; font-size: 13px">User</li>
        <hr color="#ffffff">

        <li><a class="app-menu__item active" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Comments</span></a></li>

        <!-- Author side bar options start-->
        <li class="nav-title ml-2 mt-2" style="color: #f8fafc; font-size: 13px">Author</li>
        <hr color="#ffffff">

        <li><a class="app-menu__item " href="charts.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="charts.html"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Posts</span></a></li>
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Comments</span></a></li>

        <!-- Admin side bar options start-->
        <li class="nav-title ml-2 mt-2" style="color: #f8fafc; font-size: 13px">Admin</li>
        <hr color="#ffffff">

        <li><a class="app-menu__item " href="charts.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="charts.html"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Posts</span></a></li>
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Comments</span></a></li>
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Users</span></a></li>


    </ul>
</aside>