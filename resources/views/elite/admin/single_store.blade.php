@include('elite.admin.header')

<div class="container">
  <!-- Tables -->
  <h1>All Stores</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Store Name</th>
        <th scope="col">store_owner Id</th>
        <th scope="col">Store Address</th>
        <th scope="col">Store Description</th>
        <th scope="col">Store Category</th>
        <th scope="col">Store Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    </form>
    <tbody>
      <tr>
        <th scope="row">{{$store_data->store_name}}</th>
        <td>{{$store_data->store_owner_id}}</td>
        <td>{{$store_data->store_address}}</td>
        <td>{{$store_data->store_desc}}</td>
        <td>{{$store_data->store_category}}</td>
        <form id="form1" method="post" action="{{route('admin.store_status_update')}}">
          @csrf
          <td><select name="status">
              <option value="1" @if($store_data->status == '1') {{"selected"}} @endif>Approved</option>
              <option value="0" @if($store_data->status == '0') {{"selected"}} @endif>Pending</option>
              <option value="2" @if($store_data->status == '2') {{"selected"}} @endif>Reject</option>
            </select>
            <input type="hidden" name="store_id" value="{{$store_data->store_id}}">
        </form>
        </td>

        <td><a style='text-decoration: none;' href="#" onclick="document.getElementById('form1').submit();"><i
              class="fa fa-upload" title="update" aria-hidden="true"></i></a> <a style='text-decoration: none;'
            href="{{url('delete_message')}}" onClick="return confirm('Do You Want To Delete This?')"><i
              class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
    </tbody>
  </table>
</div>

</html>


@include('elite.admin.footer')