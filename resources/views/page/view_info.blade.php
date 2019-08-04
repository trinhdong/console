@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="/">Home</a> / <span>Thông Tin Khách Hàng</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">

		<form action="{{url('viewinfo', [$users->id])}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h4>THÔNG TIN KHÁCH HÀNG</h4>
					@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}<br>
						@endforeach
					</div>
					@endif
					@if(Session::has('success'))
					<div class="alert alert-success">
						{{Session::get('success')}}
					</div>
					@endif
					<div class="space20">&nbsp;</div>


					<div class="form-group">
						<label for="name">Họ và Tên</label>
						<input type="text" class="form-control" name="name" id="name" value="{{$users->name}}">
					</div>
					<div class="form-group">
						<label for="email">Địa chỉ email*</label>
						<input type="email" class="form-control" name="email" id="email" value="{{$users->email}}" readonly="">
					</div>
					<div class="form-group">
						<label for="sex">Giới tính</label>
						<input style="margin-left: 50px"; placeholder="" name="gender" type="radio" value="0"
						@if($users->sex==0) {{"checked"}} 
						@endif >Nam
						<input style="margin-left: 50px"; placeholder="" name="gender" type="radio" value="1"  
						@if($users->sex==1) {{"checked"}} 
						@endif >Nữ
					</div>
					<div class="form-group">
						<label for="address">Địa chỉ*</label>
						<input type="text" class="form-control" name="address" id="address" value="{{$users->address}}">
					</div>


					<div class="form-group">
						<label for="phone">Số điện thoại*</label>
						<input type="text" class="form-control" name="phone"  id="phone" value="{{$users->phone}}">
					</div>
					<div class="form-group">
						
						<label for="password"><input type="checkbox" name="changePassword" id="changePassword">Đổi mật khẩu*</label>
						<input type="password" class="form-control password" name="password"  disabled="" value="password">
					</div>
					<div class="form-group">
						<label for="password">Nhập lại mật khẩu*</label>
						<input type="password" class="form-control password" id="password_same" name="password_same" disabled="">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">CẬP NHẬT</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div>
</div>
@endsection
@section('script') 
<script>
	$(document).ready(function(){
		$("#changePassword").change(function(){
			if($(this).is(":checked"))
			{
				alert("Bạn có muốn đổi mật khẩu");
				 $(".password").removeAttr('disabled');
			}
			else
			{
				$(".password").attr('disabled', '');
			}
		});
	});
</script>
@endsection