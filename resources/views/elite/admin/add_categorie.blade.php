@include('elite/admin/header')


<body class="">
  @if(Session::has('add_categorie_success'))
  <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-check"></i>
    {{Session::get('add_categorie_success')}}
  </div>
  @endif

  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>Add CATEGORIE</b></legend>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="categorie_name">CATEGORIE NAME</label>
        <div class="col-md-4">
          <input id="categorie_name" value="" name="categorie_name" placeholder="CATEGORIE NAME"
            class="form-control input-md" required="" type="text">

        </div>
      </div>


      <!-- File Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="image">Categorie image</label>
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