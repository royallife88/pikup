@include('elite/admin/header')

<body style="height:900px;
  width: 100%;  
  overflow-y: scroll;
  overflow-x:hidden">
    @if(Session::has('updated'))
    <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
        <a class="panel-close close" data-dismiss="alert">×</a>
        <i class="fa fa-check"></i>
        {{Session::get('updated')}}
    </div>
    @endif
    @if(Session::has('message'))
    <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
        <a class="panel-close close" data-dismiss="alert">×</a>
        <i class="fa fa-check"></i>
        {{Session::get('message')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form id="add_driver_form" class="form-horizontal" action="{{route('admin.create_driver')}}" method="post"
        enctype="multipart/form-data">
        <fieldset>
            {{csrf_field()}}
            <!-- Form Name -->
            <legend style="text-align:center"><b>Add Driver</b></legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">First Name</label>
                <div class="col-md-4">
                    <input id="first_name" value="{{ old('first_name') }}" name="first_name" placeholder="First Name"
                        class="form-control input-md" required type="text">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Last Name</label>
                <div class="col-md-4">
                    <input id="last_name" value="{{ old('last_name') }}" name="last_name" placeholder="Last Name"
                        class="form-control input-md" required type="text">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Email</label>
                <div class="col-md-4">
                    <input id="email" value="{{ old('email') }}" name="email" placeholder="Email"
                        class="form-control input-md" required type="email">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Password</label>
                <div class="col-md-4">
                    <input id="password" value="{{ old('password') }}" name="password" placeholder="Password"
                        class="form-control input-md" required type="password">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Social Security Number</label>
                <div class="col-md-4">
                    <input id="social_security_number" value="{{ old('social_security_number') }}"
                        name="social_security_number" placeholder="Social Security Number" class="form-control input-md"
                        required type="text">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Date of Birth</label>
                <div class="col-md-4">
                    <input id="dob" value="{{ old('dob') }}" name="dob" placeholder="Date of Birth"
                        class="form-control input-md" required type="date">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Age</label>
                <div class="col-md-4">
                    <input id="age" value="{{ old('age') }}" name="age" placeholder="Age" class="form-control input-md"
                        required type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Address</label>
                <div class="col-md-4">
                    <input id="address" value="{{ old('address') }}" name="address" placeholder="Address"
                        class="form-control input-md" required type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Phone Number</label>
                <div class="col-md-4">
                    <input id="phone_number" value="{{ old('phone_number') }}" name="phone_number"
                        placeholder="Phone Number" class="form-control input-md" required type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Date Started Work</label>
                <div class="col-md-4">
                    <input id="date_started_working" value="{{ old('date_started_working') }}"
                        name="date_started_working" placeholder="Date Started Work" class="form-control input-md"
                        required type="date">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">License Number</label>
                <div class="col-md-4">
                    <input id="license_number" value="{{ old('license_number') }}" name="license_number"
                        placeholder="License Number" class="form-control input-md" required type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">License Expiry Date</label>
                <div class="col-md-4">
                    <input id="licence_expiry_date" value="{{ old('licence_expiry_date') }}" name="licence_expiry_date"
                        class="form-control input-md" required type="date">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Home Region</label>
                <div class="col-md-4">
                    <input id="home_region" value="{{ old('home_region') }}" name="home_region"
                        placeholder="Home Region" class="form-control input-md" required type="text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Level</label>
                <div class="col-md-4">
                    <select name="driver_level" id="driver_level" class="form-control" required>
                        <option value="">Select Level</option>
                        <option value="1">Teir 1</option>
                        <option value="2">Teir 2</option>
                        <option value="3">Teir 3</option>
                        <option value="4">Teir 4</option>
                        <option value="5">Teir 5</option>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Bank Routing Number</label>
                <div class="col-md-4">
                    <input id="bank_routing_number" value="{{ old('bank_routing_number') }}" name="bank_routing_number"
                        placeholder="Bank Routing Number" class="form-control input-md" required type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Bank Account Number</label>
                <div class="col-md-4">
                    <input id="bank_account_number" value="{{ old('bank_account_number') }}" name="bank_account_number"
                        placeholder="Bank Account Number" class="form-control input-md" required type="text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="image">License Image</label>
                <div class="col-md-4">
                    <input type="file" required name="image" class="input-file" onchange="readURL(this);">
                    <img id="blah" height="200px" width="150px" style="display:none;" src="#!"
                        class="avatar img-square img-thumbnail" alt="avatar">
                </div>
            </div>


            <script>
                function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };
                

                reader.readAsDataURL(input.files[0]);
            }
        }
            </script>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
                    <button id="singlebutton" type="reset" name="singlebutton" class="btn btn-warning">Reset</button>
                </div>
            </div>

        </fieldset>
    </form>

    <script>
        $("#add_driver_form").validate({
          rules: {
            first_name: {
                  required: true,
                  maxlength: 15,
                  number: false,
                  digits: false,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              last_name: {
                  required: true,
                  maxlength: 15,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              email: {
                  required: true,
                  email: true,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              password: {
                  required: true,
                  maxlength: 30,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              social_security_number: {
                  required: true,
                  digits: true,
                  maxlength: 20,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              dob: {
                  required: true,
                  date: true,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              licence_expiry_date: {
                  required: true,
                  date: true,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              age: {
                  required: true,
                  maxlength: 3,
                  digits: true,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              address: {
                  required: true,
                  maxlength: 50,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              date_started_working: {
                  required: true,
                  date: true,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              license_number: {
                  required: true,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              home_region: {
                  required: true,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              driver_level: {
                  required: true,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              bank_routing_number: {
                  required: true,
                  digits: true,
                  maxlength: 20,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              bank_account_number: {
                  required: true,
                  digits: true,
                  maxlength: 20,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              image: {
                  required: true,
                  accept:"jpg,png,jpeg,gif",
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },

          }
      });
    </script>
    @include('elite.admin.footer')