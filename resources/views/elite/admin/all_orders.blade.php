@include('elite.admin.header')


<div class="container pull-left">
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
        <th scope="col">Created_at</th>
        <th scope="col">Updated_at</th>
      </tr>
    </thead>

    @foreach($all_orders as $value)
    <tbody>
      <tr>
        <th scope="row" id="{{$value->id}}">{{$value->id}}</th>
        <td>{{$value->customer_id}}</td>
        <td>{{$value->store_id}}</td>
        <td>{{$value->dropoff_location}}</td>
        <td>{!! App\Laravelproject_new_add_product::where('p_id', $value->product_id)->select('price')->first()->price  !!}</td>
        <td>{{$value->product_id}}</td>
        <td>{{$value->payment_method}}</td>
        <td>{{$value->payment_status}}</td>
        <td>{{$value->created_at}}</td>
        <td>{{$value->updated_at}}</td>

      </tr>
    </tbody>
    @endforeach

  </table>
</div>
</body>

</html>

@include('elite.admin.footer')