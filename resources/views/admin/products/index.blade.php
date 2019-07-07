@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <i class="glyphicon glyphicon-th"></i>
                Product
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="active"></i>Product</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['class' => 'search-form',
                                            'method' => 'GET', 'url' => 'admin/products',
                                            'accept-charset' => 'utf-8',
                                            'novalidate' => 'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {!! Form::label('product_id', 'ID') !!}
                                    {!! Form::number('id', '', ['class' => 'form-control', 'min' => 1]) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('Tên sản phẩm') !!}
                                    {!! Form::number('id', '', ['class' => 'form-control', 'min' => 1]) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('Loại sản phẩm') !!}
                                    {!! Form::select('type_id', ['' => '---------------'] + $productTypes, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            @include('admin.elements.button.search')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom">
                @include('admin.elements.button.add',['url' => 'admin/products', 'step' => 1])
            </div>
            @if($products->isEmpty())
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
                                    <th>Tên</th>
                                    <th>Hình</th>
                                    <th>Giá</th>
                                   <th>Tên loại</th>
                                   <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->product_name}}</td>
                                         <td><img width="120px" src="source/images/products/{{$product->image}}" class="img-responsive" alt="Image"></td>
                                         <td>{{number_format ( $product->price , 0 , "." , "," )}}</td>
                                        <td>{{$product->productTypes->type_name}}</td>
                                        <td width="150">
                                                @include('admin.elements.button.view', ['url' => 'admin/products/', 'id' => $product->id])
                                                @include('admin.elements.button.edit', ['url' => 'admin/products/', 'id' => $product->id])
                                                @include('admin.elements.button.delete', ['url' => 'admin/products/', 'id' => $product->id])
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