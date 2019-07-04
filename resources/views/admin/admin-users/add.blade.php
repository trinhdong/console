@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-user"></i>
                Thú cưng
                <small>Add</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back', ['url' => 'admin/admin-users'])
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/admin-users/add','id' => 'users_form', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                {!! Form::label('Tên') !!}
                                {!! Form::text('name', '', [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập tên',
                                ]) !!}
                                @if ($errors->has('name'))
                                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('Email') !!}
                                {!! Form::email('email', '', [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập email',
                                ]) !!}
                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mật khẩu') !!}
                                {!! Form::password('password', [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập mật khẩu',
                                ]) !!}
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('Xác nhận mật khẩu') !!}
                                {!! Form::password('password_again', [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Xác nhận mật khẩu',
                                ]) !!}
                                @if ($errors->has('password_again'))
                                    <p class="help is-danger">{{ $errors->first('password_again') }}</p>
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