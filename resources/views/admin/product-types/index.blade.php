@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <i class="glyphicon glyphicon-th-list"></i>
                Loại sản phẩm
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="active"></i>Loại sản phẩm</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['class' => 'search-form',
                                            'method' => 'GET', 'url' => 'admin/product-types',
                                            'accept-charset' => 'utf-8',
                                            'novalidate' => 'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {!! Form::label('type_id', 'ID') !!}
                                    {!! Form::number('id', '', ['class' => 'form-control', 'min' => 1]) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('Danh mục') !!}
                                    {!! Form::select('category_id', ['' => '---------------'] + $categories, null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('Tên loại') !!}
                                    {!! Form::text('type_name', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            @include('admin.elements.button.search')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom">
                @include('admin.elements.button.add',['url' => 'admin/product-types'])
            </div>
            @if($productTypes->isEmpty())
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
                                        <th>Loại sản phẩm</th>
                                        <th>Thú cưng</th>
                                        <th>Danh mục</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productTypes as $productType)
                                        <tr>
                                            <td>{{$productType->id}}</td>
                                            <td>{{$productType->type_name}}</td>
                                            <td>{{$productType->categories->pets->pet_name}}</td>
                                            <td>{{$productType->categories->category_name}}</td>
                                            <td width="150">
                                                @include('admin.elements.button.view', ['url' => 'admin/product-types/', 'id' => $productType->id])
                                                @include('admin.elements.button.edit', ['url' => 'admin/product-types/', 'id' => $productType->id])
                                                @include('admin.elements.button.delete', ['url' => 'admin/product-types/', 'id' => $productType->id])
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