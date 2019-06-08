@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-book"></i>
                Categories
                <small>Add</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back')
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/categories/add', 'enctype' => 'multipart/form-data']) !!}
                                <div class="form-group">
                                    {!! Form::label('Tên danh mục') !!}
                                    {!! Form::text('category_name', '', [
                                    'class' => 'form-control width-400',
                                    'placeholder' => 'Nhập tên danh mục',
                                    'minlength' => '3',
                                    'maxlength' => '100'
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