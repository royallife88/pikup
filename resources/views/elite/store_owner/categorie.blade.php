<!DOCTYPE HTML>
<html>
@include('elite.store_owner.header')

<body>
	<!--heder end here-->
	<!-- script-for sticky-nav -->
	<script>
		$(document).ready(function() {
            var navoffeset = $(".header-main").offset().top;
            $(window).scroll(function() {
                var scrollpos = $(window).scrollTop();
                if (scrollpos >= navoffeset) {
                    $(".header-main").addClass("fixed");
                } else {
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
			<div class="col-md-3 product-grid">
				<div class="product-items">
					<div class="project-eff">
						<div id="nivo-lightbox-demo">
							<p> <a href="{{url('/admin/product/'.$product->categorie_name)}}"><span class="rollover1">
									</span> </a></p>
						</div>
						<img class="img-responsive" style="max-height: 126px;min-width:100%" src="{{asset('/')}}{{$product->image}}" alt="">
					</div>
					<div class="produ-cost">
						<h4>{{ucfirst($product->categorie_name)}}</h4>
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