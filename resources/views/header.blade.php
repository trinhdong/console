<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 180 Cao Lỗ, Phường 4, Quận 8, Tp.Hồ Chí Minh</a>
                    </li>
                    <li><a href=""><i class="fa fa-phone"></i> 0901 316 300</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                    <li><a href="viewinfo/{{Auth::User()->id}}">Chào bạn {{Auth::User()->name}}</a></li>
                    <li><a href="{{url('dang-xuat')}}">Đăng xuất</a></li>
                    @else
                    <li><a href="{{url('dang-ky')}}">Đăng kí</a></li>
                    <li><a href="{{url('dang-nhap')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="/" id="logo"><img src="../source/assets/dest/images/logo-pet.jpg" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="" id="searchform" action="{{url('search')}}">
                        <input type="text" value="" name="product_name" id="product_name"
                        placeholder="Nhập từ khóa..."  autocomplete="off" />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>

                    </form>
                    <div id="countryList">
                    </div>
                </div>
                {{ csrf_field() }}
                @include('page.cart')
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span>
                <i class="fa fa-bars"></i></a>
                <div class="visible-xs clearfix"></div>
                <nav class="main-menu">
                    <ul class="l-inline ov">
                        <li><a href="/">Trang chủ</a></li>
                        <li><a href="javascript:">Mua Hàng Online</a>
                            <ul class="sub-menu">
                                @foreach($categoryMenu as $category)
                                <li>
                                    <a href="{!! url('danh-muc', [$category->id, $category->category_name]) !!}">{{$category->category_name}} </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="/">Giới thiệu</a></li>
                        <li><a href="{{url('lien-he')}}">Liên hệ</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div>
        </div>
    </div>
   
