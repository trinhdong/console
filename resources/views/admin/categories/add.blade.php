@extends('admin.layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-piggy-bank"></i>
                Categories
                <small>Add</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back', ['url' => 'admin/categories'])
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/categories/add','id' => 'categories_form', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                {!! Form::label('Tên thú cưng') !!}
                                {!! Form::select('pet_id', ['' => 'chọn thú cưng'] + $pets, '', ['class' => 'form-control width-400']) !!}
                            </div>
                            @if ($errors->has('pet_id'))
                                <p class="help is-danger">{{ $errors->first('pet_id') }}</p>
                            @endif
                            <div class="form-group">
                                {!! Form::label('Tên danh mục') !!}
                                {!! Form::text('category_name', '', [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập tên danh mục'
                                ]) !!}
                                @if ($errors->has('category_name'))
                                    <p class="help is-danger">{{ $errors->first('category_name') }}</p>
                                @endif
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