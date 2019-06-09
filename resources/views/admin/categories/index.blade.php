@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <i class="glyphicon glyphicon-book"></i>
                Categories
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="admin/categories/index"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="active"></i>Categories</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['class' => 'search-form',
                                            'method' => 'GET', 'url' => 'admin/categories',
                                            'accept-charset' => 'utf-8',
                                            'novalidate' => 'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    {!! Form::label('category_id', 'ID') !!}
                                    {!! Form::number('id', '', ['class' => 'form-control', 'min' => 1]) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('Tên danh mục') !!}
                                    {!! Form::text('category_name', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2 margin-top-15">
                                    {!! Form::label('Thú cưng') !!}
                                    {!! Form::select('pet_id', ['' => '---------------'] + $pets, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            @include('admin.elements.button.search')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom">
                @include('admin.elements.button.add', ['url' => 'admin/categories'])
            </div>
            @if($categories->isEmpty())
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
                                        <th>Tên danh mục</th>
                                        <th>Thú cưng</th>
                                        <th>Ngày tạo</th>
                                        <th>Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td>{{$category->pets->pet_name}}</td>
                                            <td>{{$category->created_at}}</td>
                                            <td width="150">
                                                @include('admin.elements.button.view', ['url' => 'admin/categories/', 'id' => $category->id])
                                                @include('admin.elements.button.edit', ['url' => 'admin/categories/', 'id' => $category->id])
                                                @include('admin.elements.button.delete', ['url' => 'admin/categories/', 'id' => $category->id])
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