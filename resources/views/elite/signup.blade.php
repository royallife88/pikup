<!DOCTYPE HTML>
<html>
@include('elite.admin.header')
@if(Session::has('warning'))
<div class="alert alert-warning alert-dismissable" style="text-align:center;margin-bottom:0px;">
	<a class="panel-close close" data-dismiss="alert">×</a>
	<i class="fa fa-check"></i>
	{{Session::get('warning')}}
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissable" style="text-align:center;margin-bottom:0px;">
	<a class="panel-close close" data-dismiss="alert">×</a>
	<i class="fa fa-check"></i>
	{{Session::get('error')}}
</div>
@endif

<body>
	<div class="login-page">
		<div class="login-main">
			<div class="login-head">
				<h1>Sign up</h1>
			</div>
			<div class="login-block">
				<form action="{{url('signup')}}" method="POST">
					@csrf
					<input type="text" name="fName" placeholder="First Name" required="">
					<input type="text" name="lName" placeholder="Last Name" required="">
					<input type="text" name="Email" placeholder="Email" required="">
					<input type="password" name="password" id="password" placeholder="Password">
					<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
					<input type="text" name="address" class="Address" placeholder="Address">
					<input type="text" name="mbl_number" class="number" placeholder="+91 xxxx">
					<input type="hidden" name="latitude" class="" placeholder="latitude">
					<input type="hidden" name="longitude" class="" placeholder="longitude">
					<input type="hidden" value="{{collect(request()->segments())->last()}}" disabled name="register_type">
					<input type="submit" name="Sign Up" value="Sign Up">
					<h2> <a href="{{route('admin.login')}}"> or login with</a></h2>

				</form>

			</div>
		</div>
	</div>
	<!--inner block end here-->
	<!--copy rights start here-->
	<div class="copyrights">
		<p>© 2016 Shoppy. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a>
		</p>
	</div>
	<!--COPY rights end here-->

	<!--scrolling js-->

	<!-- mother grid end here-->
</body>

</html>