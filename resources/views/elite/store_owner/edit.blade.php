@include('elite.store_owner.header')
<link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}">
<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>

<body style="height:100%;
  width: 100%;  
  overflow-y: scroll;
  overflow-x:hidden">
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

    .multi_image {
      display: none !important;
    }
  </style>
  @if(Session::has('updated'))
  <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-check"></i> {{Session::get('updated')}}
  </div>
  @endif @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif @foreach($data as $product_value) @php if($product_value->status == 2){ $disabled = "disabled" ; }else{
  $disabled = ""; } @endphp @if($product_value->status == 0)<span
    style="margin-top: 7px; display: inline-block;font-size: unset;float: right;color: orange  ;font-weight: bold;">Your
    Product is Pending</span> @elseif($product_value->status == 1)<span
    style="margin-top: 7px; display: inline-block;font-size: unset;float: right;color: green;font-weight: bold;">Your
    Product is Live</span> @else
  <span style="margin-top: 7px; display: inline-block;font-size: unset;float: right;color: red;font-weight: bold;">Your
    Product is Rejected</span>@endif

  <label class="switch">
    <input type="checkbox" @if($product_value->status == 0){}@elseif($product_value->status == 2){}@else checked @endif
    disabled>
    <span class="slider round"></span>
  </label>
  <form id="edit_product" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>EDIT PRODUCT</b></legend>

      <!-- Select Basic -->
      @php $data = DB::table('laravelproject_new_store_register')->select('store_name')->where('user_id',
      session::get('user')->id)->get(); $data_category =
      DB::table('laravelproject_new_store_category')->select('*')->where('store_owner_id',
      session::get('store_id'))->where('admin_approve', '1')->get(); @endphp
      <div class="form-group">
        <label class="col-md-4 control-label" for="store_name">Store Name</label>
        <div class="col-md-4">
          <select id="store_name" name="store_name" class="form-control" {{$disabled}}>

            <option value="{{$product_value->store_name}}">{{$product_value->store_name}}</option>

          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="category_name">Product Category</label>
        <div class="col-md-4">
          <select id="category_name" name="category_name" class="form-control" {{$disabled}}>
            @foreach($data_category as $value):
            <option value="{{$value->category_id}}" @if($value->category_id == $product_value->category) {{"selected"}}
              @endif>{{ucwords(str_replace("_"," ",$value->category_name))}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="category_name">Is Food</label>
        <div class="col-md-4">
          <select id="is_food" name="is_food" class="form-control" required>
            <option value="0" @if($product_value->if_food == 0 ) {{'selected'}} @endif >No</option>
            <option value="1" @if($product_value->if_food == 1 ) {{'selected'}} @endif >Yes</option>

          </select>
        </div>
      </div>

      <style>
        .bootstrap-tagsinput {
          background-color: #fff;
          border: 1px solid #ccc;
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          display: block;
          padding: 4px 6px;
          color: #555;
          vertical-align: middle;
          border-radius: 4px;
          max-width: 100%;
          line-height: 22px;
          cursor: text;
        }

        .bootstrap-tagsinput input {
          border: none;
          box-shadow: none;
          outline: none;
          background-color: transparent;
          padding: 0 6px;
          margin: 0;
          width: auto;
          max-width: inherit;
        }
      </style>

      <div class="form-group">
        <label class="col-md-4 control-label" for="category_name">Colors</label>
        <div class="col-md-4">
          <input type="text" value="@if(!empty($colors_sizes->colors)){{$colors_sizes->colors}} @endif" data-role="tagsinput" id="tags" name="colors"
            data-role="tagsinput" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="category_name">Sizes</label>
        <div class="col-md-4">
          <input type="text" value=""@if(!empty($colors_sizes->sizes)){{$colors_sizes->sizes}} @endif" data-role="tagsinput" id="tags" name="sizes"
            data-role="tagsinput" class="form-control">
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
        <div class="col-md-4">
          <input id="product_name" value="{{$product_value->title}}" {{$disabled}} name="title"
            placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_price">PRODUCT PRICE</label>
        <div class="col-md-4">

          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input id="product_price" value="{{$product_value->price}}" {{$disabled}} name="price"
              placeholder="PRODUCT PRICE" class="form-control input-md" required="" type="number">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="discount_price">DISCOUNT PRICE</label>
        <div class="col-md-4">

          <div class="input-group" style="margin-bottom: 15px;">
            <span class="input-group-addon">$</span>
            <input id="discount_price" value="{{$product_value->discount_price}}" name="discount_price"
              placeholder="DISCOUNT PRICE" class="form-control input-md" required="" type="number">
          </div>
        </div>
      </div>

      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_description" required>PRODUCT DESCRIPTION</label>
        <div class="col-md-4">
          <textarea cols="3" rows="7" class="form-control" {{$disabled}} id="product_description"
            name="description">{{$product_value->description}}</textarea>
        </div>
      </div>

      <!-- File Button -->
      <div class="form-group">
        <h4 class="col-md-4 col-md-offset-3" style="margin-left: 23%">Featured Image</h4>
        <label class="filiiii ">Choose file
          <input type="file" {{$disabled}} class="featured_image" name="featured_image" value=""
            onchange="readURL(this);">
          <span class="file-uploadd1" style="float: left; padding-left: 10px;"></span>
        </label>
        <br>
        <div class="col-md-4 col-md-offset-4">
          <img id="upload" style="height:200px" src="{{asset('/')}}{{$product_value->featured_image}}"
            class="avatar img-square img-thumbnail" alt="avatar">
        </div>
      </div>

      <!-- File Button -->
      <!-- <div class="form-group" >
 <h4 class="col-md-4 col-md-offset-3" style="margin-left: 23%">Multi-Images</h4>
 <label class="filiiii">Choose file
    					<input type="file" multiple class="multi_image"  name="multi_image[]" value="" >
    					<span  class="file-uploadd1" style="float: left; padding-left: 10px;"></span>
  </label><br>
  <div class="col-md-4 col-md-offset-4" >

  </div>
</div> -->

      <script>
        function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#upload')
                                .attr('src', e.target.result)
                                .width(150)
                                .attr('style', "display:block;height:200px");
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
      </script>

      <script>
        $(function() {
                    $(".multi_image").change(function() {
                        if (this.files && this.files[0]) {
                            for (var i = 0; i < this.files.length; i++) {
                                var reader = new FileReader();
                                reader.onload = imageIsLoaded;
                                reader.readAsDataURL(this.files[i]);
                            }
                        }
                    });
                });

                function imageIsLoaded(e) {
                    $('#myImg').append('<img style="height:100px;width: 100px;" src="' + e.target.result + '" class="avatar img-square img-thumbnail" alt="avatar">');
                };
      </script>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
          <button id="singlebutton" value="singlebutton" name="singlebutton" {{$disabled}}
            class="btn btn-primary">SAVE</button>
          <button id="singlebutton" type="reset" {{$disabled}} name="singlebutton"
            class="btn btn-warning">Reset</button>
        </div>
      </div>

    </fieldset>
  </form>
  @endforeach

  <script>
    $("#edit_product").validate({
            rules: {
                category_name: {
                    required: true,
                    maxlength: 30,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                store_name: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                is_food: {
                    required: true,
                    digits: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                title: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                price: {
                    required: true,
                    digits: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                discount_price: {
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
                featured_image: {
                    required: true,
                    accept: "jpg,png,jpeg,gif",
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },

            }
        });
  </script>
  @include('elite.store_owner.footer')