<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | PetShop</title>
    <base href="{{asset('')}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/css/_all-skins.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('dist/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" >
    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.layouts.header')
    @yield('content')
    @include('admin.layouts.footer')

</div>
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/jquery.dataTables.min.js"></script>
<script src="dist/js/dataTables.bootstrap.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/toastr/toastr.min.js"></script>
<script src="dist/js/jquery.validate.min.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor1",
        {
            height: 500
        });
</script>
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
        $(function () {
            $('#example1').DataTable()
        });
        @if(Session::has('message'))
        $(function () {
            var type = "{{ Session::get('alert-type', 'info') }}";

            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        })
        @endif
    })
</script>

@yield('script')
@yield('ajax')
@yield('validate')
@yield('script_order')

</body>
</html>
