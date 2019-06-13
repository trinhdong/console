{{Html::link($url.'delete/'.$id, 'Xóa', ['class' => 'btn_delete btn btn-danger btn-sm', 'method' => 'get'])}}
@section('script')
    <script>
        $(document).ready(function () {
            $('.btn_delete').on('click', function () {
                return confirm('Bạn có chắc muốn xóa?');
            });
        })
    </script>
@endsection