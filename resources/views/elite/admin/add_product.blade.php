@include('elite/admin/header')
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
      <legend style="text-align:center"><b>Add PRODUCT</b></legend>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
        <div class="col-md-4">
          <input id="product_name" value="" name="title" placeholder="PRODUCT NAME" class="form-control input-md"
            required="" type="text">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_price">PRODUCT PRICE</label>
        <div class="col-md-4">
          <input id="product_price" value="" name="price" placeholder="PRODUCT PRICE" class="form-control input-md"
            required="" type="number">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="discount_price">DISCOUNT PRICE</label>
        <div class="col-md-4">
          <input id="discount_price" value="" name="disc_price" placeholder="DISCOUNT PRICE"
            class="form-control input-md" required="" type="number">

        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="main_categorie">Main CATEGORY</label>
        <div class="col-md-4">
          <select id="main_categorie" name="main_categorie" class="form-control">
            <option value="clothing">Clothing</option>
            <option value="wallets">Wallets</option>
            <option value="watches">Watches</option>
            <option value="footwear">Footwear</option>
            <option value="accessories">Accessories</option>
            <option value="bags">Bags</option>
            <option value="hats">Hats</option>
            <option value="jewellery">Jewellery</option>
            <option value="sunglassess">Sunglassess</option>
            <option value="perfumes">Perfumes</option>
            <option value="beauty">Beauty</option>
            <option value="perfumes">Perfumes</option>
          </select>
        </div>
      </div>


      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_categorie">CATEGORY</label>
        <div class="col-md-4">
          <select id="product_categorie" name="categorie" class="form-control">
            <option value="clothing">Clothing</option>
            <option value="wallets">Wallets</option>
            <option value="watches">Watches</option>
            <option value="footwear">Footwear</option>
            <option value="accessories">Accessories</option>
            <option value="bags">Bags</option>
            <option value="hats">Hats</option>
            <option value="jewellery">Jewellery</option>
            <option value="sunglassess">Sunglassess</option>
            <option value="perfumes">Perfumes</option>
            <option value="beauty">Beauty</option>
            <option value="shirts">Shirts</option>
            <option value="swimwear">Swimwear</option>
          </select>
        </div>
      </div>
      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="gender">GENDER</label>
        <div class="col-md-4">
          <select id="gender" name="gender" class="form-control">
            <option value="mens">Mens</option>
            <option value="womens">Womens</option>
            <option value="others">Others</option>
          </select>
        </div>
      </div>

      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="type">TYPE</label>
        <div class="col-md-4">
          <select id="type" name="type" class="form-control">
            <option value="ethenic">Ethenic</option>
            <option value="party">Party</option>
            <option value="Casual">Casual</option>
            <option value="best-collections">Best-Collections</option>
          </select>
        </div>
      </div>

      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_description" required>PRODUCT DESCRIPTION</label>
        <div class="col-md-4">
          <textarea cols="3" rows="7" class="form-control" id="product_description" name="description"></textarea>
        </div>
      </div>

      <!-- File Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="image">main_image</label>
        <div class="col-md-4">
          <input type="file" required name="image" class="input-file" onchange="readURL(this);">
          <img id="blah" height="200px" width="150px" src="#!" class="avatar img-square img-thumbnail" alt="avatar">
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
          <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add</button>
          <button id="singlebutton" type="reset" name="singlebutton" class="btn btn-warning">Reset</button>
        </div>
      </div>

    </fieldset>
  </form>

@include('elite.admin.footer')