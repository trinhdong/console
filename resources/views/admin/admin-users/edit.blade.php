@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-user"></i>
                Quản trị viên
                <small>Edit</small>
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
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/admin-users/edit/'.$adminUser->id,'id' => 'users_form', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                {!! Form::label('Tên') !!}
                                {!! Form::text('name', $adminUser->name, [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập tên'
                                ]) !!}
                                @if ($errors->has('name'))
                                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('Email') !!}
                                {!! Form::email('email', $adminUser->email, [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập email',
                                ]) !!}
                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mật khẩu hiện tại') !!}
                                {!! Form::password('password', [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập mật khẩu hiện tại',
                                'id' => 'password'
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
                            <div class="form-group">
                                {!! Form::label('Mật khẩu mới') !!}
                                {!! Form::password('password_new', [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập mật khẩu mới',
                                ]) !!}
                                @if ($errors->has('password_new'))
                                    <p class="help is-danger">{{ $errors->first('password_new') }}</p>
                                @endif
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
@section('validate')
    <script>
        $(document).ready(function () {

            $("#users_form").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 20
                    },
                    email: {
                        required: true,
                        email: true,
                        minlength: 3,
                        maxlength: 30
                    },
                    password: {
                        required: true,
                        minlength: 2,
                    },
                    password_again: {
                        required: true,
                        minlength: 2,
                        equalTo: "#password",
                    },
                    password_new: {
                        required: true,
                        minlength: 2
                    }
                },
                messages: {
                    name: {
                        required: 'Vui lòng nhập tên!',
                        minlength: 'Tên không được nhỏ hơn 3 ký tự',
                        maxlength: 'Tên không được lớn hơn 20 ký tự',
                    },
                    email: {
                        required: 'Vui lòng nhập email!',
                        minlength: 'Tên không được nhỏ hơn 3 ký tự',
                        maxlength: 'Tên không được lớn hơn 20 ký tự',
                    },
                    password: {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: "Vui lòng nhập ít nhất 2 ký tự"
                    },
                    password_again: {
                        required: "Vui lòng xác nhận mật khẩu",
                        minlength: "Vui lòng nhập ít nhất 2 ký tự",
                        equalTo: 'Mật khẩu không trùng'
                    },
                    password_new: {
                        required: "Vui lòng nhập mật khẩu mới",
                        minlength: "Vui lòng nhập ít nhất 2 ký tự"
                    }
                }
            });
        });
    </script>
@endsection
