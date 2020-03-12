@include('elite.admin.header')
<style>
  .filiiii {
    background: #59698d;
    color: #fff !important;
    text-align: center;
    border-radius: 30px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    padding: 11px 2.14rem;
    font-size: .81rem;
  }

  .filiiii:hover {
    box-shadow: 0px 5px 9px #333;
    transition: 0.5s;
    cursor: pointer;
  }


  .featured_image {
    display: none !important;
  }

  .img-wrap {
    position: relative;
    width: 100px;
    display: inline-block;
  }

  .img-wrap .remove_img {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
    color: white;
    background: black;
    font-size: 11px;
    border-radius: 27px;
    padding: 0px 4px;
  }

  .multi_image {
    display: none !important;
  }
</style>

<body class="" style="height:100%;
  width: 100%;  
  overflow-y: scroll;
  overflow-x:hidden">
  @if(Session::has('add_product_success'))
  <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-check"></i>
    {{Session::get('add_product_success')}}
  </div>
  @endif

  @foreach($data as $product_value)
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" style="float:right">
    @csrf

    @php $val = DB::table('laravelproject_new_restaurant_register')->select('admin_approve')->where('restaurant_id',
    $product_value->restaurant_id)->get(); @endphp
    <div class="form-group">
      <label class="col-md-4 control-label" for="admin_approve">Status</label>
      <div class="col-md-9">
        <select id="admin_approve" name="admin_approve" class="form-control" style="width: auto;float:left">
          @foreach($val as $value)
          <option value="0" @if($value->admin_approve == '0') {{"selected"}} @endif>Pending</option>
          <option value="1" @if($value->admin_approve == '1') {{"selected"}} @endif>Approved</option>
          <option value="2" @if($value->admin_approve == '2') {{"selected"}} @endif>Rejected</option>
          @endforeach
        </select>
        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>

  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>EDIT PRODUCT</b></legend>


      <!-- Select Basic -->
      @php $data = DB::table('laravelproject_new_restaurant_register')->select('business_name')->where('user_id',
      session::get('user')->id)->get(); @endphp
      @php $data1 =
      DB::table('laravelproject_new_restaurant_category')->select('category_name')->where('restaurant_owner_id',
      session::get('user')->id)->where('admin_approve', '1')->get(); @endphp
      <div class="form-group">
        <label class="col-md-4 control-label" for="business_name">RESTAURANT NAME</label>
        <div class="col-md-4">
          <select id="business_name" name="business_name" class="form-control">
            @foreach($data as $value):
            <option value="{{$value->business_name}}">{{$value->business_name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="category_name">FOOD CATEGORY</label>
        <div class="col-md-4">
          <select id="category_name" name="category_name" class="form-control">
            @foreach($data1 as $value):
            <option value="{{$value->category_name}}">{{$value->category_name}}</option>
            @endforeach
          </select>
        </div>
      </div>



      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="food_name">FOOD NAME</label>
        <div class="col-md-4">
          <input id="food_name" value="" name="food_name" placeholder="FOOD NAME" class="form-control input-md"
            required="" type="text">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="food_price">FOOD PRICE</label>
        <div class="col-md-4">

          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input id="food_price" value="" name="price" placeholder="FOOD PRICE" class="form-control input-md"
              required="" type="number">
          </div>
        </div>
      </div>
      <!-- Text input-->




      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="food_description" required>FOOD DESCRIPTION</label>
        <div class="col-md-4">
          <textarea cols="3" rows="7" class="form-control" id="food_description" name="description"></textarea>
        </div>
      </div>

      <!-- File Button -->
      <div class="form-group">
        <h4 class="col-md-4 col-md-offset-3" style="margin-left: 23%">FOOD IMAGE</h4>
        <label class="filiiii ">Choose file
          <input type="file" required class="featured_image" name="featured_image" value="" onchange="readURL(this);">
          <span class="file-uploadd1" style="float: left; padding-left: 10px;"></span>
        </label><br>
        <div class="col-md-4 col-md-offset-4">
          <img id="upload" style="display:none;height:100px" src="#!" class="avatar img-square img-thumbnail"
            alt="avatar">
        </div>
      </div>
      <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#upload')
                        .attr('src', e.target.result)
                        .width(150)        
                        .attr('style', "display:block;height:200px");
                };
               
                

                reader.readAsDataURL(input.files[0]);
            }
        }
      </script>
      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
          <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add</button>
          <button id="singlebutton" type="reset" name="singlebutton" class="btn btn-warning">Reset</button>
        </div>
      </div>

    </fieldset>
  </form>
  @endforeach
  @include('elite.admin.footer')