<div class="beta-comp">
    <div class="cart">
        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng
            ({{$cartContent ? count($cartContent) : 'Trống'}} )<i
                    class="fa fa-chevron-down"></i></div>
        <div class="beta-dropdown cart-body">
            @foreach($cartContent as $cart)
                <div class="cart-item">
                    <div class="media">
                        <a class="pull-left" href="#"><img
                                    src="source/images/products/{{$cart->attributes['image']}}" alt=""></a>
                        <div class="media-body">
                            <span class="cart-item-title">{{$cart->name}}</span>
                            <span class="cart-item-amount">Số lượng: {{$cart->quantity}}</span>
                            <span>{{number_format ($cart->price * $cart->quantity)}} đ</span></span>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="cart-caption">
                <div class="cart-total text-right">Tổng tiền: <span
                            class="cart-total-value">{{number_format ($cartTotal)}}</span></div>
                <div class="clearfix"></div>

                <div class="center">
                    <div class="space10">&nbsp;</div>
                    <a href="dat-hang" class="beta-btn primary text-center">Đặt hàng <i
                                class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>