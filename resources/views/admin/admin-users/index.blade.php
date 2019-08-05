@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <i class="glyphicon glyphicon-user"></i>
                Quản trị viên
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="active"></i>Quản trị viên</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['class' => 'search-form border',
                                            'method' => 'GET', 'url' => 'admin/admin-users',
                                            'accept-charset' => 'utf-8',
                                            'novalidate' => 'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    {!! Form::label('user_id', 'ID') !!}
                                    {!! Form::number('id', '', ['class' => 'form-control', 'min' => 1]) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('Tên') !!}
                                    {!! Form::text('name', '', ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('Email') !!}
                                    {!! Form::email('email', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            @include('admin.elements.button.search')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom">
                @include('admin.elements.button.add', ['url' => 'admin/admin-users'])
            </div>
            @if($adminUsers->isEmpty())
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
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adminUsers as $adminUser)
                                        <tr>
                                            <td>{{$adminUser->id}}</td>
                                            <td>{{$adminUser->name}}</td>
                                            <td>{{$adminUser->email}}</td>
                                            <td width="150">
                                                @include('admin.elements.button.view', ['url' => 'admin/admin-users/', 'id' => $adminUser->id])
                                                @include('admin.elements.button.edit', ['url' => 'admin/admin-users/', 'id' => $adminUser->id])
                                                @include('admin.elements.button.delete', ['url' => 'admin/admin-users/', 'id' => $adminUser->id])
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