@include('elite.store_owner.header')
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

  .body {
    overflow-y: scroll;
  }

  #discount_price-error {
    position: absolute;
    width: 300px;
    top: 35px;
    left: 0;
  }

  #product_price-error {
    position: absolute;
    width: 300px;
    top: 35px;
    left: 0;
  }
</style>
<link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}">
<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>

<body class="body" style="height:100%;
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

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
  </div>
  @endif


  <form id="add_product" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>Add PRODUCT</b></legend>


      <!-- Select Basic -->
      @php $data = DB::table('laravelproject_new_store_register')->select('store_name')->where('user_id',
      session::get('user')->id)->get();
      $data_category = DB::table('laravelproject_new_store_category')->select('*')->where('store_owner_id',
      session::get('store_id'))->where('admin_approve', '1')->get(); @endphp

      <div class="form-group">
        <label class="col-md-4 control-label" for="store_name">Store Name</label>
        <div class="col-md-4">
          <select id="store_name" name="store_name" class="form-control">
            @foreach($data as $value):
            <option value="{{$value->store_name}}">{{$value->store_name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="category_name">Product Category</label>
        <div class="col-md-4">
          <select id="category_name" name="category_name" class="form-control">
            @foreach($data_category as $value):
            <option value="{{$value->category_id}}">{{ucwords(str_replace("_"," ",$value->category_name))}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="category_name">Is Food</label>
        <div class="col-md-4">
          <select id="is_food" name="is_food" class="form-control" required>
            <option value="0" selected>No</option>
            <option value="1">Yes</option>

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
          <input type="text" value="" data-role="tagsinput" id="tags" name="colors" data-role="tagsinput"
            class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="category_name">Sizes</label>
        <div class="col-md-4">
          <input type="text" value="" data-role="tagsinput" id="tags" name="sizes" data-role="tagsinput"
            class="form-control">
        </div>
      </div>



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

          <div class="input-group" style="margin-bottom: 15px;">
            <span class="input-group-addon">$</span>
            <input id="product_price" value="" name="price" placeholder="PRODUCT PRICE" class="form-control input-md"
              required="" type="number">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="discount_price">DISCOUNT PRICE</label>
        <div class="col-md-4">

          <div class="input-group" style="margin-bottom: 15px;">
            <span class="input-group-addon">$</span>
            <input id="discount_price" value="" name="discount_price" placeholder="DISCOUNT PRICE"
              class="form-control input-md" required="" type="number">
          </div>
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
        <h4 class="col-md-4 col-md-offset-3" style="margin-left: 23%">Featured Image</h4>
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

      <script>
        $(document).ready(function(){
     $(".multi_image").on('change',function() {
       
     var fileList = this.files;
     for(var i = 0; i < fileList.length; i++){
          var t = window.URL || window.webkitURL;
          var objectUrl = t.createObjectURL(fileList[i]);
          
          $('.removeimg').fadeIn();
          $('#myImg').append('<div class="img-wrap img_'+i+'"><span class="remove_img img_'+i+'" onclick="del('+i+')" style="cursor:pointer;"><b>x</b></span><img style="height:100px;width: 100px;" class="img_'+i+'" src="' + objectUrl + '" "></div>');
          j = i+1;
          if(j % 3 == 0)
          {
            $('#myImg').append('');
          }
        }
      
    });
});

function del(i){ 
    $('.img_'+i).fadeOut("slow", function() {
      var names = [];
    for (var j = 0; j < $(".multi_image").get(0).files.length; ++j) {
        names.push($(".multi_image").get(0).files[j].name);
    }
    names.splice(i, 1);
  
  
    $('.img_'+i).remove();
    });
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

  <script>
    $("#add_product").validate({
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
            accept:"jpg,png,jpeg,gif",
            normalizer: function(value) {
                return $.trim(value);
            }
        },
    }
});
  </script>
  @include('elite.store_owner.footer')