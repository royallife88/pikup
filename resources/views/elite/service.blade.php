<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Please sign up for Bootsnipp <small>It's free!</small></h3>
				</div>
				<div class="panel-body">
					<form role="form" action="{{url('signup')}}" method="post">
						@csrf
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="fName" id="first_name" class="form-control input-sm"
										placeholder="First Name">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="lName" id="last_name" class="form-control input-sm"
										placeholder="Last Name">
								</div>
							</div>
						</div>

						<div class="form-group">
							<input type="email" name="Email" id="email" class="form-control input-sm"
								placeholder="Email Address">
						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control input-sm"
										placeholder="Password">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="cpassword" id="password_confirmation"
										class="form-control input-sm" placeholder="Confirm Password">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="number" name="mbl_number" id="mbl_number" class="form-control input-sm"
										placeholder="Mobile Number">
								</div>
							</div>
						</div>

						<div class="styled-input">
							<span>I am a store Owner</span>
							<input type="checkbox" name="check_list[]" value="store_owner">
						</div>
						<div class="styled-input">
							<span>I am a service owner</span>
							<input type="checkbox" name="check_list[]" value="service_owner">
						</div>
						<div class="styled-input">
							<span>I am a restaurants owner</span>
							<input type="checkbox" name="check_list[]" value="restaurant_owner">
						</div>

						<input type="submit" value="Register" class="btn btn-info btn-block">

					</form>
				</div>
			</div>
		</div>
	</div>
</div>