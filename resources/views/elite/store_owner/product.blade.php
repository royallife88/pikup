<!DOCTYPE HTML>
<html>
@include('elite.store_owner.header')
@if(Session::has('product_deleted'))
<div class="alert alert-danger alert-dismissable" style="text-align:center;margin-bottom:0px;">
	<a class="panel-close close" data-dismiss="alert">×</a>
	<i class="fa fa-check"></i>
	{{Session::get('product_deleted')}}
</div>
@endif

<body>
	<!--inner block start here-->
	<div class="col-md-12">
		<div class="inner-block">
			<div class="product-block">
				<div class="pro-head">
					<h2>Products</h2>
				</div>
				@foreach($data as $product)
				<div class="col-md-3 product-grid" style="width:auto; margin-top: 15px;">
					<div class="product-items">
						<div class="project-eff profile-pic">
							<div id="nivo-lightbox-demo">
								<p> <a href="{{route('store_owner.edit', $product->p_id)}}"
										data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span
											class="rollover1"> </span> </a></p>
							</div>
							<img style="min-height: 270px; max-height: 270px;" class="img-responsive"
								src="{{asset($product->featured_image)}}" alt="">
							<div class="edit"><a href="{{route('store_owner.delete', $product->p_id)}}"><i
										style="color:red"
										onclick="return confirm('Do you want to delete this product!');"
										class="fa fa-trash fa-lg"></i></a></div>
						</div>
					</div>
					<div class="produ-cost">
						<h4>{{$product->title}}</h4>
						<h5>{{$product->price}} $</h5>
						@if($product->status == '0') <h5 style="text-align:right;background:Navyblue"><span
								class="badge badge-pill badge-primary">Pending</span></h5>@endif
						@if($product->status == '1') <h5 style="text-align:right;background:Navyblue"><span
								class="badge badge-pill badge-primary">Approved</span></h5>@endif
						@if($product->status == '2') <h5 style="text-align:right;background:Navyblue"><span
								class="badge badge-pill badge-primary">Rejected</span></h5>@endif
					</div>
				</div>
				@endforeach
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
	<!--inner block end here-->
	@include('elite.store_owner.footer')

</body>

</html>