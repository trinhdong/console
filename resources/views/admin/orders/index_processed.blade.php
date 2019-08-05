@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <i class="glyphicon glyphicon-shopping-cart"></i>
                Đơn hàng
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="active"></i>Đơn hàng đã xử lý</li>
            </ol>
        </section>

        <section class="content">
            @if($users->isEmpty())
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <p>Không có dữ liệu</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mã hóa đơn</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $index => $user)
                                        <tr>
                                            <td>0214{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td id="status" style="color: orange">{{$user->order_status}}</td>
                                            <td width="100">
                                                @include('admin.elements.button.view', ['url' => 'admin/orders/', 'id' => $user->id])
                                                @include('admin.elements.button.delete', ['url' => 'admin/orders/', 'id' => $user->order_id])
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </div>
@endsection
@section('script_order')
    <script>
        $(document).ready(function () {
            switch ($("#status").text()) {
                case "2" :
                    return $("#status").text("Đang giao");
                case "3" :
                    return $("#status").text("Bị trả lại");
                case "4" :
                    return $("#status").text("Bị từ chối");
                default :
                    return $("#status").text("Đã giao");
            }
        })
    </script>
@endsection