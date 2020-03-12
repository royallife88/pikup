@include('elite/admin/header')

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

  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>ADD User</b></legend>


      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="user_name">FULL NAME</label>
        <div class="col-md-4">
          <input id="user_name" name="name" placeholder="User Name" class="form-control input-md" required=""
            type="text">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="user_name">EMAIL</label>
        <div class="col-md-4">
          <input id="user_name" name="email" placeholder="User Email" class="form-control input-md" required=""
            type="text">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="password">Password</label>
        <div class="col-md-4">
          <input id="password" name="password" placeholder="password" class="form-control input-md" required=""
            type="password">

        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="confirm-Password">Confirm Password</label>
        <div class="col-md-4">
          <input id="confirm-Password" name="cpassword" placeholder="Confirm Password" class="form-control input-md"
            required="" type="password">

        </div>
      </div>
      <!-- Text input-->

      <div class="form-group">
        <label class="col-md-4 control-label" for="main_categorie">VERIFI_STATUS</label>
        <div class="col-md-4">
          <select id="main_categorie" name="status" class="form-control">
            <option value="0">0</option>
            <option value="1">1</option>
          </select>
        </div>
      </div>


      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_categorie">IS_ADMIN</label>
        <div class="col-md-4">
          <select id="product_categorie" name="admin" class="form-control">
            <option value="0">0</option>
            <option value="1">1</option>
          </select>
        </div>
      </div>
      <!-- Select Basic -->

      <!-- File Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="image">main_image</label>
        <div class="col-md-4">
          <input type="file" name="image" class="input-file" onchange="readURL(this);">
          <img id="blah" height="200px" width="150px"
            src="https://openclipart.org/image/2400px/svg_to_png/211821/matt-icons_preferences-desktop-personal.png"
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
      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
          <button id="singlebutton" name="singlebutton" class="btn btn-primary">ADD</button>
          <button id="singlebutton" type="reset" name="singlebutton" class="btn btn-warning">Reset</button>
        </div>
      </div>

    </fieldset>
  </form>

  @include('elite.admin.footer')