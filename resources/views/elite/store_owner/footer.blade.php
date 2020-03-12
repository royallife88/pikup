<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">


@php $permissions = DB::table('laravelproject_new_users')->select('store_owner', 'service_owner', 'restaurant_owner',
'admin_store_owner_approve')->where('id', Session('user')->id)->first(); @endphp

<!--slider menu-->
<div class="sidebar-menu" style="position: fixed;">
	<div class="logo">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
		<a href="#"> <span id="logo"></span>
			<!--<img id="logo" src="" alt="Logo"/>-->
		</a>
	</div>
	<div class="menu">
		<ul id="menu">
			<li id="menu-home"><a href="{{url('store_owner')}}"><i class="fa fa-cogs"></i><span>Dashboard</span></a>
			</li>
			@if ($permissions->admin_store_owner_approve == 1) @if(Session('user')->store_owner == 1)
			<li><a href="#"><i class="fa fa-list-alt"></i><span>Store Categories</span><span class="fa fa-angle-right"
						style="float: right"></span></a>
				<ul>
					<li><a href="{{route('store_owner.store_categories')}}">All Categories</a></li>
					<li><a href="{{route('store_owner.add_store_categorie')}}">Add New Categorie</a></li>
				</ul>
			</li>

			<li><a href="#"><i class="fa fa-shopping-cart"></i><span>Products</span><span class="fa fa-angle-right"
						style="float: right"></span></a>
				<ul id="menu-academico-sub">
					<li id="menu-academico-avaliacoes"><a href="{{route('store_owner.products')}}">All Products</a></li>
					<li id="menu-academico-boletim"><a href="{{route('store_owner.add_product')}}">Add New Product</a>
					</li>
				</ul>
			</li>
			@endif @if($permissions->service_owner == 1)
			<li><a href="#"><i class="fa fa-sellsy"></i><span>Services</span><span class="fa fa-angle-right"
						style="float: right"></span></a>
				<ul id="menu-academico-sub">
					<li id="menu-academico-avaliacoes"><a href="{{route('service_owner.service')}}">All Services</a>
					</li>
					<li id="menu-academico-boletim"><a href="{{route('service_owner.add_service')}}">Add New Service</a>
					</li>
				</ul>
			</li>

			@endif @if($permissions->service_owner == 1)
			<li><a href="#"><i class="fa fa-list-alt"></i><span>Service Categories</span><span class="fa fa-angle-right"
						style="float: right"></span></a>
				<ul>
					<li><a href="{{route('service_owner.service_categories')}}">All Categories</a></li>
					<li><a href="{{route('service_owner.add_service_categorie')}}">Add New Categorie</a></li>
				</ul>
			</li>
			@endif @endif
			<li><a href="#"><i class="fa fa-empire" aria-hidden="true"></i><span>Orders</span><span
						class="fa fa-angle-right" style="float: right"></span></a>
				<ul id="menu-academico-sub">
					<li id="menu-academico-avaliacoes"><a href="{{route('store_owner.all_store_orders')}}">All
							Orders</a></li>
				</ul>
			</li>

		</ul>
	</div>
</div>
<div class="clearfix"> </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<!--slide bar menu end here-->
<script>
	var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle) {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({
                "position": "absolute"
            });
        } else {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({
                    "position": "relative"
                });
            }, 400);
        }
        toggle = !toggle;
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	Echo.channel("OrderCreated.{{Session::get('store_id')}}")
            .listen('newOrderCreated', (e) => {
				console.log(e.order);
				
				swal("New Order Arrived", "Please check your orders", "success").then(function () {
					window.location.href = "{{route('store_owner.all_store_orders')}}";
				});

    
            });  
</script>

<!--scrolling js-->
<!-- mother grid end here-->