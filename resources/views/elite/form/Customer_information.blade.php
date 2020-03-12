
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
    <link rel="icon" href="{{asset('favicon.ico')}}">

    <title>Customer_Information</title> 
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
      <p style="margin-top: -15px;
    font-size: 17px;
    font-weight: bold;margin-bottom: 20px;">Contact Information</p> 
    <div class="formss">
      <p style="float: right; margin-right: 6px;@if(!empty(session('user')->id))display:none @endif" >Already have an account <a href="#!">Login</a></p>
    <form action="Cart" method="POST" enctype="">
      {{csrf_field()}}
   
      <input type="email" name="email" id="name" value=" @if(!empty(session('user')->id)){{session('user')->email}} @endif" placeholder="Email" required >
      <input type="checkbox" name="Regis_me" value="true" id="hideshow" @if(!empty(session('user')->id)) style="display:none" @endif><span @if(!empty(session('user')->id)) style="display:none" @endif>Register Me</span>
      <div class="row" id="content">
      <div class="col-md-6">
        <input type="password" name="password" placeholder="Password">
      </div>
      <div class="col-md-6">
        <input type="password" name="cpassword" placeholder="Confirm Password">
      </div>
    </div>

    <p style="
    font-size: 17px;
    font-weight: bold; margin-top: 25px;">Shipping Address</p>

    <div class="row">
      <div class="col-md-6">
        <input type="text" name="fname" value="@if(isset($data->fname)){{$data->fname}}@endif" placeholder="First Name" required>
      </div>
      <div class="col-md-6">
        <input type="text" name="lname" placeholder="Last Name" value="@if(isset($data->lname)){{$data->lname}}@endif" required>
      </div>
    </div>
    <div class="row" style="margin-top: 10px;">
      <div class="col-md-8">
        <input type="text" name="address" placeholder="Address" value="@if(isset($data->address)){{$data->address}}@endif" required>
      </div>
      <div class="col-md-4">
        <input type="number" name="apt" value="@if(isset($data->apt)){{$data->apt}}@endif" placeholder="Apt.Suit etc (Optional)">
      </div>
    </div>
    <input type="text" name="city" id="name" placeholder="City" value="@if(isset($data->city)){{$data->city}}@endif" required style="margin-top: 10px;">
    <div class="row" style="margin-top: 10px;">
      <div class="col-md-6">
        <select name="country" value="@if(isset($data->country)){{$data->country}}@endif" required>
  <option value="Afghanistan">Afghanistan</option>
  <option value="Åland Islands">Åland Islands</option>
  <option value="Albania">Albania</option>
  <option value="Algeria">Algeria</option>
  <option value="American Samoa">American Samoa</option>
  <option value="Andorra">Andorra</option>
  <option value="Angola">Angola</option>
  <option value="Anguilla">Anguilla</option>
  <option value="Antarctica">Antarctica</option>
  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
  <option value="Argentina">Argentina</option>
  <option value="Armenia">Armenia</option>
  <option value="Aruba">Aruba</option>
  <option value="Australia">Australia</option>
  <option value="Austria">Austria</option>
  <option value="Azerbaijan">Azerbaijan</option>
  <option value="Bahamas">Bahamas</option>
  <option value="Bahrain">Bahrain</option>
  <option value="Bangladesh">Bangladesh</option>
  <option value="Barbados">Barbados</option>
  <option value="Belarus">Belarus</option>
  <option value="Belgium">Belgium</option>
  <option value="Belize">Belize</option>
  <option value="Benin">Benin</option>
  <option value="Bermuda">Bermuda</option>
  <option value="Bhutan">Bhutan</option>
  <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
  <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
  <option value="Botswana">Botswana</option>
  <option value="Bouvet Island">Bouvet Island</option>
  <option value="Brazil">Brazil</option>
  <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
  <option value="Brunei Darussalam">Brunei Darussalam</option>
  <option value="Bulgaria">Bulgaria</option>
  <option value="Burkina Faso">Burkina Faso</option>
  <option value="Burundi">Burundi</option>
  <option value="Cambodia">Cambodia</option>
  <option value="Cameroon">Cameroon</option>
  <option value="Canada">Canada</option>
  <option value="Cape Verde">Cape Verde</option>
  <option value="Cayman Islands">Cayman Islands</option>
  <option value="Central African Republic">Central African Republic</option>
  <option value="Chad">Chad</option>
  <option value="Chile">Chile</option>
  <option value="China">China</option>
  <option value="Christmas Island">Christmas Island</option>
  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
  <option value="Colombia">Colombia</option>
  <option value="Comoros">Comoros</option>
  <option value="Congo">Congo</option>
  <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
  <option value="Cook Islands">Cook Islands</option>
  <option value="Costa Rica">Costa Rica</option>
  <option value="Côte d'Ivoire">Côte d'Ivoire</option>
  <option value="Croatia">Croatia</option>
  <option value="Cuba">Cuba</option>
  <option value="Curaçao">Curaçao</option>
  <option value="Cyprus">Cyprus</option>
  <option value="Czech Republic">Czech Republic</option>
  <option value="Denmark">Denmark</option>
  <option value="Djibouti">Djibouti</option>
  <option value="Dominica">Dominica</option>
  <option value="Dominican Republic">Dominican Republic</option>
  <option value="Ecuador">Ecuador</option>
  <option value="Egypt">Egypt</option>
  <option value="El Salvador">El Salvador</option>
  <option value="Equatorial Guinea">Equatorial Guinea</option>
  <option value="Eritrea">Eritrea</option>
  <option value="Estonia">Estonia</option>
  <option value="Ethiopia">Ethiopia</option>
  <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
  <option value="Faroe Islands">Faroe Islands</option>
  <option value="Fiji">Fiji</option>
  <option value="Finland">Finland</option>
  <option value="France">France</option>
  <option value="French Guiana">French Guiana</option>
  <option value="French Polynesia">French Polynesia</option>
  <option value="French Southern">French Southern Territories</option>
  <option value="Gabon">Gabon</option>
  <option value="Gambia">Gambia</option>
  <option value="Georgia">Georgia</option>
  <option value="Germany">Germany</option>
  <option value="Ghana">Ghana</option>
  <option value="Gibraltar">Gibraltar</option>
  <option value="Greece">Greece</option>
  <option value="Greenland">Greenland</option>
  <option value="Grenada">Grenada</option>
  <option value="Guadeloupe">Guadeloupe</option>
  <option value="Guam">Guam</option>
  <option value="Guatemala">Guatemala</option>
  <option value="Guernsey">Guernsey</option>
  <option value="Guinea">Guinea</option>
  <option value="Guinea">Guinea-Bissau</option>
  <option value="Guyana">Guyana</option>
  <option value="Haiti">Haiti</option>
  <option value="Heard">Heard Island and McDonald Islands</option>
  <option value="Vatican City State">Holy See (Vatican City State)</option>
  <option value="Honduras">Honduras</option>
  <option value="Hong Kong">Hong Kong</option>
  <option value="Hungary">Hungary</option>
  <option value="Iceland">Iceland</option>
  <option value="India">India</option>
  <option value="Indonesia">Indonesia</option>
  <option value="Iran">Iran, Islamic Republic of</option>
  <option value="Iraq">Iraq</option>
  <option value="Ireland">Ireland</option>
  <option value="Isle of Man">Isle of Man</option>
  <option value="Israel">Israel</option>
  <option value="Italy">Italy</option>
  <option value="Jamaica">Jamaica</option>
  <option value="Japan">Japan</option>
  <option value="Jersey">Jersey</option>
  <option value="Jordan">Jordan</option>
  <option value="Kazakhstan">Kazakhstan</option>
  <option value="Kenya">Kenya</option>
  <option value="Kiribati">Kiribati</option>
  <option value="Korea">Korea, Democratic People's Republic of</option>
  <option value="Korea Republic">Korea, Republic of</option>
  <option value="Kuwait">Kuwait</option>
  <option value="Kyrgyzstan">Kyrgyzstan</option>
  <option value="Lao">Lao People's Democratic Republic</option>
  <option value="Latvia">Latvia</option>
  <option value="Lebanon">Lebanon</option>
  <option value="Lesotho">Lesotho</option>
  <option value="Liberia">Liberia</option>
  <option value="Libya">Libya</option>
  <option value="Liechtenstein">Liechtenstein</option>
  <option value="Lithuania">Lithuania</option>
  <option value="Luxembourg">Luxembourg</option>
  <option value="Macao">Macao</option>
  <option value="Macedonia">Macedonia, the former Yugoslav Republic of</option>
  <option value="Madagascar">Madagascar</option>
  <option value="Malawi">Malawi</option>
  <option value="Malaysia">Malaysia</option>
  <option value="Maldives">Maldives</option>
  <option value="Mali">Mali</option>
  <option value="Malta">Malta</option>
  <option value="Marshall">Marshall Islands</option>
  <option value="Martinique">Martinique</option>
  <option value="Mauritania">Mauritania</option>
  <option value="Mauritius">Mauritius</option>
  <option value="Mayotte">Mayotte</option>
  <option value="Mexico">Mexico</option>
  <option value="Micronesia">Micronesia, Federated States of</option>
  <option value="Moldova">Moldova, Republic of</option>
  <option value="Monaco">Monaco</option>
  <option value="Mongolia">Mongolia</option>
  <option value="Montenegro">Montenegro</option>
  <option value="Montserrat">Montserrat</option>
  <option value="Morocco">Morocco</option>
  <option value="Mozambique">Mozambique</option>
  <option value="Myanmar">Myanmar</option>
  <option value="Namibia">Namibia</option>
  <option value="Nauru">Nauru</option>
  <option value="Nepal">Nepal</option>
  <option value="Netherlands">Netherlands</option>
  <option value="New Caledonia">New Caledonia</option>
  <option value="New Zealand">New Zealand</option>
  <option value="Nicaragua">Nicaragua</option>
  <option value="Niger">Niger</option>
  <option value="Nigeria">Nigeria</option>
  <option value="Niue">Niue</option>
  <option value="Norfolk Island">Norfolk Island</option>
  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
  <option value="Norway">Norway</option>
  <option value="OOmanM">Oman</option>
  <option value="Pakistan">Pakistan</option>
  <option value="Palau">Palau</option>
  <option value="Palestinian">Palestinian Territory, Occupied</option>
  <option value="Panama">Panama</option>
  <option value="Papua">Papua New Guinea</option>
  <option value="Paraguay">Paraguay</option>
  <option value="Peru">Peru</option>
  <option value="Philippines">Philippines</option>
  <option value="Pitcairn">Pitcairn</option>
  <option value="Poland">Poland</option>
  <option value="Portugal">Portugal</option>
  <option value="Puerto Rico">Puerto Rico</option>
  <option value="Qatar">Qatar</option>
  <option value="Réunion">Réunion</option>
  <option value="Romania">Romania</option>
  <option value="Russian Federation">Russian Federation</option>
  <option value="Rwanda">Rwanda</option>
  <option value="Saint Barthélemy">Saint Barthélemy</option>
  <option value="Saint Helena">Saint Helena, Ascension and Tristan da Cunha</option>
  <option value="Saint Kitts">Saint Kitts and Nevis</option>
  <option value="Saint Lucia">Saint Lucia</option>
  <option value="Saint Martin">Saint Martin (French part)</option>
  <option value="Saint Pierre">Saint Pierre and Miquelon</option>
  <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
  <option value="Samoa">Samoa</option>
  <option value="San Marino">San Marino</option>
  <option value=">Sao Tome">Sao Tome and Principe</option>
  <option value="Saudi Arabia">Saudi Arabia</option>
  <option value="Senegal">Senegal</option>
  <option value="Serbia">Serbia</option>
  <option value="Seychelles">Seychelles</option>
  <option value="Sierra Leone">Sierra Leone</option>
  <option value="Singapore">Singapore</option>
  <option value="Sint Maarten">Sint Maarten (Dutch part)</option>
  <option value="Slovakia">Slovakia</option>
  <option value="Slovenia">Slovenia</option>
  <option value="Solomon Islands">Solomon Islands</option>
  <option value="Somalia">Somalia</option>
  <option value="South Africa">South Africa</option>
  <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
  <option value="South Sudan">South Sudan</option>
  <option value="Spain">Spain</option>
  <option value="Sri Lanka">Sri Lanka</option>
  <option value="Sudan">Sudan</option>
  <option value="Suriname">Suriname</option>
  <option value="Svalbard">Svalbard and Jan Mayen</option>
  <option value="Swaziland">Swaziland</option>
  <option value="Sweden">Sweden</option>
  <option value="Switzerland">Switzerland</option>
  <option value="Syrian">Syrian Arab Republic</option>
  <option value="Taiwan">Taiwan, Province of China</option>
  <option value="Tajikistan">Tajikistan</option>
  <option value="Tanzania">Tanzania, United Republic of</option>
  <option value="Thailand">Thailand</option>
  <option value="Timor-Leste">Timor-Leste</option>
  <option value="Togo">Togo</option>
  <option value="Tokelau">Tokelau</option>
  <option value="Tonga">Tonga</option>
  <option value="Trinidad">Trinidad and Tobago</option>
  <option value="Tunisia">Tunisia</option>
  <option value="Turkey">Turkey</option>
  <option value="Turkmenistan">Turkmenistan</option>
  <option value="Turks and Caicos">Turks and Caicos Islands</option>
  <option value="Tuvalu">Tuvalu</option>
  <option value="Uganda">Uganda</option>
  <option value="Ukraine">Ukraine</option>
  <option value="United Arab Emirates">United Arab Emirates</option>
  <option value="United Kingdom">United Kingdom</option>
  <option value="United States">United States</option>
  <option value="United States Minor">United States Minor Outlying Islands</option>
  <option value="Uruguay">Uruguay</option>
  <option value="Uzbekistan">Uzbekistan</option>
  <option value="Vanuatu">Vanuatu</option>
  <option value="Venezuela">Venezuela, Bolivarian Republic of</option>
  <option value="Viet Nam">Viet Nam</option>
  <option value="Virgin Islands">Virgin Islands, British</option>
  <option value="Virgin Islands">Virgin Islands, U.S.</option>
  <option value="Wallis and Futuna">Wallis and Futuna</option>
  <option value="Western Sahara">Western Sahara</option>
  <option value="Yemen">Yemen</option>
  <option value="Zambia">Zambia</option>
  <option value="Zimbabwe">Zimbabwe</option>
</select>
      </div>
      <div class="col-md-6">
        <input type="number" name="postal_code" placeholder="Postal Code" value="@if(isset($data->postal_code)){{$data->postal_code}}@endif" required>
      </div>
    </div>
    <input type="number" name="phone" value="@if(isset($data->phone)){{$data->phone}}@endif" id="name" placeholder="Phone" required style="margin-top: 10px;margin-bottom:10px;">
    <textarea name="description" value="" id="" cols="66" rows="7" placeholder="Additional Text(Optional)"></textarea>
    <input type="submit" name="submit" value="Continue to shipping method" @if(empty(Cart::content())) {{'disabled'}} @endif>
    </form> 
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="asserts/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#content').toggle('hide');
        $('#hideshow').click(function(){
    $('#content').toggle('show');
  });
});
    </script>
  </body>
</html>
