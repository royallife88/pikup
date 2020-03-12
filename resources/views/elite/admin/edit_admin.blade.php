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
    <form id="edit_admin_form" class="form-horizontal" action="{{route('admin.update_admin')}}" method="post"
        enctype="multipart/form-data">
        <fieldset>
            {{csrf_field()}}
            <!-- Form Name -->
            <legend style="text-align:center"><b>Add Admin</b></legend>
            <input type="hidden" name="id" value="{{$admin->id}}">
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">First Name</label>
                <div class="col-md-4">
                    <input id="first_name" value="{{ $admin->first_name }}" name="first_name" placeholder="First Name"
                        class="form-control input-md" required type="text">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Last Name</label>
                <div class="col-md-4">
                    <input id="last_name" value="{{ $admin->last_name }}" name="last_name" placeholder="Last Name"
                        class="form-control input-md" required type="text">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Email</label>
                <div class="col-md-4">
                    <input id="email" value="{{ $admin->email }}" name="email" placeholder="Email"
                        class="form-control input-md" required type="email">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Role</label>
                <div class="col-md-4">
                    <select name="role" id="role" class="form-control" required>
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                        <option value="{{$role->name}}" @if($role->name == $admin->role){{'selected'}}
                            @endif>{{$role->name}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Social Security Number</label>
                <div class="col-md-4">
                    <input id="social_security_number" value="{{ $admin->social_security_number }}"
                        name="social_security_number" placeholder="Social Security Number" class="form-control input-md"
                        required type="text">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Date of Birth</label>
                <div class="col-md-4">
                    <input id="dob" value="{{$admin->dob}}" name="dob" placeholder="Date of Birth"
                        class="form-control input-md" required type="date">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Age</label>
                <div class="col-md-4">
                    <input id="age" value="{{ $admin->age }}" name="age" placeholder="Age" class="form-control input-md"
                        required type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Address</label>
                <div class="col-md-4">
                    <input id="address" value="{{ $admin->address }}" name="address" placeholder="Address"
                        class="form-control input-md" required type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Phone Number</label>
                <div class="col-md-4">
                    <input id="phone_number" value="{{ $admin->phone_number }}" name="phone_number"
                        placeholder="Phone Number" class="form-control input-md" required type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Date Started Work</label>
                <div class="col-md-4">
                    <input id="date_started_working" value="{{ $admin->date_started_working }}"
                        name="date_started_working" placeholder="Date Started Work" class="form-control input-md"
                        required type="date">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Job Description</label>
                <div class="col-md-4">
                    <input id="job_description" value="{{ $admin->job_description }}" name="job_description"
                        placeholder="Job Description" class="form-control input-md" required type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Bank Routing Number</label>
                <div class="col-md-4">
                    <input id="bank_routing_number" value="{{ $admin->bank_routing_number }}" name="bank_routing_number"
                        placeholder="Bank Routing Number" class="form-control input-md" required type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="user_id">Bank Account Number</label>
                <div class="col-md-4">
                    <input id="bank_account_number" value="{{ $admin->bank_account_number }}" name="bank_account_number"
                        placeholder="Bank Account Number" class="form-control input-md" required type="text">
                </div>
            </div>

            <!-- File Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="image">Profile Image</label>
                <div class="col-md-4">
                    <input type="file" name="image" class="input-file" onchange="readURL(this);">
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
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Edit</button>
                    <button id="singlebutton" type="reset" name="singlebutton" class="btn btn-warning">Reset</button>
                </div>
            </div>

        </fieldset>
    </form>
    <script>
        $("#edit_admin_form").validate({
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
              phone_number: {
                  required: true,
                  maxlength: 15,
                  normalizer: function(value) {
                      return $.trim(value);
                  }
              },
              job_description: {
                  required: true,
                  maxlength: 255,
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