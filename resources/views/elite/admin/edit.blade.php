@include('elite.admin.header')

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

  @foreach($data as $product_value)
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" style="float:right">
    @csrf

    @php $val = DB::table('laravelproject_new_add_products')->select('status')->where('p_id',
    $product_value->p_id)->get(); @endphp
    <div class="form-group">
      <label class="col-md-4 control-label" for="store_name">Status</label>
      <div class="col-md-9">
        <select id="status" name="status" class="form-control" style="width: auto;float:left">
          @foreach($val as $value)
          <option value="0" @if($value->status == '0') {{"selected"}} @endif>Pending</option>
          <option value="1" @if($value->status == '1') {{"selected"}} @endif>Approved</option>
          <option value="2" @if($value->status == '2') {{"selected"}} @endif>Rejected</option>
          @endforeach
        </select>
        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
  <form class="form-horizontal" id="add_product_form">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>Add PRODUCT</b></legend>


      <!-- Select Basic -->

      <div class="form-group">
        <label class="col-md-4 control-label" for="store_name">Store Name</label>
        <div class="col-md-4">
          <select id="store_name" name="store_name" class="form-control">

            <option value="{{$product_value->store_name}}">{{$product_value->store_name}}</option>

          </select>
        </div>
      </div>


      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
        <div class="col-md-4">
          <input id="product_name" value="{{$product_value->title}}" name="title" placeholder="PRODUCT NAME"
            class="form-control input-md" required="" type="text">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_price">PRODUCT PRICE</label>
        <div class="col-md-4">

          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input id="product_price" value="{{$product_value->price}}" name="price" placeholder="PRODUCT PRICE"
              class="form-control input-md" required="" type="number">
          </div>
        </div>
      </div>
      <!-- Text input-->




      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_description" required>PRODUCT DESCRIPTION</label>
        <div class="col-md-4">
          <textarea cols="3" rows="7" class="form-control" id="product_description"
            name="description">{{$product_value->description}}</textarea>
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
  <script>
    $("#add_product_form").validate({
	rules: {
		title: {
			required: true,
			normalizer: function(value) {
				return $.trim(value);
			}
		}
	}
});
  </script>
  @endforeach

  @include('elite.admin.footer')