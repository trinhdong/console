@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-th"></i>
                Sản Phẩm
                <small>Edit</small>
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
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/products/edit/'.$products->id, 'enctype' => 'multipart/form-data']) !!}
                            {!! Form::hidden('id', $products->id) !!}
                            <div class="form-group">
                                {!! Form::label('Tên sản phẩm') !!}
                                {!! Form::text('product_name', $products->product_name, [
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
                                <p><img width="320px" src="source/images/products/{{$products->image}}"></p>
                                <p><input type="file" name="image"></p>
                            </div>
                            @if ($errors->has('image'))
                                <p class="help is-danger">{{ $errors->first('image') }}</p>
                            @endif
                            <div class="form-group">
                                {!! Form::label('Loại sản phẩm') !!}
                                {!! Form::select('product_type_id', ['' => 'Chọn danh mục'] + $productTypes, $products->productTypes->id, ['class' => 'form-control width-400']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mô tả sản phẩm') !!}
                                {!! Form::textarea('description',$products->description, [
                                'id' => 'editor1',
                                'rows' => "10",
                                'cols' => "80"
                                ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Số lượng') !!}
                                {!! Form::text('quantity',$products->quantity, [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập số lượng'
                                ]) !!}
                            </div>
                            @if ($errors->has('quantity'))
                                <p class="help is-danger">{{ $errors->first('quantity') }}</p>
                            @endif
                            <div class="form-group">
                                {!! Form::label('Giá') !!}
                                {!! Form::text('price',$products->price, [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập giá tiền'
                                ]) !!}
                            </div>
                            @if ($errors->has('price'))
                                <p class="help is-danger">{{ $errors->first('price') }}</p>
                            @endif
                            <div class="form-group">
                                {!! Form::label('Giá khuyến mãi') !!}
                                {!! Form::text('promotion_price',$products->promotion_price, [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập giá tiền khuyến mãi'
                                ]) !!}
                            </div>

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