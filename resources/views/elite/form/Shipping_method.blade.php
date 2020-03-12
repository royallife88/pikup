<!DOCTYPE html>
<html lang="en">
@include('elite/header')
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Shipping_Method</title>
    <!-- Custom styles for this template -->
    <link href="{{asset('theme.css')}}" rel="stylesheet">
    <link href="{{asset('asserts/css/style.css')}}" rel="stylesheet">
    <script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
    <style type="text/css">
      .navbar-toggle{
        background: gray;
      }
        .icon-bar{
          color:#fff;
        }

    </style>
  </head>
  <body onload="myFunction()" style="margin:0;">
    <div id="loader"></div>
    <div class="container">
    <div class="row animate-bottom" style="display:none;" id="myDiv">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">

          @include('elite.form.cart_nav')
    <div class="formss">
    <table class="table">
      <tbody>
      <tr>
        <th>Contact Information</th>
        <td>{{$cust_info->email}}</td>
      </tr>
      <tr>
        <th>Shipping Address</th>
        <td>{{$cust_info->fname}} {{$cust_info->lname}}, {{$cust_info->address}} {{$cust_info->country}}</td>
      </tr>
    </tbody>
  </table>
  <p style="font-size: 18px; font-weight: bold;">Shipping Method</p>
  <div class="row" style="border: 1px solid lightgray; border-radius: 2px; margin-right: 5px; margin-left: 10px;">
    <div class="col-md-6">
      <i class="fa fa-dot-circle-o" aria-hidden="true" style="margin-right: 10px; margin-top: 10px; font-size: 18px;"></i><span><b style="font-size: 18px;">Free</b></span>
      <h6 style="margin-left: 25px; margin-top: 0px;">10 to 20 business days</h6>
    </div>
    <div class="col-md-6">
      <p style="font-size: 18px; float: right; margin-top: 15px;">Free</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
       <a href="javascript:history.go(-1)" style="margin-top: 40px; display: inline-block;"><i class="fa fa-chevron-left" aria-hidden="true"></i> Return to customer information</a>
    </div>
    <div class="col-md-6">
    <form action="" method="POST" enctype="">
      {{csrf_field()}}
      <input type="hidden" name="email" value="{{$cust_info->email}}">
      <input type="hidden" name="all_data" value="{{$cust_info->fname}} {{$cust_info->lname}}, {{$cust_info->address}} {{$cust_info->country}}">
    <input type="submit" name="submit" value="Continue to payment method">
    </form>
    </div>
  </div>
    
    </div>
          </div>
        </div>
      </div>
      <div class="col-md-6" style="background: #f5f5f5;">
        <div class="row">
          <div class="col-md-12">
            <div class="right_div">
            @foreach(Cart::content() as $items)
              <div class="row" style="float:left;margin-top:-50px;">
                <div class="col-md-2">
                  <img src="{{$items->options->image}}" alt="images"><span class="badge" style="float: right;margin-left: 60px;position: absolute;top: 38px;">{{$items->qty}}</span>
                  
                </div>
                  <div class="col-md-6">
                  <p style="font:size:12px;">{{$items->name}}</p>
                </div>
                
                <div class="col-md-4">
                  <p style="margin-top: 55px; font-size: 19px; float: right;">Rs.{{$items->subtotal}}</p>
                </div>
              </div>
              
      @endforeach        
      @php $totl = str_replace(',', '', substr(Cart::total(), 0, -3)) - str_replace(',', '', substr(Cart::tax(), 0, -3)) @endphp
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <h4>Subtotal</h4>
                </div>
                <div class="col-md-6">
                  <h4 style="float: right;">${{$totl}}</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <h4>Shipping</h4>
                </div>
                <div class="col-md-6">
                  <h4 style="float: right;">$0</h4>
                </div>
              </div>
              <div class="row" style="margin-bottom: 315px;">
                <div class="col-md-6">
                  <p>You Pay</p>
                </div>
                <div class="col-md-6">
                  <p style="float: right;">${{$totl}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-7">
                  <a href="#!" style="float: right;
    font-size: 15px;
    margin-top: -5px;">Refund policy</a>
                </div>
                <div class="col-md-5">
                  <h6 style="text-align: center;
    font-size: 15px;
    margin-top: 0px;
    margin-bottom: 20px"> Contact Us: +6123232389</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="asserts/js/bootstrap.min.js"></script>
  </body>
</html>
