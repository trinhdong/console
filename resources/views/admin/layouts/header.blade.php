<header class="main-header">
    <a href="admin" class="logo">
        <span class="logo-mini"><b>P</b>ET</span
        <span class="logo-lg"><b>Admin</b>PetShop</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="source/assets/dest/avatar/default-avatar.png" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            {{\Illuminate\Support\Facades\Auth::guard('admin_users')->check() ? \Illuminate\Support\Facades\Auth::guard('admin_users')->user()->name : "Đăng nhập"}}
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="source/assets/dest/avatar/default-avatar.png" class="img-circle" alt="User Image">
                            <p>
                                {{\Illuminate\Support\Facades\Auth::guard('admin_users')->check() ? \Illuminate\Support\Facades\Auth::guard('admin_users')->user()->name : ""}}
                                    <small></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="admin/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
@include('admin.layouts.sidebar')