@include('elite/store_owner/header')

<body class="">
  @if(Session::has('add_categorie_success'))
  <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-check"></i> {{Session::get('add_categorie_success')}}
  </div>
  @endif @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

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
  </style>
  <form id="edit_service" class="form-horizontal" action="{{route('service_owner.service_category_edited') }}"
    method="post" enctype="multipart/form-data">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>Edit CATEGORY</b></legend>
      <input type="hidden" name="category_id" value="{{$service_category->category_id}}">
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="categorie_name">CATEGORY NAME</label>
        <div class="col-md-4">
          <input id="categorie_name" value="{{$service_category->category_name}}" name="category_name"
            placeholder="CATEGORY NAME" class="form-control input-md" required="" type="text">

        </div>
      </div>
      <!-- File Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="image">Category image</label>
        <div class="col-md-4">
          <input type="file" required name="image" class="input-file" onchange="readURL(this);">
          <img id="blah" height="200px" width="150px" style="display:none;" src="#!"
            class="avatar img-square img-thumbnail" alt="avatar">
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
                                .height(200)
                                .attr('style', "display:block;");
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

  <script>
    $("#edit_service").validate({
            rules: {
                category_name: {
                    required: true,
                    maxlength: 20,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                image: {
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