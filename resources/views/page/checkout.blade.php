@extends('master')
@section('content')
    <div class="container">
        <div id="content">
            <div class="row">
                <div>
                    <div class="col-sm-6">
                        <h4>Đặt hàng</h4>
                        <div class="space20">&nbsp;</div>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                                <p>Quý khách vui lòng kiểm tra mail để xác nhận đơn hàng</p>
                                <a  style="font-weight: bold" href="/">Quay lại trang chủ</a>
                            </div>
                        @endif
                        @if(Auth::check())
                            @if(!session('success'))
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="">Chào bạn {{Auth::User()->name}}</a></h5>
                                        <div class="space20">&nbsp;</div>
                                        <p class="card-text">Hàng sẽ được giao đến địa chỉ: </p>
                                        <div class="space20">&nbsp;</div>
                                        <p class="card-text text-danger font-italic">{{Auth::User()->address}}</p>
                                        <div class="space20">&nbsp;</div>
                                        <p class="cart-text font-italic">Vui lòng chọn đặt hàng để chúng tôi giao hàng đến cho bạn</p>
                                    </div>
                                </div>
                            @else {{null}}
                            @endif
                        @else
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item active col-5">
                                    <a class="nav-link active border-1" id="pills-home-tab" data-toggle="pill"
                                       href="#pills-home" role="tab" aria-controls="pills-home"
                                       aria-selected="true">Đăng nhập</a>
                                </li>
                                <li class="nav-item col-5">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                       href="#pills-profile" role="tab" aria-controls="pills-profile"
                                       aria-selected="false">Đăng ký</a>
                                </li>
                            </ul>
                            <div class="space20">&nbsp;</div>
                            <div class="space20">&nbsp;</div>
                            <div class="space20">&nbsp;</div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade active in" id="pills-home" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    {!! Form::open(['method' => 'POST', 'url' => 'login-checkout', 'id' => 'my_form', 'class' => 'beta-form-checkout']) !!}
                                    <div class="form-block">
                                        <label for="email">Email*</label>
                                        <input type="email" id="email" name="email" required
                                               placeholder="expample@gmail.com">
                                    </div>
                                    <div class="form-block">
                                        <label for="password">Mật khẩu</label>
                                        <input style="height: 37px;padding: 0 12px;border: 1px solid #e1e1e1;"
                                               type="password" id="password" name="password" placeholder="Mật khẩu"
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" id="submit"
                                                class="btn btn-primary btn-block btn-flat"><i
                                                    class="fas fa-sign-in-alt"></i> Đăng nhập
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                        {{--<div class="social-auth-links text-center mb-3">--}}
                                            {{--<p>- HOẶC -</p>--}}
                                            {{--<a href="#" class="btn btn-primary btn-block btn-social-facebook">--}}
                                                {{--<i class="fab fa-facebook-f"></i> Đăng nhập với Facebook--}}
                                            {{--</a>--}}
                                            {{--<a href="#" class="btn btn-primary btn-block btn-social-zalo">--}}
                                                {{--<i class="zalo"></i> Đăng nhập với Zalo--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                     aria-labelledby="pills-profile-tab">
                                    {!! Form::open(['method' => 'POST', 'url' => 'sign-up', 'id' => 'my_form', 'class' => 'beta-form-checkout'      ]) !!}
                                    <div class="form-block">
                                        <label for="name">Họ tên*</label>
                                        <input type="text" id="name" name="name" placeholder="Họ tên" required>
                                    </div>
                                    <div class="form-block">
                                        <label>Giới tính </label>
                                        <input id="gender" type="radio" class="input-radio" name="gender" value="0"
                                               checked="checked" style="width: 10%"><span
                                                style="margin-right: 10%">Nam</span>
                                        <input id="gender" type="radio" class="input-radio" name="gender" value="1"
                                               style="width: 10%"><span>Nữ</span>
                                    </div>
                                    <div class="form-block">
                                        <label for="email">Email*</label>
                                        <input type="email" id="email" name="email" required
                                               placeholder="expample@gmail.com">
                                    </div>
                                    <div class="form-block">
                                        <label for="password">Mật khẩu*</label>
                                        <input style="height: 37px;padding: 0 12px;border: 1px solid #e1e1e1;"
                                               type="password" id="password" name="password" required
                                               placeholder="Mật khẩu">
                                    </div>
                                    <div class="form-block">
                                        <label for="address">Địa chỉ*</label>
                                        <input type="text" name="address" id="address" placeholder="Địa chỉ"
                                               required>
                                    </div>
                                    <div class="form-block">
                                        <label for="phone">Điện thoại*</label>
                                        <input type="text" id="phone" name="phone" required>
                                    </div>
                                    <div class="form-block">
                                        <label for="notes">Ghi chú</label>
                                        <textarea id="notes"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" id="submit"
                                                class="btn btn-primary btn-block btn-flat"><i
                                                    class="fas fa-sign-in-alt"></i> Đăng ký
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                @endif
                            </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="your-order">
                            <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                            <div class="your-order-body" style="padding: 0px 10px">
                                @foreach($cartContent as $cart)
                                    <div class="your-order-item">
                                        <div>
                                            <div class="media">
                                                <img width="25%"
                                                     src="source/images/products/{{$cart->attributes['image']}}" alt=""
                                                     class="pull-left">
                                                <div class="media-body">
                                                    <p class="font-large">{{$cart->name}}</p>
                                                    <span class="color-gray your-order-info">Số lượng: {{$cart->quantity}}</span>
                                                    <span class="color-gray your-order-info">Giá: {{$cart->price}} đ</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endforeach
                                <div class="your-order-item">
                                    <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                    <div class="pull-right"><h5 class="color-black">{{number_format ($cartTotal)}}
                                            đ</h5></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

                            <div class="your-order-body">
                                <ul class="payment_methods methods">
                                    <li class="payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio"
                                               name="payment_method" value="COD" checked="checked"
                                               data-order_button_text="">
                                        <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                        <div class="payment_box payment_method_bacs" style="display: block;">
                                            Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền
                                            cho nhân viên giao hàng
                                        </div>
                                    </li>

                                    {{--<li class="payment_method_cheque">--}}
                                        {{--<input id="payment_method_cheque" type="radio" class="input-radio"--}}
                                               {{--name="payment_method" value="ATM" data-order_button_text="">--}}
                                        {{--<label for="payment_method_cheque">Chuyển khoản </label>--}}
                                        {{--<div class="payment_box payment_method_cheque" style="display: none;">--}}
                                            {{--Chuyển tiền đến tài khoản sau:--}}
                                            {{--<br>- Số tài khoản: 123 456 789--}}
                                            {{--<br>- Chủ TK: Nguyễn A--}}
                                            {{--<br>- Ngân hàng ACB, Chi nhánh TPHCM--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>
                            {!! Form::open(['method' => 'POST', 'url' => 'dat-hang', 'id' => 'my_form', 'class' => 'beta-form-checkout']) !!}
                            @if(!session('success'))
                                @if(Auth::check())
                                    <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
                                    <input type="hidden" name="email" value="{{Auth::User()->email}}">
                                    <div class="text-center">
                                        <button type="submit" class="beta-btn primary">Đặt hàng
                                            <i class="fa fa-chevron-right"></i></button>
                                    </div>
                                @else
                                    {{null}}
                                @endif
                            @else
                                {{null}}
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
            <script type="text/javascript">
                $(function () {
                    var url = window.location.href;
                    $(".main-menu a").each(function () {
                        if (url == (this.href)) {
                            $(this).closest("li").addClass("active");
                            $(this).parents('li').addClass('parent-active');
                        }
                    });
                });
            </script>
            <script>
                jQuery(document).ready(function ($) {
                    'use strict';
                    jQuery('#style-selector').animate({
                        left: '-213px'
                    });
                    jQuery('#style-selector a.close').click(function (e) {
                        e.preventDefault();
                        var div = jQuery('#style-selector');
                        if (div.css('left') === '-213px') {
                            jQuery('#style-selector').animate({
                                left: '0'
                            });
                            jQuery(this).removeClass('icon-angle-left');
                            jQuery(this).addClass('icon-angle-right');
                        } else {
                            jQuery('#style-selector').animate({
                                left: '-213px'
                            });
                            jQuery(this).removeClass('icon-angle-right');
                            jQuery(this).addClass('icon-angle-left');
                        }
                    });
                });
            </script>
@endsection