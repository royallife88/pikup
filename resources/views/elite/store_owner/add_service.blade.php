@include('elite.store_owner.header')

<body class="" style="height:100%;
  width: 100%;  
  overflow-y: scroll;
  overflow-x:hidden">
  @if(Session::has('add_service_success'))
  <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-check"></i>
    {{Session::get('add_service_success')}}
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
  <form id="add_service" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>Add Service</b></legend>

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



      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="service_name">Service Name</label>
        <div class="col-md-4">
          <input id="service_name" value="" name="service_name" placeholder="Service Name" class="form-control input-md"
            required="" type="text">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="service_category">Service category</label>
        <div class="col-md-4">
          <select id="service_category" name="service_category" class="form-control">
            @foreach($service_categories as $cat):
            <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
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
            <input id="service_charges" value="" name="charges" placeholder="Service Charges"
              class="form-control input-md" required="" type="number">
          </div>
        </div>
      </div>


      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="service_description" required>Service Description</label>
        <div class="col-md-4">
          <textarea cols="3" rows="7" class="form-control" id="service_description" name="description"></textarea>
        </div>
      </div>

      <div class="form-group">
        <h4 class="col-md-4 col-md-offset-3" style="margin-left: 23%">Featured Image</h4>
        <label class="filiiii ">Choose file
          <input type="file" required class="featured_image" name="image" value="" onchange="readURL(this);">
          <span class="file-uploadd1" style="float: left; padding-left: 10px;"></span>
        </label><br>
        <div class="col-md-4 col-md-offset-4">
          <img id="upload" style="display:none;height:100px" src="#!" class="avatar img-square img-thumbnail"
            alt="avatar">
        </div>
      </div>


      <!-- File Button -->
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
    $("#add_service").validate({
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