@extends('layout.master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
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
						<!--Menu phải-->
						<ul class="aside-menu">
							@foreach($loaisp as $item)
							<li><a href="product-type/{{$item->id}}">{{$item->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							{{-- Thông tin loại --}}
							<h4>Loại: {{$type->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($type->products)}} sản phẩm được tìm thấy</p>
								<div class="clearfix"></div>
							</div>

							{{-- Danh sách sản phẩm của loại này --}}
							<div class="row">	
								@foreach($productsByType as $item)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product-detail/{{$item->id}}"><img src="source/image/product/{{$item->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$item->name}}</p>
											<p class="single-item-price">
												<span>{{$item->unit_price}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<span class="add-to-cart pull-left" data-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i></span>
											<a class="beta-btn primary" href="product-detail/{{$item->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> 
						{{-- Thanh pagination --}}
						<div class="thanh-phan-trang">
							{!! $productsByType->links() !!}
						</div>
					</div>
				</div>


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> 
@endsection