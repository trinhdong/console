@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-comment"></i>
                Bình luận
                <small>View</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back', ['url' => 'admin/comments'])
            </ol>
        </section>

        <section class="content">
            <div class="row col-xs-12">
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('ID') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$comment->id}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Tên sản phẩm') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$comment->products->product_name}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Tiêu đề') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$comment->title}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Nội dung') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$comment->content}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Ngày tạo') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$comment->created_at}}</p>
                    </div>
                </div>
                <div class="box box-body">
                    <div class="col-md-3">
                        {!! Form::label('Ngày cập nhật') !!}
                    </div>
                    <div class="col-md-9">
                        <p>{{$comment->updated_at}}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection