@extends('master')
@section('content')

    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        @foreach($slides as $slide)
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                     data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                     data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                     data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                     data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                     data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                         data-bgposition="center center" data-bgrepeat="no-repeat"
                                         data-lazydone="undefined"
                                         src="../source/assets/dest/images/slide/{{$slide->image}}"
                                         data-src="../source/assets/dest/images/slide/{{$slide->image}}"
                                         style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('../source/assets/dest/images/slide/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Sản Phẩm Mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($newProducts)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($newProducts as $newProduct)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="{!! url('chi-tiet-san-pham', [$newProduct->id, $newProduct->product_name]) !!}">
                                                    <img height="250px" src="source/images/products/{{$newProduct->image}}" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$newProduct->product_name}}</p>
                                                <p class="single-item-price">
                                                    <span>{{number_format ($newProduct->price)}} ₫</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{!! url('mua-hang', [$newProduct->id, $newProduct->product_name]) !!}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   href="{!! url('chi-tiet-san-pham', [$newProduct->id, $newProduct->product_name]) !!}">
                                                    Chi tiết
                                                    <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {!!$newProducts->links()!!}
                <div class="space50">&nbsp;</div>

                <div class="beta-products-list">
                    <h4>Sản Phẩm Khuyến Mãi</h4>
                    <div class="beta-products-details">
                        <p class="pull-left">Tìm thấy {{count($promotionProducts)}} sản phẩm</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        @foreach($promotionProducts as $promotionProduct)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>

                                    <div class="single-item-header">
                                        <a href="{!! url('chi-tiet-san-pham', [$promotionProduct->id, $promotionProduct->product_name]) !!}">
                                            <img height="250px" src="source/images/products/{{$promotionProduct->image}}" alt="">
                                        </a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$promotionProduct->product_name}}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{number_format ($promotionProduct->price)}} ₫</span>
                                            <span class="flash-sale">{{number_format ( $promotionProduct->promotion_price)}} ₫</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left"
                                           href="{!! url('mua-hang', [$promotionProduct->id, $promotionProduct->product_name]) !!}"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary"
                                           href="{!! url('chi-tiet-san-pham', [$promotionProduct->id, $promotionProduct->product_name]) !!}">Chi
                                            tiết <i
                                                    class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- phân trang --}}
                    {!!$promotionProducts->links()!!}
                    <div class="space40">&nbsp;</div>
                </div> <!-- .beta-products-list -->
            </div>
        </div>


    </div>

@endsection