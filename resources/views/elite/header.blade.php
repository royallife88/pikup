<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{asset('/')}}pikupimg/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('/')}}pikupcss/bootstrap.min.css"/>
	<link rel="stylesheet" href="{{asset('/')}}pikupcss/font-awesome.min.css"/>
	<link rel="stylesheet" href="{{asset('/')}}pikupcss/flaticon.css"/>
	<link rel="stylesheet" href="{{asset('/')}}pikupcss/slicknav.min.css"/>
	<link rel="stylesheet" href="{{asset('/')}}pikupcss/jquery-ui.min.css"/>
	<link rel="stylesheet" href="{{asset('/')}}pikupcss/owl.carousel.min.css"/>
	<link rel="stylesheet" href="{{asset('/')}}pikupcss/animate.css"/>
	<link rel="stylesheet" href="{{asset('/')}}pikupcss/hover.css"/>
	<link rel="stylesheet" href="{{asset('/')}}pikupcss/style.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/aos/3.0.0-beta.5/aos.css">


</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>



	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row ml-0 mr-0 ipad_width_responsive">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{url('/')}}" class="site-logo">
							<img src="{{asset('/')}}pikupimg/pikup_logo_2.png" alt="">
							<!-- <p>Pikup</p> -->
						</a>
					</div>
			<!-- 		<div class="col-xl-10 col-lg-10">
			<nav class="main-navbar">
			<div class="container">
				
				<ul class="main-menu">
					<li><a href="index.php" class="hvr-underline-from-left">Home</a></li>
					<li><a href="#!">Goods</a></li>
					<li><a href="#!">Services</a></li>
					<li><a href="#!">Resturants</a></li>
					<li><a href="#!">Texi</a></li>
					<li><a href="#!">Contact Page</a></li>
					<li><a href="#!"><i class="flaticon-search"></i></a></li>
					<li><a href="#!"><i class="flaticon-bag"></i></a></li>
					<li><a href="#">Jewelry
						<span class="new">New</span>
					</a></li>
					<li><a href="#">Shoes</a>
						<ul class="sub-menu">
							<li><a href="#">Sneakers</a></li>
							<li><a href="#">Sandals</a></li>
							<li><a href="#">Formal Shoes</a></li>
							<li><a href="#">Boots</a></li>
							<li><a href="#">Flip Flops</a></li>
						</ul>
					</li>
					<li><a href="#">Pages</a>
						<ul class="sub-menu">
							<li><a href="products.php">All Products</a></li>
							<li><a href="single_product.php">Single Product</a></li>
							<li><a href="cart.php">Cart Page</a></li>
							<li><a href="checkout.php">Checkout Page</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
					</div> -->
					<!-- <div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on Pikup ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div> -->
					<div class="col-lg-10">
						<div class="user-panel">
							<div class="up-item">
								<i class="fa fa-user"></i>
								<a href="#" data-toggle="modal" data-target="#myModal">Sign In</a> or <a href="#started_main">Register</a>
							</div>
							<!-- <div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i> 
									<span>0</span>
								</div>
								<a href="#">Shopping Cart</a>
							</div>
							<div class="add_cart_header_sect">
									<h1>Cart</h1>
									<h3>Items 3</h3>
								<div class="add_cart_inside">
									<div class="row">
										<div class="col-md-4">
											<img src="img/product/dish1.jpg">
										</div>
										<div class="col-md-6">
											<h4>Camera</h4>
											<p>Price: Rs.2.00</p>
										</div>
										<div class="col-md-1">
											<button>&times;</button>
										</div>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</header>
	<!-- Header section end -->

	



<!-- The Modal Sign Up Page -->
<!-- <div class="modal" id="myModal11">
  <div class="modal-dialog" style="max-width: 600px;">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" style="text-align: right; padding: 0px 10px 5px 0px;">&times;</button>
      <div class="row">
      	<div class="col-md-8">
      		<div class="sign_up_form">
      			<h4 class="modal-title">Sign Up</h4>
      			<form>
      			  <label for="usr">First Name:</label>
				  <input type="text" class="form-control" id="usr">

				  <label for="usr">Last Name:</label>
				  <input type="text" class="form-control" id="usr">

				  <label for="usr">Email:</label>
				  <input type="email" class="form-control" id="usr">
					
				
				  <label for="usr">Password:</label>
				  <input type="password" class="form-control" id="usr">

				  <label for="usr">Confirm Password:</label>
				  <input type="password" class="form-control" id="usr">

				  <div class="form-check">
				  <label class="form-check-label">
				    <input type="checkbox" class="form-check-input" value="">I am Vender
				  </label>
				</div>

				  <input type="submit" name="submit" value="sign up">
      			</form>
      			<div class="forget_pass">
      				<a href="#!">Forget Password</a>
      			</div>
      			<div class="log_fb">
      				<a href="#!" class="fb_sign_in"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      				<a href="#!" class="goo_sign_in"><i class="fa fa-google" aria-hidden="true"></i></a>
      			</div>
      			<div class="forget_pass">
      				<a href="#!" style="margin-top: 0px;">Already Have Account.</a>
      			</div>

      			
      		</div>
      	</div>
      	<div class="col-md-4">
      		<div class="signup_popup_img">
      			<img src="img/sign_page_img.jpg">      			
      		</div>
      	</div>
      </div>

      

    </div>
  </div>
</div> -->