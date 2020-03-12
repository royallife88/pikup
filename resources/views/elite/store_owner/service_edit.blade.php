@include('elite.store_owner.header')
<body style="height:100%;
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
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@foreach($data as $product_value)
@php
if($product_value->service_approve_status == 2){
  $disabled = "disabled" ;
}else{
  $disabled = "";
}
  @endphp
  
@if($product_value->service_approve_status == 0)<span style="margin-top: 7px; display: inline-block;font-size: unset;float: right;color: orange  ;font-weight: bold;">Your Service is Pending</span>
@elseif($Service_value->service_approve_status == 1)<span style="margin-top: 7px; display: inline-block;font-size: unset;float: right;color: green;font-weight: bold;">Your Service is Live</span>
@else<span style="margin-top: 7px; display: inline-block;font-size: unset;float: right;color: red;font-weight: bold;">Your Service is Rejected</span>@endif

<label class="switch">  
  <input type="checkbox" @if($product_value->service_approve_status == 0){}@elseif($product_value->service_approve_status == 2){}@else checked @endif disabled>
  <span class="slider round"></span>
</label>
<form id="edit_service" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
<fieldset>
{{csrf_field()}}
<!-- Form Name -->
<legend style="text-align:center"><b>EDIT SERVICE</b></legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="service_name">Service Name</label>  
  <div class="col-md-4">
  <input id="service_name" value="{{$product_value->service_name}}" name="service_name" placeholder="Service Name" class="form-control input-md" required="" type="text">
    
  </div>
</div>


@php $data = DB::table('laravelproject_new_service_category')->select('category_name')->where('store_id', session::get('store_id'))->where('admin_approve', '1')->get(); @endphp
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="service_type">Service Category</label>  
  <div class="col-md-4">
    <select id="service_category" name="service_category" class="form-control"> 
    @foreach($data as $value):  
    <option value="{{$value->category_name}}">{{$value->category_name}}</option>  
    @endforeach  
</select>
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="service_charges">Service Charges</label>  
  <div class="col-md-4">
  
  <div class="input-group">
    <span class="input-group-addon">$</span>
    <input id="service_charges" value="{{$product_value->service_charges}}" name="charges" placeholder="Service Charges" class="form-control input-md" required="" type="number">
  </div>
  </div>
</div>








<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="service_description" required>Service Description</label>
  <div class="col-md-4">                     
    <textarea cols="3" rows="7" class="form-control" id="service_description" name="description">{{$product_value->service_desc}}</textarea>
  </div>
</div>

 <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="image">Product image</label>
  <div class="col-md-4">
    <input type="file" required name="image" {{$disabled}} class="input-file" onchange="readURL(this);" value="">
    <img id="blah" height="200px" width="150px" src="{{asset('/')}}{{$product_value->featured_image}}" class="avatar img-square img-thumbnail" alt="avatar">   
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
    <button id="singlebutton" name="singlebutton" {{$disabled}} class="btn btn-primary">SAVE</button>
    <button id="singlebutton" type="reset" {{$disabled}} name="singlebutton" class="btn btn-warning">Reset</button>
  </div>
</div>

</fieldset>
</form>
@endforeach
<script>
  // validation rules for form
    $("#edit_service").validate({
    rules: {
        service_name: {
            required: true,
            normalizer: function(value) {
                return $.trim(value);
            }
        },
        service_category: {
            required: true,
            normalizer: function(value) {
                return $.trim(value);
            }
        },
        charges: {
            required: true,
            digits: true,
            normalizer: function(value) {
                return $.trim(value);
            }
        },
        description: {
            required: true,
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
@include('elite.store_owner.footer')

