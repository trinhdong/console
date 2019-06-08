@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <i class="glyphicon glyphicon-book"></i>
                Thú cưng
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="active"></i>Thú cưng</li>
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
                            <form method="get" accept-charset="utf-8" novalidate="novalidate"
                                  class="search-form border"
                                  action="/admin/pets/">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-2">
                                        {!! Form::label('ID') !!}
                                        {!! Form::number('id', '', ['class' => 'form-control', 'min' => 1]) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::label('Tên thú cưng') !!}
                                        {!! Form::text('pet_name', '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                @include('admin.elements.button.search')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom">
                @include('admin.elements.button.add')
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
                                    <th>Tên Thú cưng</th>
                                    <th>Ngày tạo</th>
                                    <th>Tác vụ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pets as $pet)
                                    <tr>
                                        <td>{{$pet->id}}</td>
                                        <td>{{$pet->pet_name}}</td>
                                        <td>{{$pet->created_at}}</td>
                                        <td width="250">
                                            @include('admin.elements.button.delete', ['id' => $pet->id])
                                            @include('admin.elements.button.edit', ['id' => $pet->id])
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