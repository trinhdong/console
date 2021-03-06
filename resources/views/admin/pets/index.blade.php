@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <i class="glyphicon glyphicon-piggy-bank"></i>
                Thú cưng
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="active"></i>Thú cưng</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['class' => 'search-form border',
                                            'method' => 'GET', 'url' => 'admin/pets',
                                            'accept-charset' => 'utf-8',
                                            'novalidate' => 'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    {!! Form::label('id', 'ID') !!}
                                    {!! Form::number('pet_id', '', ['class' => 'form-control', 'min' => 1]) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('Tên thú cưng') !!}
                                    {!! Form::text('pet_name', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            @include('admin.elements.button.search')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom">
                @include('admin.elements.button.add', ['url' => 'admin/pets'])
            </div>
            @if($pets->isEmpty())
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
                                        <th>Thú cưng</th>
                                        <th>Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pets as $pet)
                                        <tr>
                                            <td>{{$pet->id}}</td>
                                            <td>{{$pet->pet_name}}</td>
                                            <td width="150">
                                                @include('admin.elements.button.view', ['url' => 'admin/pets/', 'id' => $pet->id])
                                                @include('admin.elements.button.edit', ['url' => 'admin/pets/', 'id' => $pet->id])
                                                @include('admin.elements.button.delete', ['url' => 'admin/pets/', 'id' => $pet->id])
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