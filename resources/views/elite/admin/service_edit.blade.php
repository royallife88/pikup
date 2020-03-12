@include('elite.admin.header')

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

  @foreach($data as $product_value)
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" style="float:right">
    @csrf

    @php $val = DB::table('laravelproject_new_service_register')->select('service_approve_status')->where('service_id',
    $product_value->service_id)->get(); @endphp
    <div class="form-group">
      <label class="col-md-4 control-label" for="service_approve_status">Status</label>
      <div class="col-md-9">
        <select id="service_approve_status" name="service_approve_status" class="form-control"
          style="width: auto;float:left">
          @foreach($val as $value)
          <option value="0" @if($value->service_approve_status == '0') {{"selected"}} @endif>Pending</option>
          <option value="1" @if($value->service_approve_status == '1') {{"selected"}} @endif>Approved</option>
          <option value="2" @if($value->service_approve_status == '2') {{"selected"}} @endif>Rejected</option>
          @endforeach
        </select>
        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
  <form class="form-horizontal">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>Add PRODUCT</b></legend>
      <!-- Select Basic -->

      <div class="form-group">
        <label class="col-md-4 control-label" for="service_name">Service Name</label>
        <div class="col-md-4">
          <select id="service_name" name="service_name" class="form-control">

            <option value="{{$product_value->service_name}}">{{$product_value->service_name}}</option>

          </select>
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_price">SERVICE CHARGES</label>
        <div class="col-md-4">

          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input id="service_charges" value="{{$product_value->service_charges}}" name="service_charges"
              placeholder="PRODUCT PRICE" class="form-control input-md" required="" type="number">
          </div>
        </div>
      </div>
      <!-- Text input-->

      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="service_desc" required>PRODUCT DESCRIPTION</label>
        <div class="col-md-4">
          <textarea cols="3" rows="7" class="form-control" id="service_desc"
            name="service_desc">{{$product_value->service_desc}}</textarea>
        </div>
      </div>

      <!-- File Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="image">Product image</label>
        <div class="col-md-4">
          <input type="file" required name="image" class="input-file" onchange="readURL(this);">
          <img id="blah" height="200px" width="150px" src="{{asset('/')}}{{$product_value->featured_image}}"
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


    </fieldset>
  </form>
  @endforeach

  @include('elite.admin.footer')