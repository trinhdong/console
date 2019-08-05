@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-th-list"></i>
                Loại sản phẩm
                <small>View</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back', ['url' => 'admin/product-types'])
            </ol>
        </section>
        <section class="content">
            <div class="row col-xs-12">
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('ID') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$productType->id}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Thú cưng') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$productType->categories->pets->pet_name}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Danh mục') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$productType->categories->category_name}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Loại sản phẩm') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$productType->type_name}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Ngày tạo') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{date("d/m/Y", strtotime($productType->created_at))}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Ngày cập nhật') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{date("d/m/Y", strtotime($productType->updated_at))}}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection