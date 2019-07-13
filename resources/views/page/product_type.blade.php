@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="/">Home</a> / <span>Sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                                <li>
                                    <a href="{!! url('loai-san-pham', [$productTypes->id, $productTypes->type_name]) !!}">{{$productTypes->type_name}} </a>
                                </li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>Tất cả sản phẩm</h4>
                            <div class="beta-products-details">
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($productTypes->products as $product)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="{!! url('chi-tiet-san-pham', [$product->id, $product->product_name]) !!}"><img
                                                            src="source/images/products/{{$product->image}}"
                                                            alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$product->product_name}}</p>
                                                <p class="single-item-price">
                                                    <span>{{number_format ($product->price)}} ₫</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{!! url('mua-hang', [$product->id, $product->product_name]) !!}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   href="{!! url('chi-tiet-san-pham', [$product->id, $product->product_name]) !!}">Details
                                                    <i
                                                            class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
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
    <div class="space50">&nbsp;</div>
@endsection