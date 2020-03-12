@include('elite.store_owner.header')
<div class="container pull-left" style="width: 100%;">
  <!-- Tables -->
  <h1>All Orders</h1>
  <table class="table table-striped" style=" ">

    <thead>
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Customer ID</th>
        <th scope="col">Store ID</th>
        <th scope="col">Drop off Location</th>
        <th scope="col">Price</th>
        <th scope="col">Product ID</th>
        <th scope="col">Payment Method</th>
        <th scope="col">Payment Status</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Order Action</th>
      </tr>
    </thead>

    @foreach($all_orders as $value)
    <tbody>
      <tr>
        <th scope="row" id="{{$value->id}}">{{$value->id}}</th>
        <td>{{$value->customer_id}}</td>
        <td>{{$value->store_id}}</td>
        <td>{{$value->dropoff_location}}</td>
        <td>{!! App\Laravelproject_new_add_product::where('p_id', $value->product_id)->select('price')->first()->price
          !!}</td>
        <td>{{$value->product_id}}</td>
        <td>{{$value->payment_method}}</td>
        <td>{{$value->payment_status}}</td>
        <td>{{$value->created_at}}</td>
        <td>{{$value->updated_at}}</td>
        <td>
          @if (strval($value->accept_or_reject) == '0')
          <div class="row">
            <div><a disabled class="btn btn-danger"
                href="{{route('store_owner.reject_order', ['order_id' => $value->id, 'product_id' => $value->product_id])}}"><i
                  class="fa fa-times"></i></a></div>
          </div>

          @elseif(strval($value->accept_or_reject) == '1')
          <div class="row">
            <div><a disabled class="btn btn-success"
                href="{{route('store_owner.accept_order', ['order_id' => $value->id, 'product_id' => $value->product_id])}}"><i
                  class="fa fa-check"></i></a></div>
          </div>
          @elseif($value->accept_or_reject == 2)
          <div class="row">
            <div><a class="btn btn-success" style="float:left; margin-right: 5px;"
                href="{{route('store_owner.accept_order', ['order_id' => $value->id, 'product_id' => $value->product_id])}}"><i
                  class="fa fa-check"></i></a></div>
            <div><a class="btn btn-danger"
                href="{{route('store_owner.reject_order', ['order_id' => $value->id, 'product_id' => $value->product_id])}}"><i
                  class="fa fa-times"></i></a></div>
          </div>
          @endif

        </td>

      </tr>
    </tbody>
    @endforeach

  </table>
  <div style="float:right;">
    {{ $all_orders->links()}}
  </div>
</div>
@include('elite.store_owner.footer')
</body>

</html>