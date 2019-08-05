@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên hệ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="/">Home</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.955107491798!2d106.67572221428671!3d10.737943462840267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad0158a09f%3A0xfd0a6159277a3508!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1562857973875!5m2!1svi!2s" width="350" height="260" frameborder="0" style="border:0" allowfullscreen></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Liên hệ</h2>
					<div class="space20">&nbsp;</div>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Họ và tên của bạn">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Nhập địa chỉ email của bạn">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Viết bình luận"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi liên hệ<i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						180 Cao Lỗ,<br>
						Phường 4, Quận 8<br>
						Thành Phố Hồ Chí Minh
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

	@endsection