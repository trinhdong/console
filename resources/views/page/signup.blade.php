@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangki')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>ĐĂNG KÍ</h4>
					@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}<br>
						@endforeach
					</div>
					@endif
					@if(Session::has('thanhcong'))
					<div class="alert alert-success">
						{{Session::get('thanhcong')}}
					</div>
					@endif
						<div class="space20">&nbsp;</div>

						
						<div class="form-group">
							<label for="email">Email address*</label>
							<input type="email" class="form-control" name="email" id="email">
						</div>

						<div class="form-group">
							<label for="fullname">Họ và Tên</label>
							<input type="fullname" class="form-control" name="fullname" id="fullname">
						</div>
						<div class="form-group">
							<label for="sex">Giới tính</label>

                             <input style="margin-left: 50px"; placeholder="" name="sex" type="radio" value="Nam" checked="">Nam
                            <input style="margin-left: 50px"; placeholder="" name="sex" type="radio" value="Nữ">Nữ
                                    </div>
						<div class="form-group">
							<label for="adress">Địa chỉ*</label>
							<input type="text" class="form-control" name="adress" id="adress">
						</div>


						<div class="form-group">
							<label for="phone">Phone*</label>
							<input type="phone" class="form-control" name="phone"  id="phone">
						</div>
						<div class="form-group">
							<label for="phone">Password*</label>
							<input type="password" class="form-control" name="password" id="pwd">
						</div>
						<div class="form-group">
							<label for="phone">Re password*</label>
							<input type="password" class="form-control" name="password2" id="pwd2">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">ĐĂNG KÍ</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection