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
	<div class="inner-block">
		<div class="product-block">
			<div class="pro-head">
				<h2>All Stores</h2>
			</div>
			@foreach($all_store as $data)
			<div class="col-md-3 product-grid" style="width:auto">
				<div class="product-items">
					<div class="project-eff profile-pic">
						<div id="nivo-lightbox-demo">
							<p> <a href="{{route('store_owner.store', $data->store_id)}}"
									data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1">
									</span> </a></p>
						</div>
						<img style="min-height: 270px; max-height: 270px;" class="img-responsive" src="{{asset($data->store_profile_image)}}" alt="">
						<div class="edit"> <a href="{{route('store_owner.delete_store', $data->store_id)}}"><i
									onclick="return confirm('Do you want to delete this Store!');"
									class="fa fa-trash fa-lg"></i></a></div>
					</div>
				</div>
				<div class="produ-cost">
					<h4>{{$data->store_name}}</h4>
					@if($data->status == '0') <h5 style="text-align:right;background:Navyblue">Pending...</h5>@endif
					@if($data->status == '1') <h5 style="text-align:right;background:Navyblue">Approved</h5>@endif
					@if($data->status == '2') <h5 style="text-align:right;background:Navyblue">Rejected</h5>@endif

				</div>
			</div>
		</div>
		@endforeach
		<div class="clearfix"> </div>
	</div>
	</div>
	<!--inner block end here-->
	@include('elite.store_owner.footer')

</body>

</html>