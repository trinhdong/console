@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-th-list"></i>
                Sản Phẩm
                <small>Add</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back', ['url' => 'admin/products'])
            </ol>
        </section>

        <section class="content">	
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/products/add', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                {!! Form::label('Tên sản phẩm') !!}
                                {!! Form::text('product_name', '', [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập tên sản phẩm',
                                'minlength' => '3',
                                'maxlength' => '100'
                                ]) !!}
                            </div>
                            @if ($errors->has('product_name'))
                                <p class="help is-danger">{{ $errors->first('product_name') }}</p>
                            @endif
                            <div class="form-group">
                            	{!! Form::label('Hình sản phẩm') !!}
                                {!! Form::file('image', ); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Loại sản phẩm') !!}
                                {!! Form::select('product_type_id', ['' => 'Chọn danh mục'] + $productTypes, '', ['class' => 'form-control width-400']) !!}
                            </div>
	                         <div class="form-group">
	                            {!! Form::label('Số lượng') !!}
	                            {!! Form::text('quantity', '', [
	                            'class' => 'form-control width-400',
	                            'placeholder' => 'Nhập số lượng'
	                            ]) !!}
	                        </div>
	                        <div class="form-group">
	                            {!! Form::label('Giá') !!}
	                            {!! Form::text('price', '', [
	                            'class' => 'form-control width-400',
	                            'placeholder' => 'Nhập giá tiền'
	                            ]) !!}
	                        </div>
	                        <div class="form-group">
                                {!! Form::label('Mô tả sản phẩm') !!}
                                {!! Form::text('description', '', [
                                'class' => 'form-control width-400',
                                'minlength' => '50',
                                'maxlength' => '500'
                                ]) !!}
                            </div>

                            @include('admin.elements.button.save_add')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@include('admin.elements.script.error')