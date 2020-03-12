@include('elite.admin.header')

<div class="container">
  <!-- Tables -->
  <h1>{{ucwords(str_replace('_', ' ', collect(request()->segments())->last()))}}</h1>
  <table class="table table-striped">

    <thead>
      <tr>

        <th scope="col">category Id</th>
        <th scope="col">@if(collect(request()->segments())->last() == "store_categorie")
          {{str_replace('_categorie', ' ', collect(request()->segments())->last())}} Owner Id
          @elseif(collect(request()->segments())->last() == "service_categorie")
          {{str_replace('_categorie', ' ', collect(request()->segments())->last())}} Owner Id @else Restaurant Owner Id
          @endif</th>
        <th scope="col">category Name</th>
        <th scope="col">category Image</th>
        <th scope="col">Change Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    @php $count = 0; @endphp
    @foreach($all_data as $value)

    <tbody>
      <tr>
        <th scope="row">{{$value->category_id}}</th>
        <td>
          @if(!empty($value->store_owner_id)){{$value->store_owner_id}}@elseif(!empty($value->store_id)){{$value->store_id}}@endif
        </td>
        <td>{{$value->category_name}}</td>
        <td><img src="{{asset($value->image)}}" alt="" style="height:40px;width:auto;border-radius:40px;"></td>
        <form id="form{{$count}}" method="post" action="{{route('admin.categorie_status_update')}}">
          @csrf
          <td><select name="admin_approve">
              <option value="1" @if($value->admin_approve == '1') {{"selected"}} @endif>Approved</option>
              <option value="0" @if($value->admin_approve == '0') {{"selected"}} @endif>Pending</option>
            </select>
            <input type="hidden" name="category_id" value="{{$value->category_id}}">
            @if(!empty($value->store_owner_id)) <input type="hidden" name="store_owner_id"
              value="{{$value->store_owner_id}}"> @elseif(!empty($value->store_id)) <input type="hidden" name="store_id"
              value="{{$value->store_id}}"> @else <input type="hidden" name="restaurant_owner_id"
              value="{{$value->restaurant_owner_id}}"> @endif
        </form>
        </td>
        <td><a style='text-decoration: none;' href="#" onclick="document.getElementById('form{{$count}}').submit();"><i
              class="fa fa-upload" title="update" aria-hidden="true"></i></a> <a style='text-decoration: none;'
            href="{{url('delete_message')}}" onClick="return confirm('Do You Want To Delete This?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
    </tbody>
    @php $count++; @endphp
    @endforeach

  </table>
</div>

</html>

@include('elite.admin.footer')