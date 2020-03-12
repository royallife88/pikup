<!------ Include the above in your HEAD tag ---------->
@include('elite.store_owner.header')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        float: right;
    }
    
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }
    
    .container span {
        float: right;
    }
    
    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }
    
    input:checked + .slider {
        background-color: #2196F3;
    }
    
    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }
    /* Rounded sliders */
    
    .slider.round {
        border-radius: 34px;
    }
    
    .slider.round:before {
        border-radius: 50%;
    }
</style>
@if(Session::has('Setpass'))
<div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i> {{Session::get('Setpass')}}
</div>
@endif
<div class="" style="padding-top: 60px;">
    <h1 class="page-header">Edit Profile</h1>
    <div class="row">
        @php $name = explode(' ',Session::get('user')->name); $image = Session::get('user,image'); @endphp
        <!-- left column -->
        <span>Your Account is live</span>
        <label class="switch">
            <input type="checkbox" @if(Session::get( 'user')->blocked==0){{'checked'}}@else{}@endif disabled>
            <span class="slider round"></span>
        </label>
        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="text-center">
                    @if(!isset($image))
                    <img id="blah" src="@if(Session::has('user') && Session::get('user')->image){{asset(Session::get('user')->image)}} @else {{asset(Session::get('user')->avatar)}} @endif" class="avatar img-circle img-thumbnail" alt="avatar" width="70px" height="50px"> @else
                    <img id="blah" src="@if(Session::has('user,image')){{asset($image[0])}} @else http://lorempixel.com/200/200/people/9/ @endif" class="avatar img-circle img-thumbnail" alt="avatar" width="70px" height="50px"> @endif
                    <h6>Upload a different photo...</h6>
                    <input type="file" name="image" class="text-center center-block well well-sm" onchange="readURL(this);">
                </div>
            </div>
            <!-- edit form column -->
            <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                <h3>Personal info</h3> {{csrf_field()}}
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        @if(isset($name[0]))
                        <input name="fname" class="form-control" value="@if(Session::has('user')){{$name[0]}}@endif" type="text"> @else
                        <input name="fname" class="form-control" value="@if(Session::has('user')){{$name[0]}}@endif" type="text"> @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        @if(isset($name[1]) && isset($name[2]))
                        <input name="lname" class="form-control" value="@if(Session::has('user')){{$name[2]}}@endif" type="text"> @else
                        <input name="lname" class="form-control" value="@if(Session::has('user')){{$name[1]}}@endif" type="text"> @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input name="email" class="form-control" value="@if(Session::has('user')){{Session::get('user')->email}}@endif" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                        <input name="name" class="form-control" value="@if(Session::has('user')){{ substr(Session::get('user')->email,0,-10) }}@endif" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">
                        <input class="form-control" value="" type="password" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                        <input class="form-control" value="" type="password" name="cpassword" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input class="btn btn-primary" value="Save Changes" type="submit" name="SaveChanges">
                        <span></span>

                    </div>
                </div>
        </form>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(auto);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@include('elite.store_owner.footer')