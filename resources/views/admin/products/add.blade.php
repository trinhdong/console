@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-th"></i>
                Sản Phẩm
                <small>Add</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back', ['url' => 'admin/products'])
            </ol>
        </section>

        <section class="content">	
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/products/add?step=' . ($step + 1), 'enctype' => 'multipart/form-data']) !!}
                            @include('admin.elements.form.form_step' . $step)
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@include('admin.elements.script.error')
@section('ajax')
    <script>
        $(document).ready(function () {
            $("#categories").change(function () {
                $.get("admin/ajax/product-types/" + $(this).val(), function (data) {
                    $("#product_types").html(data);
                })
            });
        });
    </script>
@endsection