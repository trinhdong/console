@extends('master')
@section('content')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Kết quả tìm kiếm</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($products)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="{{url('chi-tiet-san-pham', [$product->id, $product->product_name])}}"><img
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
                                                <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   href="{{url('chi-tiet-san-pham', [$product->id, $product->product_name])}}">Chí
                                                    tiết <i
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
                <div class="space50">&nbsp;</div>
            </div>
        </div>
    </div>
@endsection