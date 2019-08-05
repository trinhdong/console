@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <i class="glyphicon glyphicon-comment"></i>
                Bình luận
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="active"></i>Bình luận</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['class' => 'search-form',
                                            'method' => 'GET', 'url' => 'admin/comments',
                                            'accept-charset' => 'utf-8',
                                            'novalidate' => 'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {!! Form::label('comment_id', 'ID') !!}
                                    {!! Form::number('id', '', ['class' => 'form-control', 'min' => 1]) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('Tiêu đề') !!}
                                    {!! Form::text('title', '', ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('Tên sản phẩm') !!}
                                    {!! Form::text('product_id', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            @include('admin.elements.button.search')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            @if($comments->isEmpty())
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <p>Không có dữ liệu</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>

                                        <th>Tiêu đề</th>
                                        <th>Sản phẩm</th>
                                        <th>Nội dung</th>
                                        <th>Sản phẩm</th>
                                        <th>Nội dung</th>

                                        <th>Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>

                                            <td>{{$comment->title}}</td>
                                            <td>{{$comment->products->product_name}}</td>
                                            <td>{{$comment->content}}</td>
                                            <td>{{$comment->created_at}}</td>
                                            <td>{{$comment->products->product_name}}</td>
                                            <td>{{$comment->content}}</td>
                                            <td width="150">
                                                @include('admin.elements.button.view', ['url' => 'admin/comments/', 'id' => $comment->id])
                                                @include('admin.elements.button.delete', ['url' => 'admin/comments/', 'id' => $comment->id])
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </div>

@endsection