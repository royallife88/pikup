<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
<script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
				    $('#nivo-lightbox-demo a').nivoLightbox({ effect: 'fade' });
				});
</script>
@php
$admin = App\Laravelproject_new_admin::findOrFail(Session::get('user')->id);
@endphp
<div class="sidebar-menu" style="position: fixed;">
	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> </a> </div>
	<div class="menu">
		<ul id="menu">
			<li id="menu-home"><a href="{{url('admin')}}"><i class="fa fa-cogs"></i><span>Dashboard</span></a></li>

			@if($admin->hasPermissionTo('categories_menu'))
			<li><a href="#"><i class="fa fa-list-alt"></i><span>Categories</span><span class="fa fa-angle-right"
						style="float: right"></span></a>
				<ul>
					@if($admin->hasPermissionTo('store_categories_submenu'))
					<li><a href="{{route('admin.all_categories.status', ['status' => 'store_categorie'])}}">Store
							Categories</a></li>
					@endif
					@if($admin->hasPermissionTo('service_categories_submenu'))
					<li><a href="{{route('admin.all_categories.status', ['status' => 'service_categorie'])}}">Service
							Categories</a></li>
					@endif
				</ul>
			</li>
			@endif

			@if($admin->hasPermissionTo('user_menu'))
			<li><a href="#"><i class="fa fa-user"></i><span>All Users</span><span class="fa fa-angle-right"
						style="float: right"></span></a>
				<ul id="menu-academico-sub">
					@if($admin->hasPermissionTo('all_users_submenu'))<li id="menu-academico-avaliacoes"><a
							href="{{route('admin.all_user')}}">All Users</a></li>@endif
					@if($admin->hasPermissionTo('store_owner_submenu'))<li id="menu-academico-boletim"><a
							href="{{route('admin.all_user.status', ['status' => 'store_owner'])}}">Store Owners</a></li>
					@endif
					@if($admin->hasPermissionTo('service_owner_submenu'))<li id="menu-academico-boletim"><a
							href="{{route('admin.all_user.status', ['status' => 'service_owner'])}}">Service Owners</a>
					</li>@endif
					@if($admin->hasPermissionTo('customers_submenu'))<li id="menu-academico-boletim"><a
							href="{{route('admin.all_customers')}}">Customers</a></li>@endif
					@if($admin->hasPermissionTo('blocked_submenu'))<li id="menu-academico-boletim"><a
							href="{{route('admin.all_user.status', ['status' => 'blocked'])}}">Blocked</a></li>@endif
				</ul>
			</li>
			@endif

			@if($admin->hasPermissionTo('products_menu'))
			<li><a href="#"><i class="fa fa-shopping-cart"></i><span>Products</span><span class="fa fa-angle-right"
						style="float: right"></span></a>
				<ul id="menu-academico-sub">
					@if($admin->hasPermissionTo('all_products_submenu'))<li id="menu-academico-avaliacoes"><a
							href="{{route('admin.categorie_page')}}">All Products</a></li>@endif
					@if($admin->hasPermissionTo('all_services_submenu'))<li id="menu-academico-avaliacoes"><a
							href="{{route('admin.service_categorie_page')}}">All Services</a></li>@endif
				</ul>
			</li>
			@endif
			@if($admin->hasPermissionTo('orders_menu'))
			<li><a href="#"><i class="fa fa-empire" aria-hidden="true"></i><span>Orders</span><span
						class="fa fa-angle-right" style="float: right"></span></a>
				<ul id="menu-academico-sub">
					@if($admin->hasPermissionTo('all_orders_submenu'))<li id="menu-academico-avaliacoes"><a
							href="{{route('admin.all_orders_page')}}">All Orders</a></li>@endif
				</ul>
			</li>
			@endif

			@if($admin->hasPermissionTo('drivers_menu'))
			<li><a href="#"><i class="fa fa-car"></i><span>Drivers</span><span class="fa fa-angle-right"
						style="float: right"></span></a>
				<ul id="menu-academico-sub">
					@if($admin->hasPermissionTo('add_driver_submenu'))<li id="menu-academico-avaliacoes"><a
							href="{{route('admin.add_driver')}}">Add Driver</a></li>@endif
					@if($admin->hasPermissionTo('all_driver_submenu'))<li id="menu-academico-avaliacoes"><a
							href="{{route('admin.all_driver')}}">All Drivers</a></li>@endif
				</ul>
			</li>
			@endif
			@if($admin->hasPermissionTo('admins_menu'))
			<li><a href="#"><i class="fa fa-user"></i><span>Admins</span><span class="fa fa-angle-right"
						style="float: right"></span></a>
				<ul id="menu-academico-sub">
					@if($admin->hasPermissionTo('add_admin_submenu'))<li id="menu-academico-avaliacoes"><a
							href="{{route('admin.add_admin')}}">Add Admin</a></li>@endif
					@if($admin->hasPermissionTo('all_admin_submenu'))<li id="menu-academico-avaliacoes"><a
							href="{{route('admin.all_admin')}}">All Admins</a></li>@endif
				</ul>
			</li>
			@endif

			@if($admin->hasPermissionTo('roles_menu'))
			<li><a href="#"><i class="fa fa-tag"></i><span>Roles</span><span class="fa fa-angle-right"
						style="float: right"></span></a>
				<ul id="menu-academico-sub">
					@if($admin->hasPermissionTo('change_permission_submenu'))<li id="menu-academico-avaliacoes"><a
							href="{{route('admin.role_change_permission_page')}}">Change Permissions</a></li>@endif
				</ul>
			</li>
			@endif

		</ul>
	</div>
</div>
<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
	var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
<!-- mother grid end here-->