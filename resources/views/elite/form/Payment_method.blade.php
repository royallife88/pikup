<!DOCTYPE html>
<html lang="en">
@include('elite.header')
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Payment_Method</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script>
      $(document).ready(function() {
      $('.bluessss').hide();
      $('.blues').hide();
          $('.redssss').on('click', function(){
              $('.bluessss').show();
              $('.blues').hide();
          });
          $('.reds').on('click', function(){
              $('.blues').show();
              $('.bluessss').hide();
          });
        });

      </script>
 
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
        <td>{{$email}}</td>
     
      </tr>
      <tr>
        <th>Shipping Address</th>
        <td>{{$all_data}}</td>
      
      </tr>
      <tr>
        <th>Shipping Method</th>
        <td>Free 10 to 20 Business Days</td>
      </tr>
    </tbody>
  </table>
  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr/" method="post" id="your_form">
  <p style="font-size: 18px; font-weight: bold;">Payment Method</p>
  <div class="row redssss" style="border: 1px solid lightgray; border-radius: 2px; margin-right: 5px; margin-left: 10px;">
    <div class="col-md-6">
      <input type="checkbox" name="paypal" id="" value="paypal" checked><img src="asserts/images/paypal.png" alt="images" width="130px;" height="60px;">
    </div>
  </div>
  <div class="row bluessss" style="border: 1px solid lightgray; margin-right: 5px; margin-left: 10px; background: #f5f5f5;">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="paypal">
      <img src="asserts/images/PayPalCard.png" alt="images" width="100%;" height="100px;">
      <p style="text-align: center; font-size: 12px; margin-bottom: 40px;">You will be redirect to paypal to complete your purchase securely</p>
      </div>
    </div>
       
    <div class="col-md-6">
    @if(Cart::content()!=null)    
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="ahmaddastageer32-facilitator@gmail.com">
@php $count = 0; @endphp
@foreach(Cart::content() as $cart_value)
@php $count++; @endphp
<input type="hidden" name="item_name_{{$count}}" value="{{$cart_value->name}}">
<input type="hidden" name="item_number_{{$count}}" value="{{$cart_value->id}}">
<input type="hidden" name="amount_{{$count}}" value="{{$cart_value->price}}">
<input type="hidden" name="quantity_{{$count}}" value="{{$cart_value->qty}}">
@endforeach
<input type="hidden" name="receiver_email" value="{{$email}}">
<input type="hidden" name="notify_url" value="https://e80d8738.ngrok.io/myproject/public/ipn/">
<input type="hidden" name="cancel_return" value="https://localhost/myproject/public/ViewCart">
<input type="hidden" name="return" value="https://localhost/myproject/public/order/">
<input type="hidden" name="no_shipping" value="1" />
<input type="hidden" name="no_note" value="1" />
<input type="hidden" name="currency_code" value="USD">
<div class="pull-right">
<input type="submit" name="submit" value="payment" id="submit" style="margin-right:-235px">
</div>
  </form>
				@endif
    </div>
                                   
    <div class="col-md-3"></div>
  </div>
  <div class="row reds" style="border: 1px solid lightgray; border-radius: 2px; margin-right: 5px; margin-left: 10px; margin-top: 40px;">
    <div class="col-md-6">
      <input type="checkbox" name="master" id="" value="master"><img src="asserts/images/mc_hrz_thmb_282_2x.png" alt="images" width="180px;" height="50px;" style="margin: 5px 0px;">
    </div>
  </div>
  
  <div class="row blues" style="border: 1px solid lightgray; margin-right: 5px; margin-left: 10px; background: #f5f5f5;">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="paypal">
      <img src="asserts/images/mastercard_PNG16.png" alt="images" width="100%;" height="100px;">
      <p style="text-align: center; font-size: 12px; margin-bottom: 40px;">You will be redirect to paypal to complete your purchase securely</p>
      </div>
      @if(Cart::content()!=null)
<div class="pull-right">
<a href="{{url('authorize?method=master')}}"><input type="submit" name="submit" value="payment" id="submit" style="margin-right:-100px"></a>
</div>
  <                         
				@endif
    </div>
    <div class="col-md-3"></div>
  </div>
  <div class="row">
    <div class="col-md-5">
    </div>
    <div class="col-md-7">
      <div style="float: right;"><input type="checkbox" name="Regis_me" value="Regis_me" required><span> I have Read the <a href="#!"> Terms & Conditions</a></span></div>
      <p style="font-size: 12px; float: right; color: red;">Please accept Terms and conditions by checking the box</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
       <a href="javascript:history.go(-1)" style="margin-top: 40px; display: inline-block;"><i class="fa fa-chevron-left" aria-hidden="true"></i> Return to shipping method</a>
    </div>
 
  </div>
  <script>

</script>
    </div>
          </div>
        </div>
      </div>
      <div class="col-md-6" style="background: #f5f5f5;">
        <div class="row">
          <div class="col-md-12">
            <div class="right_div">
            @foreach($cart as $items)
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
  </body>
</html>
<script>
window.alert = function(){
return true;
}
</script>
@include('elite.footer')