<div class="control-sidebar-bg"></div>
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu">
            @foreach(SCREEN_OPTIONS as $menuType => $menus)
                {{--<li class="header">{{$menuType}}</li>--}}
                {{--@if($menuType === SCREEN_TYPE_CONSOLE)--}}
                    {{--<li class="treeview active">--}}
                        {{--<a href="/admin/categories/index">--}}
                            {{--<i class="glyphicon glyphicon-home"></i> <span>Home</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
                @foreach($menus as $route => $option)
                    <li class="treeview">
                        <a href="admin/{{$route}}">
                            <i class="glyphicon glyphicon-{{$option[1]}}"></i> <span>{{$option[0]}}</span>
                        </a>
                    </li>
                @endforeach
            @endforeach
        </ul>
    </section>
</aside>