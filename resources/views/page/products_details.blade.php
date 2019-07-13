@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Chi Tiết Sản Phẩm</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="/">Home</a> / <span>Sản Phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="source/images/products/{{$productDetail->image}}" width="300px" height="350px"
                                 alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">
                                <h1>{{$productDetail->product_name}}</h1>
                                </p>
                                <p class="single-item-price">
                                    @if($productDetail->promotion_price==0)
                                        <span>{{number_format($productDetail->price)}} ₫</span>
                                    @else
                                        <span class="flash-del">{{number_format($productDetail->price)}} ₫</span>
                                        <span class="flash-sale">{{number_format($productDetail->promotion_price)}} ₫</span>
                                    @endif
                                </p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="space20">&nbsp;</div>

                            <div class="single-item-options">
                                <select class="wc-select" name="color">
                                    <option>Số Lượng</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <a class="add-to-cart pull-left"
                                   href="{!! url('mua-hang', [$productDetail->id, $productDetail->product_name]) !!}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <h1 style="font-weight: bolder;">Mô tả</h1>
                    <div class="space40">&nbsp;
                        <div class="single-item-desc">
                            <p>{!!$productDetail->description!!}</p>
                        </div>
                    </div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-reviews">Reviews (0)</a></li>
                        </ul>
                        <div class="panel" id="tab-reviews">
                            <p>No Reviews</p>
                        </div>
                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Sản Phẩm Tương Tự </h4>

                        <div class="row">
                            @foreach($productSames as $productSame)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{!! url('chi-tiet-san-pham', [$productSame->id, $productSame->product_name]) !!}"><img
                                                        src="source/images/products/{{$productSame->image}}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$productSame->product_name}}</p>
                                            <p class="single-item-price">
                                                @if($productSame->promotion_price==0)
                                                    <span>{{number_format($productSame->price)}} ₫</span>
                                                @else
                                                    <span class="flash-del">{{number_format($productSame->price)}} ₫</span>
                                                    <span class="flash-sale">{{number_format($productSame->promotion_price)}} ₫</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="#"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary"
                                               href="{!! url('chi-tiet-san-pham', [$productSame->id, $productSame->product_name]) !!}">Details
                                                <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {!!$newProducts->links()!!}
                </div>
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Sản Phẩm Pet Shop</h3>
                        <div class="widget-body">
                            @foreach($randProducts as $randProduct)
                                <div class="beta-sales beta-lists">
                                    <div class="media beta-sales-item">
                                        <a class="pull-left"
                                           href="{!! url('chi-tiet-san-pham', [$randProduct->id, $randProduct->product_name]) !!}"><img
                                                    src="source/images/products/{{$randProduct->image}}" alt=""></a>
                                        <div class="media-body">
                                            <div>
                                                {{$randProduct->product_name}}
                                            </div>
                                            <span class="beta-sales-price">{{number_format($randProduct->price)}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- best sellers widget -->
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Sản Phẩm Mới</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach($newProducts as $newProduct)
                                    <div class="media beta-sales-item">
                                        <a class="pull-left"
                                           href="{!! url('chi-tiet-san-pham', [$newProduct->id, $newProduct->product_name]) !!}"><img
                                                    src="source/images/products/{{$newProduct->image}}" alt=""></a>
                                        <div class="media-body">
                                            <div>{{$newProduct->product_name}}</div>
                                            <span class="beta-sales-price">{{number_format($newProduct->price)}} ₫</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection