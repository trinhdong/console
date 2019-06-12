@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <i class="glyphicon glyphicon-book"></i>
                ProductType
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="active"></i>ProductType</li>
            </ol>
        </section>

        <section class="content">
            <div class="row margin-bottom">
                @include('admin.elements.button.add',['url' => 'admin/typeproduct'])
            </div>
            @if($product_types->isEmpty())
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
                                    <th>ID</th>
                                    <th>Tên loại</th>
                                    <th>Mã danh mục</th>
                                    <th>Ngày tạo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_types as $typeproduct)
                                    <tr>
                                        <td>{{$typeproduct->id}}</td>
                                        <td>{{$typeproduct->type_name}}</td>
                                        <td>{{$typeproduct->category_id}}</td>
                                        <td>{{$typeproduct->created_at}}</td>
                                        <td width="150">
                                                @include('admin.elements.button.view', ['url' => 'admin/typeproduct/', 'id' => $typeproduct->id])
                                                @include('admin.elements.button.edit', ['url' => 'admin/typeproduct/', 'id' => $typeproduct->id])
                                                @include('admin.elements.button.delete', ['url' => 'admin/typeproduct/', 'id' => $typeproduct->id])
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