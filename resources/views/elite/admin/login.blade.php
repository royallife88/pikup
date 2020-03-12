<!DOCTYPE HTML>
<html>
@include('elite.admin.header_login')
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
				<h1>Login</h1>
			</div>
			<div class="login-block">
				<form action="{{route('admin.login')}}" method="POST">
					@csrf
					<input type="text" name="Email" placeholder="Email" required="">
					<input type="password" name="password" class="lock" placeholder="Password">
					<div class="forgot-top-grids">
						<div class="forgot-grid">
							<ul>
								<li>
								</li>
							</ul>
						</div>
						<div class="forgot">
							{{-- <a href="{{route('')}}">Forgot password?</a> --}}
						</div>
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="Sign In" value="Login">


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