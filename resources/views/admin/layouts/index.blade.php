<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <base href="{{asset('')}}" target="_blank, _self, _parent, _top">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="dist/toastr/toastr.min.css">
    <link rel="stylesheet" href="dist/toastr/toastr.min.map">
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
<script src="dist/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="dist/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/toastr/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        $(function () {
            $('#example1').DataTable()
        });

        @if(Session::has('message'))
        $(function () {
            var type = "{{ Session::get('alert-type', 'info') }}";
            toastr.options = {
                positionClass: 'toast-top-center'
            };
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
        });
        @endif
    })
</script>

@yield('script')
</body>
</html>
