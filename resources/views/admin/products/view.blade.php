@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-th"></i>
                Sản Phẩm
                <small>View</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back', ['url' => 'admin/products'])
            </ol>
        </section>
        <section class="content">
            <div class="row col-xs-12">
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('ID') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$product->id}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Tên sản phẩm') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$product->product_name}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Thú cưng') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$product->productTypes->categories->pets->pet_name}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Danh mục') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$product->productTypes->categories->category_name}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Loại sản phẩm') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$product->productTypes->type_name}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Hình sản phẩm') !!}
                    </div>
                    <div class="col-md-9">
                        <p><img width="320px" src="source/images/products/{{$product->image}}"></p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Số lượng') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$product->quantity}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Giá') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{number_format ( $product->price , 0 , "." , "," )}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Giá khuyến mãi') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{number_format ( $product->promotion_price , 0 , "." , "," )}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Ngày tạo') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$product->created_at}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Ngày cập nhật') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$product->updated_at}}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection