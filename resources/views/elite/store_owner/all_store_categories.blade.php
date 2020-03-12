@include('elite.store_owner.header')

<div class="container">
  @if(Session::has('deleted_categorie_success'))
  <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-check"></i>
    {{Session::get('deleted_categorie_success')}}
  </div>
  @endif
  <!-- Tables -->
  <h1>All Categories</h1>
  <table class="table table-striped">

    <thead>
      <tr>
        <th scope="col">Categorie Id</th>
        <th scope="col">Categorie Name</th>
        <th scope="col">Categorie Image</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    @foreach($all_data as $value)
    <tbody>
      <tr>
        <th scope="row">{{$value->category_id}}</th>
        <td>{{$value->category_name}}</td>
        <td><img src="{{asset($value->image)}}" alt="" style="height:40px;width:auto;border-radius:40px;"></td>
        <td>@php if($value->admin_approve == "1"){ echo "approved"; }elseif($value->admin_approve == "0"){echo
          "pending";}else{echo "rejected";} @endphp</td>
        <td><a style='text-decoration: none;'
            href="{{route('store_owner.store_category_edit',[ 'id' => $value->category_id]) }}"><i class="fa fa-edit"
              aria-hidden="true"></i></a> <a style='text-decoration: none;'
            href="{{route('store_owner.store_category_delete', ['id' => $value->category_id])}}"
            onClick="return confirm('Do You Want To Delete This?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>

</html>

@include('elite.store_owner.footer')