@extends('master')
@section('content')

    <div class="container">
        <div id="content">

            <div class="table-responsive">
                <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="product-name">Hình ảnh</th>
                        <th class="product-name">Sản phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Tổng tiền</th>
                        <th class="product-action">Action</th>
                    </thead>
                    <tbody>

                    @foreach($cartContent as $cart)
                        {!! Form::open(['method' => 'GET', 'url' => 'update', 'id' => 'my_form']) !!}
                        <input type="hidden" value="{{$cart->id}}" name="id">
                        <tr class="cart_item">
                            <td class="product-image">
                                <img width="200px" height="150px" class="" src="source/images/products/{{$cart->attributes['image']}}" alt="">
                            </td>

                            <td class="product-name">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="font-large table-title">{{$cart->name}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="product-price">
                                <span class="amount">{{number_format ($cart->price)}} ₫</span>
                            </td>

                            <td class="product-quantity">
                                <input type="text" size="1" value="{{$cart->quantity}}"
                                       class="quantity center" name="quantity"/>
                            </td>

                            <td class="product-subtotal">
                                <span class="amount">{{number_format ($cart->price * $cart->quantity)}} đ</span>
                            </td>

                            <td class="">
                                <a href="{!! url('delete', $cart->id) !!}" class="remove"
                                   title="Xóa sản phẩm trong giỏ hàng"><i class="fa fa-trash-o"></i></a>
                                <a href="javascript:void()" onclick="document.getElementById('my_form').submit();" title="Cập nhật lại giở hàng">
                                    <i style="font-size: 15px" class="fa fa-refresh fa-3"></i></a>

                            </td>
                        </tr>
                        {!! Form::close() !!}
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6" class="actions">
                            <a href="{!! url('/') !!}" type="button" class="beta-btn primary" name="update_cart">Mua thêm
                                <i class="fa fa-chevron-right"></i></a>
                            <a href="{!! url('dat-hang') !!}" class="beta-btn primary" name="proceed">Thanh toán
                                <i class="fa fa-chevron-right"></i></a>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>


            <div class="cart-collaterals">
                <div class="cart-totals pull-right">
                    <div class="cart-totals-row"><h5 class="cart-total-title">Tổng tiền giỏ hàng</h5></div>
                    {{--<div class="cart-totals-row"><span>Shipping:</span> <span>Free Shipping</span></div>--}}
                    <div class="cart-totals-row"><span>Tổng cộng:</span> <span>{{number_format ($cartTotal)}}</span>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>

@endsection