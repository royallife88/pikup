<!DOCTYPE HTML>
<html>
@include('elite.admin.header')
@if(Session::has('product_deleted'))
<div class="alert alert-danger alert-dismissable" style="text-align:center;margin-bottom:0px;">
	<a class="panel-close close" data-dismiss="alert">×</a>
	<i class="fa fa-check"></i>
	{{Session::get('product_deleted')}}
</div>
@endif
<body>
	<!--heder end here-->
	<!-- script-for sticky-nav -->
	<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
	</script>
	<!-- /script-for sticky-nav -->
	<!--inner block start here-->
	<div class="inner-block">
		<div class="product-block">
			<div class="pro-head">
				<h2>Products</h2>
			</div>
			@foreach($data as $product)
			<div class="col-md-3 product-grid" style="width:auto">
				<div class="product-items">
					<div class="project-eff profile-pic">
						<div id="nivo-lightbox-demo">
							<p> <a href="{{route('admin.service_edit',$product->service_id)}}"
									data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1">
									</span> </a></p>
						</div>
						<img style="min-height: 270px; max-height: 270px;" class="img-responsive"
							src="{{asset($product->featured_image)}}" alt="">
						<div class="edit"> <a href="{{url('admin/delete/'.$product->service_id)}}"><i
									onclick="return confirm('Do you want to delete this product!');" style="color:red"
									class="fa fa-trash fa-lg"></i></a></div>
					</div>
				</div>
				<div class="produ-cost">
					<h4>{{$product->service_name}}</h4>
					<h5>{{$product->service_charges}} $</h5>
					@if($product->service_approve_status == '0') <h5 style="text-align:right;background:Navyblue"><span
							class="badge badge-pill badge-primary">Pending</span></h5>@endif
					@if($product->service_approve_status == '1') <h5 style="text-align:right;background:Navyblue"><span
							class="badge badge-pill badge-primary">Approved</span></h5>@endif
					@if($product->service_approve_status == '2') <h5 style="text-align:right;background:Navyblue"><span
							class="badge badge-pill badge-primary">Rejected</span></h5>@endif

				</div>
			</div>
		</div>
		@endforeach
		<div class="clearfix"> </div>
	</div>
	</div>
	<!--inner block end here-->
	@include('elite.admin.footer')

</body>

</html>