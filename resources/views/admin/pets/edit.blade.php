@extends('admin.layouts.index')

@section('content')

    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                <i class="glyphicon glyphicon-piggy-bank"></i>
                Thú cưng
                <small>Edit</small>
            </h1>
            <ol class="breadcrumb">
                @include('admin.elements.button.back', ['url' => 'admin/pets'])
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/pets/edit/'.$pet->id,'id' => 'pet_form', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                {!! Form::label('Tên thú cưng') !!}
                                {!! Form::text('pet_name', $pet->pet_name, [
                                'class' => 'form-control width-400',
                                'placeholder' => 'Nhập tên thú cưng'
                                ]) !!}
                                @if ($errors->has('pet_name'))
                                    <p class="help is-danger">{{ $errors->first('pet_name') }}</p>
                                @endif
                            </div>
                            @include('admin.elements.button.save_edit')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@include('admin.elements.script.error')