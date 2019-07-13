<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 180 Cao Lỗ, Phường 4, Quận 8, Tp.Hồ Chí Minh</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0901 316 300</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
							<li><a href=""><span style="font-size: 15px" class="badge badge-light">Chào bạn {{Auth::User()->name}}</span></a></li>
							<li><a href="{{route('dangxuat')}}">Đăng xuất</a></li>
						@else
						<li><a href="{{route('dangki')}}">Đăng kí</a></li>
						<li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="../source/assets/dest/images/logo-pet.jpg" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<!-- <div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Bạn muốn tìm gì cho bé hôm nay?"/>
					    						<div id="countryList"><br>
					    						</div>
						</form>
					</div> -->
				<div class="row"> 
  					<div class="col-md-6"> 
  				 <div class="search-box"> 
   					 <form class="search-form" action="{{route('search')}}"> 
   					 	<input class="form-control" name="product_name" id="product_name" placeholder="Tìm kiếm sản phẩm" type="text"> 
     				<button class="btn btn-link search-btn"> <i class="glyphicon glyphicon-search"></i> 
     				</button> 
    				</form> 
   				</div> 
  			</div> 
					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (Trống) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="../source/assets/dest/images/products/cart/1.png" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">Sample Woman Top</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">1*<span>$49.50</span></span>
										</div>
									</div>
								</div>

								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="../source/assets/dest/images/products/cart/2.png" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">Sample Woman Top</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">1*<span>$49.50</span></span>
										</div>
									</div>
								</div>

								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="../source/assets/dest/images/products/cart/3.png" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">Sample Woman Top</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">1*<span>$49.50</span></span>
										</div>
									</div>
								</div>

								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">$34.55</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="checkout.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('home')}}">Trang chủ</a></li>
						<li><a href="#">Mua Hàng Online</a>
							<ul class="sub-menu">
								@foreach($category_name as $category_names)
								<li><a href="{{route('producttype',$category_names->id )}}">{{$category_names->category_name}} </a></li>
								@endforeach
							</ul>
						</li>
						<li><a  href="#">Giới thiệu</a></li>
						<li><a  href="#">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
	@section('search_ajax')
    <script>
  $(document).ready(function(){

   $('#product_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
    var query = $(this).val(); //lấy gía trị ng dùng gõ
    if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
    {
     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
     $.ajax({
      url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"POST", // phương thức gửi dữ liệu.
      data:{query:query, _token:_token},
      success:function(data){ //dữ liệu nhận về
       $('#countryList').fadeIn();  
       $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
     }
   });
   }
 });

   $(document).on('click', 'li', function(){  
    $('#product_name').val($(this).text());  
    $('#countryList').fadeOut();  
  });  

 });
</script>
@endsection