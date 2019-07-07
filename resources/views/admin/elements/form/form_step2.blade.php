@if (isset($_GET['pet_id']))
    {!! Form::hidden('pet_id', $_GET['pet_id']) !!}
@endif
<div class="form-group">
    {!! Form::label('Danh mục sản phẩm') !!}
    {!! Form::select('category_id', ['' => 'Chọn danh mục'] + $categories, '', ['class' => 'form-control width-400', 'id' => 'categories']) !!}
</div>
@if ($errors->has('category_id'))
    <p class="help is-danger">{{ $errors->first('category_id') }}</p>
@endif
<div class="form-group">
    {!! Form::label('Loại sản phẩm') !!}
    {!! Form::select('product_type_id', ['' => 'Chọn loại sản phẩm'] + $productTypes, '', ['class' => 'form-control width-400', 'id' => 'product_types']) !!}
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
    {!! Form::file('image'); !!}
</div>
@if ($errors->has('image'))
    <p class="help is-danger">{{ $errors->first('image') }}</p>
@endif
<div class="form-group">
    {!! Form::label('Mô tả sản phẩm') !!}
    {!! Form::textarea('description', '', [
    'id' => 'editor1',
    'rows' => "10",
    'cols' => "80"
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('Số lượng') !!}
    {!! Form::text('quantity', '', [
    'class' => 'form-control width-400',
    'placeholder' => 'Nhập số lượng'
    ]) !!}
</div>
@if ($errors->has('quantity'))
    <p class="help is-danger">{{ $errors->first('quantity') }}</p>
@endif
<div class="form-group">
    {!! Form::label('Giá') !!}
    {!! Form::text('price', '', [
    'class' => 'form-control width-400',
    'placeholder' => 'Nhập giá tiền'
    ]) !!}
</div>
@if ($errors->has('price'))
    <p class="help is-danger">{{ $errors->first('price') }}</p>
@endif
<div class="form-group">
    {!! Form::label('Giá khuyến mãi') !!}
    {!! Form::text('promotion_price', '', [
    'class' => 'form-control width-400',
    'placeholder' => 'Nhập giá tiền khuyến mãi'
    ]) !!}
</div>

@include('admin.elements.button.save_add')