@include('elite/admin/header')

<body style="height:900px;
  width: 100%;  
  overflow-y: scroll;
  overflow-x:hidden">
  @if(Session::has('updated'))
  <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-check"></i> {{Session::get('updated')}}
  </div>
  @endif @foreach($data as $product_value)
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <fieldset>
      {{csrf_field()}}
      <!-- Form Name -->
      <legend style="text-align:center"><b>Edit User</b></legend>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="user_id">USER ID</label>
        <div class="col-md-4">
          <input id="user_id" value="{{$product_value->id}}" name="id" placeholder="User ID"
            class="form-control input-md" required="" type="text" disabled>

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="user_name">NAME</label>
        <div class="col-md-4">
          <input id="user_name" value="{{$product_value->name}}" name="name" placeholder="User NAME"
            class="form-control input-md" required="" type="text" disabled>

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="user_name">EMAIL</label>
        <div class="col-md-4">
          <input id="user_name" value="{{$product_value->email}}" name="email" placeholder="User NAME"
            class="form-control input-md" required="" type="text" disabled>

        </div>
      </div>
      <!-- Text input-->

      <div class="form-group">
        <label class="col-md-4 control-label" for="main_categorie">VERIFY STATUS</label>
        <div class="col-md-4">
          <select id="main_categorie" name="status" class="form-control">
            <option value="{{$product_value->status}}">{{$product_value->status}}</option>
            <option value="0">Pending</option>
            <option value="1">Approved</option>
          </select>
        </div>
      </div>

      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="product_categorie">IS_ADMIN</label>
        <div class="col-md-4">
          <select id="product_categorie" name="admin" class="form-control">
            <option value="{{$product_value->admin}}">{{$product_value->admin}}</option>
            <option value="0">Pending</option>
            <option value="1">Approved</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="product_categorie">IS_Service_Owner</label>
        <div class="col-md-4">
          <select id="product_categorie" name="service_owner" class="form-control">
            <option value="{{$product_value->service_owner}}">{{$product_value->service_owner}}</option>
            <option value="0">Pending</option>
            <option value="1">Approved</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="product_categorie">IS_Restaurants_Owner</label>
        <div class="col-md-4">
          <select id="product_categorie" name="restaurant" class="form-control">
            <option value="{{$product_value->restaurant}}">{{$product_value->restaurant}}</option>
            <option value="0">Pending</option>
            <option value="1">Approved</option>
          </select>
        </div>
      </div>

      <!-- Select Basic -->

      <script>
        function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
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
          <button id="singlebutton" name="singlebutton" class="btn btn-primary">Edit</button>
          <button id="singlebutton" type="reset" name="singlebutton" class="btn btn-warning">Reset</button>
        </div>
      </div>

    </fieldset>
  </form>
  @endforeach @include('elite.admin.footer')