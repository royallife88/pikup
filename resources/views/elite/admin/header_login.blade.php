<html>

<head>
	<title>Shoppy an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<link href="{{asset('admincss/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
	<!-- Custom Theme files -->
	<link href="{{asset('admincss/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!--js-->
	<script src="{{asset('admincss/js/jquery-2.1.1.min.js')}}"></script>
	<!--icons-css-->
	<link href="{{asset('admincss/css/font-awesome.css')}}" rel="stylesheet">
	<script src="{{asset('admincss/js/Chart.min.js')}}"></script>
	<link href="path/to/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
	<script src="path/to/bootstrap-editable/js/bootstrap-editable.min.js"></script>

	<style>
		.edit {
			padding-top: 7px;
			padding-right: 7px;
			position: absolute;
			right: 0;
			top: 0;
			display: none;
		}

		.dropdown-menu {
			max-height: 250px;
			overflow-y: scroll;
		}

		.edit a {
			color: #000;
		}

		.profile-pic {
			position: relative;
			display: inline-block;
		}

		.profile-pic:hover .edit {
			display: block;
		}

		.fa-lg {
			color: #6F6F6F;
		}

		.product-items {
			margin-bottom: 0em !important;
		}
	</style>
	<script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
	<script>
		window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')
	</script>
	<!--<script src="lib/html5shiv/html5shiv.js"></script>-->
	<!-- Chartinator  -->
	<script src="{{asset('admincss/js/chartinator.js')}}"></script>
	<script type="text/javascript">
		jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
	</script>
	<!--geo chart-->

	<!--skycons-icons-->
	<script src="{{asset('admincss/js/skycons.js')}}"></script>

	<script src="{{asset('admincss/js/scripts.js')}}"></script>
	<!--//scrolling js-->
	<script src="{{asset('admincss/js/bootstrap.js')}}"> </script>
	<!--//skycons-icons-->
</head>
<div class="page-container">
	<div class="">
		<div class="mother-grid-inner">
			<!--header start here-->
			<div class="header-main">
				<div class="header-left">
					<div class="logo-name">
						<a href="{{url('admin')}}"> <img src="{{asset('/uploads/logo.png')}}" alt="" width=74%;>
							<!--<img id="logo" src="" alt="Logo"/>-->
						</a>
					</div>
					<!--search-box-->
					<div class="search-box">
						<form>
							<input type="text" placeholder="Search..." required="">
							<input type="submit" value="">
						</form>
					</div>
					<!--//end-search-box-->
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="profile_details">
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">
									<span class="prfil-img"><img src="images/p1.png" alt=""> </span>
									<div class="user-name">
										<p>@if(Session::has('user')){{(Session::get('user')->name)}}@endif</p>
										<span>@if(!empty(Session('user'))) Administrator @endif</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>
								</div>
							</a>
							<ul class="dropdown-menu drp-mnu">
								@if(!empty(Session('user')))
								<li> <a href="{{url('profile')}}"><i class="fa fa-user"></i>Profile</a> </li>
								<li> <a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Logout</a> </li>
								@else
								<li> <a href="{{route('admin.login')}}"><i class="fa fa-sign-in"></i> Login</a> </li>
								@endif
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>

			@if(Session::has('user_deleted'))
			<div class="alert alert-Danger alert-dismissable">
				<a class="panel-close close" data-dismiss="alert">×</a>
				<i class="fa fa-trash-o" style="color:red"></i><i class="fa fa-check"></i>
				{{Session::get('user_deleted')}}
			</div>
			@endif
			@if(Session::has('d_status'))
			<div class="alert alert-success alert-dismissable">
				<a class="panel-close close" data-dismiss="alert">×</a>
				<i class="fa fa-check"></i>
				{{Session::get('d_status')}}
			</div>
			@endif
			@if(Session::has('delete_order'))
			<div class="alert alert-Danger alert-dismissable">
				<a class="panel-close close" data-dismiss="alert">×</a>
				<i class="fa fa-trash-o" style="color:red"></i><i class="fa fa-check"></i>
				{{Session::get('delete_order')}}
			</div>
			@endif