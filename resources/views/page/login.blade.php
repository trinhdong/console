@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
		
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
				<div class="row">
					<div class="col-sm-3"></div>

					@if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif

					<div class="col-sm-6">
						<i class="fa fa-unlock" aria-hidden="true" style="font-size:24px">   ĐĂNG NHẬP</i>
						<div class="space20">&nbsp;</div>
					@if(count($errors)>0)
                       <div class="alert alert-danger">        
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
						<div class="form-group">
						    <label for="email">Email address:</label>
						    <input type="email" class="form-control" name="email" id="email" placeholder="Mời bạn nhập email...">
						  </div>
						  <div class="form-group">
						    <label for="pwd">Mật khẩu:</label>
						    <input type="password" class="form-control" name="password" id="pwd" placeholder="Mời bạn nhập password...">
						  </div>
 							 <button type="submit" class="btn btn-primary">ĐĂNG NHẬP</button>
 							  <a style="float: right;" class="text-darkyellow" href="#"><small>Quên mật khẩu?</small></a>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection