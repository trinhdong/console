<div class="form-group">
    {!! Form::label('Danh mục sản phẩm') !!}
    {!! Form::select('category_id', ['' => 'Chọn danh mục'] + $categories, '', ['class' => 'form-control width-400', 'id' => 'categories']) !!}
</div>
@if ($errors->has('category_id'))
    <p class="help is-danger">{{ $errors->first('category_id') }}</p>
@endif
<div class="form-group">
    {!! Form::label('Loại sản phẩm') !!}
    {!! Form::select('type_id', ['' => 'Chọn loại sản phẩm'] + $productTypes, '', ['class' => 'form-control width-400', 'id' => 'product_types']) !!}
</div>
@if ($errors->has('type_id'))
    <p class="help is-danger">{{ $errors->first('type_id') }}</p>
@endif
<div class="form-group">
    {!! Form::label('Tên sản phẩm') !!}
    {!! Form::text('product_name', '', [
    'class' => 'form-control width-400',
    'placeholder' => 'Nhập tên sản phẩm',
    'minlength' => '3',
    'maxlength' => '100'
    ]) !!}
</div>
@if ($errors->has('product_name'))
    <p class="help is-danger">{{ $errors->first('product_name') }}</p>
@endif
<div class="form-group">
    {!! Form::label('Hình sản phẩm') !!}
    {!! Form::file('image', ); !!}
</div>
<div class="form-group">
    {!! Form::label('Số lượng') !!}
    {!! Form::text('quantity', '', [
    'class' => 'form-control width-400',
    'placeholder' => 'Nhập số lượng'
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('Giá') !!}
    {!! Form::text('price', '', [
    'class' => 'form-control width-400',
    'placeholder' => 'Nhập giá tiền'
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('Giá khuyến mãi') !!}
    {!! Form::text('promotion_price', '', [
    'class' => 'form-control width-400',
    'placeholder' => 'Nhập giá tiền khuyến mãi'
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('Mô tả sản phẩm') !!}
    {!! Form::textarea('description', '', [
    'class' => 'form-control width-400',
    'minlength' => '50',
    'maxlength' => '500'
    ]) !!}
</div>

@include('admin.elements.button.save_add')