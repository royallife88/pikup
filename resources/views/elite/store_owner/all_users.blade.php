@include('elite.admin.header')
  <body>
		<!-- Tables -->
<h1>ALL Users</h1>
		<table class="table table-striped">
    
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">image</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
      <th scope="col">Admin</th>
      <th scope="col">Social Login</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
@foreach($all_users as $value)

  <tbody>
    <tr>
      <th scope="row">{{$value->name}}</th>
      <td><img src="{{asset($value->image)}}" alt="" style="height:40px;width:auto;border-radius:40px;"></td>
      <td>{{$value->email}}</td>
      <td>{{$value->status}}</td>
      <td>{{$value->admin}}</td>
      <td>{{$value->social_account_login}}</td>
      <td><a style='text-decoration: none;' href="{{url('/admin/edit_user/'.$value->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a> <a style='text-decoration: none;' href="{{url('/admin/delete_user/'.$value->id)}}" onClick="return confirm('Do You Want To Delete This?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
  </tbody>
@endforeach
</table>
    
  </body>
</html>
@include('elite.admin.footer')