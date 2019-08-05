@extends('master')
@section('content')

<style type="text/css" media="screen">
    .owl-nav,.owl-dots{display: none;}
    #itemCol{border: 1px solid #e3e3e3;border-radius:5px;}
    .owl-carousel .owl-stage{padding-top: 20px; background-color:#f5f5f5; border-radius:7px; }
</style>
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
                <div class="space50">&nbsp;</div>
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản Phẩm Mới</h4>
                        <div class="beta-products-details">
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-wrapper p-b-10 collapse in">
                                        <div id="owl-demo2" class="owl-carousel owl-theme">

                                            @foreach($newProducts as $newProduct)

                                            <div class="single-item-header" id="itemCol" >

                                                <a href="{!! url('chi-tiet-san-pham', [$newProduct->id, Str::slug($newProduct->product_name)]) !!}">

                                                <a href="{!! url('chi-tiet-san-pham', [$newProduct->id, $newProduct->product_name]) !!}">

                                                    <img height="250px"
                                                    src="source/images/products/{{$newProduct->image}}" alt="" title="{{$newProduct->product_name}}"></a>

                                                    <p class="single-item-title">{{$newProduct->product_name}}</p>
                                                    <p class="single-item-price">
                                                        <span>{{number_format ($newProduct->price)}} ₫</span>
                                                    </p>

                                                    <a class="add-to-cart pull-left"

                                                    href="{!! url('mua-hang', [$newProduct->id, Str::slug($newProduct->product_name)]) !!}"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary"
                                                    href="{!! url('chi-tiet-san-pham', [$newProduct->id, Str::slug($newProduct->product_name)]) !!}">

                                                    href="{!! url('mua-hang', [$newProduct->id, $newProduct->product_name]) !!}"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary"
                                                    href="{!! url('chi-tiet-san-pham', [$newProduct->id, $newProduct->product_name]) !!}">

                                                    Chi tiết
                                                    <i class="fa fa-chevron-right"></i></a>


                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>

                <div class="beta-products-list">
                    <h4>Sản Phẩm Khuyến Mãi</h4>
                    <div class="beta-products-details">
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo1" class="owl-carousel owl-theme">

                                    @foreach($promotionProducts as $promotionProduct)

                                    <div class="single-item-header" id="itemCol" >

                                        <a href="{!! url('chi-tiet-san-pham', [$promotionProduct->id, Str::slug($promotionProduct->product_name)]) !!}">

                                        <a href="{!! url('chi-tiet-san-pham', [$promotionProduct->id, $promotionProduct->product_name]) !!}">

                                            <img height="250px"
                                            src="source/images/products/{{$promotionProduct->image}}" alt="" title="{{$newProduct->product_name}}"></a>

                                            <p class="single-item-title">{{$promotionProduct->product_name}}</p>
                                            <p class="single-item-price">
                                                <span class="flash-del">{{number_format ($promotionProduct->price)}} ₫</span>
                                                <span class="flash-sale">{{number_format ( $promotionProduct->promotion_price)}} ₫</span>
                                            </p>

                                            <a class="add-to-cart pull-left"

                                            href="{!! url('mua-hang', [$promotionProduct->id, Str::slug($promotionProduct->product_name)]) !!}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary"
                                            href="{!! url('chi-tiet-san-pham', [$promotionProduct->id, Str::slug($promotionProduct->product_name)]) !!}">Chi

                                            href="{!! url('mua-hang', [$promotionProduct->id, $promotionProduct->product_name]) !!}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary"
                                            href="{!! url('chi-tiet-san-pham', [$promotionProduct->id, $promotionProduct->product_name]) !!}">Chi

                                            tiết <i
                                            class="fa fa-chevron-right"></i></a>


                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="space40">&nbsp;</div>
            </div>
        </div>
    </div>
</div>

@endsection