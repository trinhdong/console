@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-shopping-cart"></i>
                Chi tiết đơn hàng
                <small>View</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back', ['url' => 'admin/orders'])
            </ol>
        </section>
        <section class="content">
            <div class="row col-xs-12">
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('ID') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$userInfo->id}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Tên') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$userInfo->name}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Email') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$userInfo->email}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Ngày sinh') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$userInfo->birthday}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Giới tính') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$userInfo->sex == 0 ? "Nam" : "Nữ"}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Số điện thoại') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$userInfo->phone}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Trạng thái đơn hàng') !!}
                    </div>
                    <div class="col-md-9">
                        <p style="color: orange" id="status">{{$userInfo->order_status}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Ngày đặt hàng') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$userInfo->created_at}}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row col-xs-12">
                <div class="box box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderInfo as $key => $order)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{number_format($order->price)}} VNĐ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"><b>Tổng tiền</b></td>
                            <td colspan="1"><b class="text-red">{{ number_format($userInfo->order_total) }} VNĐ</b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row margin-top-15 margin-bottom-15">
                    <div class="col-md-12 text-right">
                        {!! Form::open(['method' => 'POST', 'url' => 'admin/orders/update/'.$userInfo->order_id, 'enctype' => 'multipart/form-data']) !!}
                        @if($userInfo->order_status !== 1)
                        <button class="btn btn-primary" name="status" value="1">
                            <i class="glyphicon glyphicon-ok"></i>
                            Đã giao
                        </button>
                        @endif
                        @if($userInfo->order_status !== 2)
                        <button class="btn btn-warning" name="status" value="2">
                            <i class="glyphicon glyphicon-refresh"></i>
                            Đang giao
                        </button>
                        @endif
                        @if($userInfo->order_status !== 3)
                        <button class="btn btn-pinterest" name="status" value="3">
                            <i class="glyphicon glyphicon-repeat"></i>
                            Bị trả lại
                        </button>
                        @endif
                        @if($userInfo->order_status !== 4)
                        <button class="btn btn-danger" name="status" value="4">
                            <i class="glyphicon glyphicon-remove"></i>
                            Bị từ chối
                        </button>
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script_order')
    <script>
        $(document).ready(function () {
            switch ($("#status").text()) {
                case "1" :
                    return $("#status").text("Đã giao");
                case "2" :
                    return $("#status").text("Đang giao");
                case "3" :
                    return $("#status").text("Bị trả lại");
                case "4" :
                    return $("#status").text("Bị từ chối");
                default :
                    return $("#status").text("Chưa xử lý");
            }
        })
    </script>
@endsection