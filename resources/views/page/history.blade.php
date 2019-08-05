@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="/">Home</a> / <span>Lịch sử đơn hàng</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">

            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    @if(count($orderInfo) === 0)
                        <div class="sl-item text-center text-muted" style=""> Bạn chưa có đơn hàng nào...
                        </div>
                    @else
                        <div class="steamline">
                            <div class="sl-item" style="">
                                <i class="" style="cursor: default;margin: 0px 0 20px 0">
                                    {{date("d/m/Y", strtotime($userInfo->created_at))}}
                                </i>
                                <div class="bg-light row itemOrderHistory" data-toggle="collapse"
                                     data-target="#detail" aria-expanded="true"
                                     aria-controls="detail"
                                     style="cursor: pointer; padding:15px 10px 10px 20px;margin-left: 20px;margin-top: 20px;border-radius: 10px 10px 0px 0px !important;">
                                    <div class="d-flex row  col-sm-6 pull-left"
                                         style="border-radius: 10px;padding: 5px 0 0 10px;">
                                        <div style="" class="col-sm-12">
                                            <label style="width: 50%">ID đơn: </label>
                                            <i class="">0214{{$userInfo->order_id}}</i>
                                        </div>
                                        <div style="" class="col-sm-12">
                                            <label style="width: 50%">Thành tiền: </label>
                                            <i class="">{{number_format($userInfo->order_total)}} VNĐ</i>
                                        </div>
                                    </div>
                                    <div class="col pull-left col-sm-6"
                                         style="border-radius: 10px;padding: 5px 0 0 10px">
                                        <div style="" class="col-sm-12 text-right">
                                            @if($userInfo->order_status === 0)
                                                <i class="btn-info label" style="cursor: default;">Đang xử lý</i>
                                            @endif
                                            @if($userInfo->order_status === 1)
                                                <i class="btn-success label" style="cursor: default;">Đã giao</i>
                                            @endif
                                            @if($userInfo->order_status === 2)
                                                <i class="btn-info label" style="cursor: default;">Đang giao hàng</i>
                                            @endif
                                            @if($userInfo->order_status === 3)
                                                <i class="btn-danger label" style="cursor: default;">Bị từ chối</i>
                                            @endif
                                            @if($userInfo->order_status === 4)
                                                <i class="btn-danger label" style="cursor: default;">Bị trả lại</i>
                                            @endif
                                        </div>
                                        <div style="" class="col-sm-12"></div>
                                    </div>
                                </div>
                                <div style="height: 20px"></div>
                                <div id="detail" data-parent="#home" class="collapse animated fadeIn"
                                     style="padding: 0 0 0 40px">
                                    <div class="" style="border-radius: 50px;padding-right: 20px;">
                                        <table class="table " style="background-color: #e0e0e029">
                                            <thead class="text-right">
                                            <th style="width: 50%">Sản phẩm</th>
                                            <th style="width: 25%">Số lượng</th>
                                            <th style="width: 25%">Đơn giá</th>
                                            </thead>
                                            @foreach($orderInfo as $key => $order)
                                                <tbody class="text-right">
                                                <p class="hide">{{$order->quantity}}</p>
                                                <p class="hide">{{$order->quantity}}</p>
                                                <tr>
                                                    <td style="width: 50%"
                                                        class="text-left">{{$order->product_name}}</td>
                                                    <td style="width: 25%">{{$order->quantity}}</td>
                                                    <td style="width: 25%">{{ number_format($order->price) }} VNĐ</td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                            <tfoot class="btn-default">
                                            <td colspan="3">Thành tiền
                                                <b style="float: right;">{{ number_format($userInfo->order_total) }}
                                                    VNĐ</b>
                                            </td>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
            <script>
                $(document).ready(function () {
                    $("#changePassword").change(function () {
                        if ($(this).is(":checked")) {
                            alert("Bạn có muốn đổi mật khẩu");
                            $(".password").removeAttr('disabled');
                        } else {
                            $(".password").attr('disabled', '');
                        }
                    });
                });
            </script>
@endsection