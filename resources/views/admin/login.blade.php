<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="{{asset('')}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/css/_all-skins.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('iCheck/blue.css') }}" rel="stylesheet" type="text/css" >
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>Pet-Shop</a>
    </div>
    <div class="login-box-body">
        <h2 class="login-box-msg">Đăng nhập</h2>

        {!! Form::open(['method' => 'POST', 'url' => 'admin/login', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group has-feedback">
            {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        @if ($errors->has('email'))
            <p class="help is-danger">{{ $errors->first('email') }}</p>
        @endif
        <div class="form-group has-feedback">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        @if ($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
        @endif
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="iCheck/icheck.min.js"></script>
<script src="dist/toastr/toastr.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
@include('admin.elements.script.error')
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "500",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>
<script>
    $(document).ready(function () {
        @if(Session::has('message'))
        $(function () {
            let type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        });
        @endif
    })
</script>
</body>
</html>
