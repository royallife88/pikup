@include('elite/store_owner/header')


<body class="" style="height:900px;
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

  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>Add Store</b></legend>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="store_name">STORE NAME</label>
        <div class="col-md-4">
          <input id="store_name" value="" name="title" placeholder="STORE NAME" class="form-control input-md"
            required="" type="text">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="store_address">STORE ADDRESS</label>
        <div class="col-md-4">
          <input id="store_address" value="" name="store_address" placeholder="STORE ADDRESS"
            class="form-control input-md" required="" type="text">

        </div>
      </div>

      @php $category = DB::table('categories')->select('*')->where('admin_approve', "1")->get(); @endphp

      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_categorie">CATEGORY</label>
        <div class="col-md-4">
          <select id="product_categorie" name="store_category" class="form-control">
            @foreach($category as $value):
            <option value="{{$value->categorie_name}}" selected>{{$value->categorie_name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="store_description" required>STORE DESCRIPTION</label>
        <div class="col-md-4">
          <textarea cols="3" rows="7" class="form-control" id="store_description" name="desc"></textarea>
        </div>
      </div>

      <!-- File Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="image">Store Profile Image</label>
        <div class="col-md-4">
          <input type="file" required name="image" class="input-file" onchange="readURL(this);">
          <img id="blah" height="200px" width="150px" src="#!" class="avatar img-square img-thumbnail" alt="avatar">
        </div>
      </div>

      <!-- File Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="banner">Store Banner</label>
        <div class="col-md-4">
          <input type="file" required name="banner" class="input-file" onchange="readURLs(this);">
          <img id="banner" height="200px" width="150px" src="#!" class="avatar img-square img-thumbnail" alt="avatar">
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="store_opening">STORE OPENING</label>
        <div class="col-md-4">
          <input id="store_opening" value="" name="store_opening" placeholder="STORE OPENING"
            class="form-control input-md" required="" type="text">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="store_closing">STORE CLOSING</label>
        <div class="col-md-4">
          <input id="store_closing" value="" name="store_closing" placeholder="STORE CLOSING"
            class="form-control input-md" required="" type="text">

        </div>
      </div>
      <script>
        function readURLs(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#banner')
                        .attr('src', e.target.result)
                        .width(1000)
                        .height(300);
                };
                

                reader.readAsDataURL(input.files[0]);
            }
        }
      </script>

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
          <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add</button>
          <button id="singlebutton" type="reset" name="singlebutton" class="btn btn-warning">Reset</button>
        </div>
      </div>

    </fieldset>
  </form>

  @include('elite.store_owner.footer')