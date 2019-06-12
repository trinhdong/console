@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-book"></i>
                TypeProduct
                <small>Edit</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back', ['url' => 'admin/typeproduct'])
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/typeproduct/edit/'.$product_types->id, 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                    {!! Form::label('Tên loại sản phẩm') !!}
                                    {!! Form::text('type_name',$product_types->type_name, [
                                    'class' => 'form-control width-400',
                                    'placeholder' => 'Nhập tên loại sản phẩm',
                                    'minlength' => '3',
                                    'maxlength' => '100'
                                    ]) !!}
                                </div>
                                 @if ($errors->has('type_name'))
                                <p class="help is-danger">{{ $errors->first('type_name') }}</p>
                            @endif
                                <div class="form-group">
                                    {!! Form::label('Danh mục sản phẩm') !!}
                                    {!! Form::select('category_id', ['' => 'Chọn danh mục'] + $categories,$product_types->category->id, ['class' => 'form-control width-400']) !!}
                                </div>
                            @if ($errors->has('category_id'))
                                <p class="help is-danger">{{ $errors->first('category_id') }}</p>
                            @endif
                            @include('admin.elements.button.save_edit')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@include('admin.elements.script.error')