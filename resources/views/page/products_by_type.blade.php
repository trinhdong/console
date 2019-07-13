@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title"></h6>
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
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($product_type as $pt)
							<li><a href="{{route('productsbytype',[$category_id,$pt->id])}}">
								{{$pt->type_name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$products_type->type_name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product_by_type)}} sản phẩm</p></p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row">
								@foreach($product_by_type as $pbt)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('productdetails', $pbt->id)}}"><img src="../source/assets/dest/images/products/{{$pbt->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pbt->product_name}}</p>
											<p class="single-item-price">
												<span>{{number_format ($pbt->price)}} ₫</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('productdetails', $pbt->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							{!!$product_by_type->links()!!}
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

	@endsection