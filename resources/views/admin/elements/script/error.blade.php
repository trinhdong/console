@section('script')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>toastr.error("{{ $error }}");</script>
        @endforeach
    @endif
@endsection