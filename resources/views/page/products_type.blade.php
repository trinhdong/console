@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('home')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($product_type as $pt)
							<li><a href="{{route('productsbytype',[$category_id,$pt->id])}}">{{$pt->type_name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Tất cả sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($rand_products)}} sản phẩm</p></p>
								<div class="clearfix"></div>
							</div>
						</div>
							<div class="row">
								@foreach($rand_products as $new)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('productdetails', $new->id)}}"><img src="../source/assets/dest/images/products/{{$new->image}}" width="250px" height="250px" alt=""></a>
										</div>
										<br>	
										<div class="single-item-body">
											<p style="word-wrap: break-word;" class="single-item-title">{{$new->product_name}}</p>
											<p class="single-item-price">
												<span>{{number_format ($new->price)}} ₫</span>
											</p>
										</div>
										<br>	
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('productdetails', $new->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								</div>
								{!!$rand_products->links()!!}
							</div>
						</div>
					</div>
				</div>
			</div>

						

						
	@endsection