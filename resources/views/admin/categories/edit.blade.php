@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-book"></i>
                Categories
                <small>Edit</small>
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
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/categories/edit/'.$category->id, 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                {!! Form::label('Tên thú cưng') !!}
                                {!! Form::select('pet_id', ['' => 'Chọn thú cưng'] + $pets, $category->pets->id, ['class' => 'form-control width-400']) !!}
                            </div>
                            @if ($errors->has('pet_id'))
                                <p class="help is-danger">{{ $errors->first('pet_id') }}</p>
                            @endif
                            <div class="form-group">
                                {!! Form::label('Tên danh mục') !!}
                                {!! Form::text('category_name', $category->category_name, [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập tên danh mục',
                                'minlength' => '3',
                                'maxlength' => '100'
                                ]) !!}
                            </div>
                            @if ($errors->has('category_name'))
                                <p class="help is-danger">{{ $errors->first('category_name') }}</p>
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