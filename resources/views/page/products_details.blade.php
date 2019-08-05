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
                            </div>
                            <div class="space20">&nbsp;</div>
                            <div class="single-item-body">
                                <p class="single-item-price">
                                    Giá :
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
                    <div class="space40">&nbsp;
                        <div class="woocommerce-tabs">
                            <ul class="tabs">
                                <li><a href="#tab-reviews">Bình luận sản phẩm</a></li>
                            </ul>
                            <div class="panel" id="tab-reviews">
                                @if(Auth::check())
                                    {!! Form::open(['method' => 'POST', 'url' => 'binh-luan', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="form-group ">
                                        <input name="user_id" type="hidden"
                                               value="{{\Illuminate\Support\Facades\Auth::User()->id}}">
                                        <input name="product_id" type="hidden" value="{{$productDetail->id}}">
                                        <label for="comment">Bình luận:</label>
                                        <textarea name="content" class="form-control" rows="5" id="comment"
                                                  placeholder="nhập bình luận..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success right">Gửi bình luận</button>
                                    {!! Form::close() !!}
                                    <div class="page-header">
                                        <h1>{{!$productDetail->comments->isEmpty() ? count($productDetail->comments) . ' Bình luận' : 'Chưa có bình luận'}}</h1>
                                    </div>
                                    <div class="comments-list">
                                        @foreach($productDetail->comments as $comment)
                                            <div class="media">
                                                <p class="pull-right">
                                                    <small>{!!$comment->created_at !!}</small>
                                                </p>
                                                {{--<a class="media-left" href="#">--}}
                                                {{--<img src="http://lorempixel.com/40/40/people/1/">--}}
                                                {{--</a>--}}
                                                <div class="media-body">
                                                    <h6 class="media-heading user_name">{{$comment->users->name}}</h6>
                                                    {{$comment->content}}
                                                    <p>
                                                        <small><a href="delete/{{$comment->id}}">Delete</a></small>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <a href="dang-nhap"><p class="center">Vui lòng đăng nhập để bình luận</p>
                                    </a>
                                @endif
                            </div>
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
                                            <a href="{!! url('chi-tiet-san-pham', [$productSame->id, Str::slug($productSame->product_name)]) !!}"><img
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
                                               href="{!! url('chi-tiet-san-pham', [$productSame->id, Str::slug($productSame->product_name)]) !!}">Details
                                                <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Sản Phẩm Pet Shop</h3>
                        <div class="widget-body">
                            @foreach($randProducts as $randProduct)
                                <div class="beta-sales beta-lists">
                                    <div class="media beta-sales-item">
                                        <a class="pull-left"
                                           href="{!! url('chi-tiet-san-pham', [$randProduct->id, Str::slug($randProduct->product_name)]) !!}"><img
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
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Sản Phẩm Mới</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach($newProducts as $newProduct)
                                    <div class="media beta-sales-item">
                                        <a class="pull-left"
                                           href="{!! url('chi-tiet-san-pham', [$newProduct->id, Str::slug($newProduct->product_name)]) !!}"><img
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