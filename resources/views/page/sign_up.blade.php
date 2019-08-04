@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="/">Home</a> / <span>Đăng ký</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">

            <form action="{{url('dang-ky')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4>ĐĂNG KÝ</h4>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <div class="space20">&nbsp;</div>


                        <div class="form-group">
                            <label for="email">Địa chỉ email*</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <label for="name">Họ và Tên</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="sex">Giới tính</label>

                            <input style="margin-left: 50px"; placeholder="" name="gender" type="radio" value="0" checked="">Nam
                            <input style="margin-left: 50px"; placeholder="" name="gender" type="radio" value="1">Nữ
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ*</label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>


                        <div class="form-group">
                            <label for="phone">Số điện thoại*</label>
                            <input type="text" class="form-control" name="phone"  id="phone">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu*</label>
                            <input type="password" class="form-control" name="password" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="password">Nhập lại mật khẩu*</label>
                            <input type="password" class="form-control" name="password_same" id="pwd_same">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">ĐĂNG KÝ</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div>
    </div>
@endsection