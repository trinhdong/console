@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chi Tiết Sản Phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('home')}}">Home</a> / <span>Sản Phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-4">
							<img src="../source/assets/dest/images/products/{{$products_details->image}}" width="300px" height="350px" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$products_details->product_name}}</p>
								<p class="single-item-price">
									@if($products_details->promotion_price==0)
									<span>{{number_format($products_details->price)}} ₫</span>
									@else
									<span class="flash-del">{{number_format($products_details->price)}} ₫</span>
									<span class="flash-sale">{{number_format($products_details->promotion_price)}} ₫</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{!!$products_details->description!!}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>Số Lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản Phẩm Tương Tự </h4>
						<p class="pull-left">Tìm thấy {{count($sptt)}} sản phẩm</p>
						<div class="row">
							@foreach($sptt as $tt)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{route('productdetails', $tt->id)}}"><img src="../source/assets/dest/images/products/{{$tt->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$tt->product_name}}</p>
										<p class="single-item-price">
											@if($tt->promotion_price==0)
									<span>{{number_format($tt->price)}} ₫</span>
									@else
									<span class="flash-del">{{number_format($tt->price)}} ₫</span>
									<span class="flash-sale">{{number_format($tt->promotion_price)}} ₫</span>
									@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('productdetails', $tt->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
					{{-- phân trang --}}
								{!!$new_products->links()!!}
				</div>
				<div class="space50">&nbsp;</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Pet Shop</h3>
						<div class="widget-body">
							@foreach($rand_products as $rd)
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('productdetails', $rd->id)}}"><img src="../source/assets/dest/images/products/{{$rd->image}}" alt=""></a>
									<div class="media-body">
										<div>
											{{$rd->product_name}}
										</div>
										<span class="beta-sales-price">{{number_format($rd->price)}} ₫</span>
									</div>
								</div>
							</div>
							@endforeach	
							</div>
						</div>
					</div>
					 <!-- best sellers widget -->
					 <div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new_products as $new)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('productdetails', $rd->id)}}"><img src="../source/assets/dest/images/products/{{$new->image}}" alt=""></a>
									<div class="media-body">
										<div>{{$new->product_name}}</div>
										<span class="beta-sales-price">{{number_format($new->price)}} ₫</span>
									</div>
								</div>
								@endforeach
								</div>
							</div>
						</div>
					</div> 
				</div>	<!-- best sellers widget -->	
		</div> <!-- #content -->
	</div>
	@endsection