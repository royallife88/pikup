@include('elite.admin.header')

<body>
  <!-- Tables -->
  <div class="col-md-12">
    <h1>{{ ucwords(str_replace('_', ' ', collect(request()->segments())->last()))  }} </h1>
    <table class="table table-striped" style="text-align:center">

      <thead>
        <tr>
          <th scope="col">Name</th>

          <th scope="col">Email</th>
          <th scope="col">Email verify Status</th>
          <th scope="col">Blocked</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      @foreach($all_users as $value)

      <tbody>
        <tr>
          <th scope="row">{{$value->name}}</th>

          <td style="text-align:left">{{$value->email}}</td>
          <td>@if($value->status == 1)<a href="#" class="badge badge-success">Verified</a>@elseif($value->status == 2)<a
              href="#" class="badge badge-danger">Rejected</a>@else<a href="#" class="badge badge-warning">Not
              Verify</a>@endif</td>
          <td>@if($value->blocked == 1){{"Yes"}}@else{{"No"}}@endif</td>
          <td><a style='text-decoration: none;' href="{{url('/admin/edit_customer/'.$value->id)}}"><i class="fa fa-edit"
                aria-hidden="true"></i></a> <a style='text-decoration: none;'
              href="{{url('/admin/delete_customer/'.$value->id)}}"
              onClick="return confirm('Do You Want To Delete This?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</body>

</html>
@include('elite.admin.footer')