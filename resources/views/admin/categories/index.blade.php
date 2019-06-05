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
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <form method="get" accept-charset="utf-8" novalidate="novalidate"
                                  class="search-form border"
                                  action="">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-2">
                                        <label for="">ID</label>
                                        <input type="number" name="id" min="1" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="description-name">Danh mục</label>
                                        <input type="text" class="form-control">
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
            @if($categories === null)
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
                                    <th>Ngày tạo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$category->created_at}}</td>
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