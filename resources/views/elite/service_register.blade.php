<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>PickUp</title>
  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Font-->
  <link rel="stylesheet" type="text/css" href="{{asset('/')}}css_signup/roboto-font.css">
  <link rel="stylesheet" type="text/css"
    href="{{asset('/')}}fonts_signup/material-design-iconic-font/css/material-design-iconic-font.min.css">
  <!-- datepicker -->
  <link rel="stylesheet" type="text/css" href="{{asset('/')}}css_signup/jquery-ui.min.css">
  <!-- Main Style Css -->
  <link rel="stylesheet" href="{{asset('/')}}css_signup/style.css" />
  <style>
    .previous {
      right: 160px !important;
    }

    .service_desc:focus {
      outline: none !important;
      border: 2px solid #24c1e8;

    }

    .service_desc {
      border: 2px solid #e5e5e5;
    }

    ul li {
      pointer-events: none;
    }

    .alert-warning {
      width: 100%;
      color: white;
      text-align: center;
      background: orange;
      vertical-align: middle;
      padding: 30px;
    }

    .alert-danger {
      width: 100%;
      text-align: center;
      color: white;
      background: red;
      vertical-align: middle;
      padding: 30px;
    }

    .alert-danger ul li {
      list-style-type: none;
      padding: 1px;
    }

    .alert-info {
      width: 100%;
      text-align: center;
      color: white;
      background: green;
      vertical-align: middle;
      padding: 30px;
    }

    #submit {
      color: #fff;
      padding: 13px 34px;
      -webkit-border-radius: 3px;
      height: 45px;
      width: 140px;
      border: none;
      align-items: center;
      background: #24c1e8;
      font-family: 'Roboto', sans-serif;
      font-size: 16px;
      font-weight: 400;
      position: absolute;
      right: 0;
      bottom: 30px;
      cursor: pointer;
    }

    #submit:hover {
      background: #1d97b5;
      ;
    }

    .actions ul li:nth-child(2) {
      position: absolute;
      right: 154px;
      bottom: 30px;
      display: none !important;
    }

    .actions ul li:nth-child(3) {
      display: none !important;
    }

    .days_timing {
      list-style: none;
    }

    .form-register .content {
      padding: 35px 55px 221px;
    }

    .container .checkmark:after {
      border: none !important;
    }

    .wizard-v3-content {
      width: 59% !important;
    }

    .form-register .steps ul {
      padding-left: 112px !important;
    }

    .checkmark1 {
      height: 20px !important;
      width: 20px !important;
      border-radius: 0px !important;
    }

    /* The container */
    .container {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
      border-radius: 15px;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked~.checkmark {
      background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked~.checkmark:after {
      display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }

    .form-register .steps ul {
      padding-left: 436px !important;
    }
  </style>
</head>

<body>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  @if(Session::has('message'))
  <div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('message')}}
  </div>
  @endif
  @if(Session::has('warning'))
  <div class="alert alert-warning alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('warning')}}
  </div>
  @endif
  @if(Session::has('error'))
  <div class="alert alert-danger alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('error')}}
  </div>
  @endif
  @if(Session::has('logout'))
  <div class="alert alert-warning alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('logout')}}
  </div>
  @endif

  @if(Session::has('review'))
  <div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('review')}}
  </div>
  @endif
  @if(Session::has('error_session'))
  <div class="alert alert-danger alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('error_session')}}
  </div>
  @endif
  @if(Session::has('success_review'))
  <div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('success_review')}}
  </div>
  @endif
  @if(Session::has('email_error'))
  <div class="alert alert-danger alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('email_error')}}
  </div>
  @endif
  @if(Session::has('changesSave'))
  <div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('changesSave')}}
  </div>
  @endif
  @if(Session::has('socialaccount'))
  <div class="alert alert-warning alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('socialaccount')}}
  </div>
  @endif
  @if(Session::has('login'))
  <div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('login')}}
  </div>
  @endif
  @if(Session::has('message_sent'))
  <div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('message_sent')}}
  </div>
  @endif
  @if(Session::has('subscribe_ok'))
  <div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('subscribe_ok')}}
  </div>
  @endif
  @if(Session::has('subscribe_not'))
  <div class="alert alert-danger alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('subscribe_not')}}
  </div>
  @endif
  @if(Session::has('subscribe_already'))
  <div class="alert alert-warning alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('subscribe_already')}}
  </div>
  @endif
  @if(Session::has('social_email_error'))
  <div class="alert alert-warning alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
    {{Session::get('social_email_error')}}
  </div>
  @endif
  <div class="page-content" style="background-image: url('images_signup/wizard-v3.jpg')">
    <div class="wizard-v3-content">
      <div class="wizard-form">
        <div class="wizard-header">
          <h3 class="heading">Sign Up Your Service Account</h3>
          <p>Fill all form field to go next step</p>
        </div>
        <form id="regForm" class="form-register" action="" method="post">
          @csrf
          <div id="form-total">
            <!-- SECTION 1 -->
            <h2>
              <span class="step-icon"><i class="zmdi zmdi-account"></i></span>
              <span class="step-text">About</span>
            </h2>
            <section class="tab">
              <div class="inner">
                <h3>Account Information:</h3>
                <div class="form-row">
                  <div class="form-holder form-holder-2">
                    <label class="form-row-inner">
                      <input type="text" name="Email" value="{{ old('Email') }}" id="email" class="form-control"
                        required>
                      <span class="label">Email Address</span>
                      <span class="border"></span>
                    </label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-holder">
                    <label class="form-row-inner">
                      <input type="text" class="form-control" value="{{ old('fName') }}" id="first_name" name="fName"
                        required>
                      <span class="label">First Name*</span>
                      <span class="border"></span>
                    </label>
                  </div>
                  <div class="form-holder">
                    <label class="form-row-inner">
                      <input type="text" class="form-control" id="last_name" name="lName" value="{{ old('lName') }}"
                        required>
                      <span class="label">Last Name*</span>
                      <span class="border"></span>
                    </label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-holder form-holder">
                    <label class="form-row-inner">
                      <input type="password" name="password" id="password_1" class="form-control" required>
                      <span class="label">Password</span>
                      <span class="border"></span>
                    </label>
                  </div>

                  <div class="form-holder form-holder">
                    <label class="form-row-inner">
                      <input type="password" name="confirm_password" id="comfirm_password_1" class="form-control"
                        required>
                      <span class="label">Confirm Password</span>
                      <span class="border"></span>
                    </label>
                  </div>
                </div>

              </div>
            </section>
            <!-- SECTION 2 -->
            <h2>
              <span class="step-icon"><i class="zmdi zmdi-home"></i></span>
              <span class="step-text">Company</span>
            </h2>
            <section class="tab">
              <div class="inner">
                <h3>Company Information:</h3>

                <div class="form-row">
                  <div class="form-holder form-holder">
                    <label class="form-row-inner">
                      <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}"
                        class="form-control" required>
                      <span class="label">Company Name</span>
                      <span class="border"></span>
                    </label>
                  </div>
                  <div class="form-holder form-holder">
                    <label class="form-row-inner">
                      <input type="number" name="company_phone_no" id="company_phone_no"
                        value="{{ old('company_phone_no') }}" class="form-control" required>
                      <span class="label">Company Phone</span>
                      <span class="border"></span>
                    </label>
                  </div>

                </div>
                <div class="form-row">


                  <div class="form-holder form-holder">
                    <label class="form-row-inner">
                      <input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control"
                        required>
                      <span class="label">Company Address</span>
                      <span class="border"></span>
                    </label>
                  </div>
                  <div class="form-holder form-holder">
                    <label class="form-row-inner">
                      <input type="text" name="service_name" value="{{ old('service_name') }}" id="service_name"
                        class="form-control" required>
                      <span class="label">Service Name</span>
                      <span class="border"></span>
                    </label>
                  </div>

                </div>
                <div class="form-row">
                  <div class="form-holder form-holder">
                    <label for="service_category" class="special-label">Service Type</label>
                    <select name="service_category" id="service_category" style="width:100%">
                      <option value="car_wash" {{ old('service_category') == 'car_wash' ? 'selected' : '' }}>Car Wash
                      </option>
                      <option value="clothe_wash" {{ old('service_category') == 'clothe_wash' ? 'selected' : '' }}>
                        Clothes Wash</option>
                      <option value="ac_wash" {{ old('service_category') == 'ac_wash' ? 'selected' : '' }}>AC Wash
                      </option>
                      <option value="car_repair" {{ old('service_category') == 'car_repair' ? 'selected' : '' }}>Car
                        Repairing</option>
                    </select>
                  </div>

                  <div class="form-holder form-holder">
                    <label for="country" class="special-label">Country</label>
                    <select name="country" id="country" style="width:100%">
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
                      <option value="Bolivia">Bolivia</option>
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
                      <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The
                      </option>
                      <option value="Cook Islands">Cook Islands</option>
                      <option value="Costa Rica">Costa Rica</option>
                      <option value="Cote D'ivoire">Cote D'ivoire</option>
                      <option value="Croatia">Croatia</option>
                      <option value="Cuba">Cuba</option>
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
                      <option value="French Southern Territories">French Southern Territories</option>
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
                      <option value="Guinea-bissau">Guinea-bissau</option>
                      <option value="Guyana">Guyana</option>
                      <option value="Haiti">Haiti</option>
                      <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                      <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                      <option value="Honduras">Honduras</option>
                      <option value="Hong Kong">Hong Kong</option>
                      <option value="Hungary">Hungary</option>
                      <option value="Iceland">Iceland</option>
                      <option value="India">India</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
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
                      <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of
                      </option>
                      <option value="Korea, Republic of">Korea, Republic of</option>
                      <option value="Kuwait">Kuwait</option>
                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                      <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                      <option value="Latvia">Latvia</option>
                      <option value="Lebanon">Lebanon</option>
                      <option value="Lesotho">Lesotho</option>
                      <option value="Liberia">Liberia</option>
                      <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                      <option value="Liechtenstein">Liechtenstein</option>
                      <option value="Lithuania">Lithuania</option>
                      <option value="Luxembourg">Luxembourg</option>
                      <option value="Macao">Macao</option>
                      <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic
                        of</option>
                      <option value="Madagascar">Madagascar</option>
                      <option value="Malawi">Malawi</option>
                      <option value="Malaysia">Malaysia</option>
                      <option value="Maldives">Maldives</option>
                      <option value="Mali">Mali</option>
                      <option value="Malta">Malta</option>
                      <option value="Marshall Islands">Marshall Islands</option>
                      <option value="Martinique">Martinique</option>
                      <option value="Mauritania">Mauritania</option>
                      <option value="Mauritius">Mauritius</option>
                      <option value="Mayotte">Mayotte</option>
                      <option value="Mexico">Mexico</option>
                      <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                      <option value="Moldova, Republic of">Moldova, Republic of</option>
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
                      <option value="Netherlands Antilles">Netherlands Antilles</option>
                      <option value="New Caledonia">New Caledonia</option>
                      <option value="New Zealand">New Zealand</option>
                      <option value="Nicaragua">Nicaragua</option>
                      <option value="Niger">Niger</option>
                      <option value="Nigeria">Nigeria</option>
                      <option value="Niue">Niue</option>
                      <option value="Norfolk Island">Norfolk Island</option>
                      <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                      <option value="Norway">Norway</option>
                      <option value="Oman">Oman</option>
                      <option value="Pakistan">Pakistan</option>
                      <option value="Palau">Palau</option>
                      <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                      <option value="Panama">Panama</option>
                      <option value="Papua New Guinea">Papua New Guinea</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="Peru">Peru</option>
                      <option value="Philippines">Philippines</option>
                      <option value="Pitcairn">Pitcairn</option>
                      <option value="Poland">Poland</option>
                      <option value="Portugal">Portugal</option>
                      <option value="Puerto Rico">Puerto Rico</option>
                      <option value="Qatar">Qatar</option>
                      <option value="Reunion">Reunion</option>
                      <option value="Romania">Romania</option>
                      <option value="Russian Federation">Russian Federation</option>
                      <option value="Rwanda">Rwanda</option>
                      <option value="Saint Helena">Saint Helena</option>
                      <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                      <option value="Saint Lucia">Saint Lucia</option>
                      <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                      <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                      <option value="Samoa">Samoa</option>
                      <option value="San Marino">San Marino</option>
                      <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                      <option value="Saudi Arabia">Saudi Arabia</option>
                      <option value="Senegal">Senegal</option>
                      <option value="Serbia">Serbia</option>
                      <option value="Seychelles">Seychelles</option>
                      <option value="Sierra Leone">Sierra Leone</option>
                      <option value="Singapore">Singapore</option>
                      <option value="Slovakia">Slovakia</option>
                      <option value="Slovenia">Slovenia</option>
                      <option value="Solomon Islands">Solomon Islands</option>
                      <option value="Somalia">Somalia</option>
                      <option value="South Africa">South Africa</option>
                      <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich
                        Islands</option>
                      <option value="Spain">Spain</option>
                      <option value="Sri Lanka">Sri Lanka</option>
                      <option value="Sudan">Sudan</option>
                      <option value="Suriname">Suriname</option>
                      <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                      <option value="Swaziland">Swaziland</option>
                      <option value="Sweden">Sweden</option>
                      <option value="Switzerland">Switzerland</option>
                      <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                      <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                      <option value="Tajikistan">Tajikistan</option>
                      <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Timor-leste">Timor-leste</option>
                      <option value="Togo">Togo</option>
                      <option value="Tokelau">Tokelau</option>
                      <option value="Tonga">Tonga</option>
                      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                      <option value="Tunisia">Tunisia</option>
                      <option value="Turkey">Turkey</option>
                      <option value="Turkmenistan">Turkmenistan</option>
                      <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                      <option value="Tuvalu">Tuvalu</option>
                      <option value="Uganda">Uganda</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="United Arab Emirates">United Arab Emirates</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="United States">United States</option>
                      <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                      <option value="Uruguay">Uruguay</option>
                      <option value="Uzbekistan">Uzbekistan</option>
                      <option value="Vanuatu">Vanuatu</option>
                      <option value="Venezuela">Venezuela</option>
                      <option value="Viet Nam">Viet Nam</option>
                      <option value="Virgin Islands, British">Virgin Islands, British</option>
                      <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                      <option value="Wallis and Futuna">Wallis and Futuna</option>
                      <option value="Western Sahara">Western Sahara</option>
                      <option value="Yemen">Yemen</option>
                      <option value="Zambia">Zambia</option>
                      <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                  </div>



                </div>
                <div class="form-row">
                  <div class="form-holder form-holder">
                    <label class="form-row-inner">
                      <input type="text" name="city" value="{{ old('city') }}" id="city" class="form-control" required>
                      <span class="label">City</span>
                      <span class="border"></span>
                    </label>
                  </div>

                  <div class="form-holder form-holder">
                    <label class="form-row-inner">
                      <input type="text" name="state" value="{{ old('state') }}" id="state" class="form-control"
                        required>
                      <span class="label">State</span>
                      <span class="border"></span>
                    </label>
                  </div>


                </div>

                <div class="form-row">
                  <div class="form-holder form-holder">
                    <label class="form-row-inner">
                      <input type="text" name="service_charges" value="{{ old('service_charges') }}"
                        id="service_charges" class="form-control" required>
                      <span class="label">Service Charges</span>
                      <span class="border"></span>
                    </label>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-holder form-holder-2">
                    <span class="label">Service Description</span>
                    <label class="form-row-inner">
                      <textarea name="service_desc" id="" class="form-control service_desc" cols="135"
                        rows="10">{{ old('service_desc') }}</textarea>
                    </label>
                  </div>
                </div>
              </div>
            </section>



          </div>
          <input type="button" value="Previous" id="submit" class="previous" id="prevBtn"
            onclick="nextPrev(-1)"></button>
          <input type="submit" value="Next" id="submit" class="next" id="nextBtn" onclick="nextPrev(1)">
          <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>

          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="{{asset('/')}}js_signup/jquery-3.3.1.min.js"></script>
  <script src="{{asset('/')}}js_signup/jquery.steps.js"></script>
  <script src="{{asset('/')}}js_signup/jquery-ui.min.js"></script>
  <script src="{{asset('/')}}js_signup/main.js"></script>
  <script>
    $(document).ready(function() {
				$("#Saturday").click(function () {
				$(".Saturday").toggle()
});
				$("#Sunday").click(function () {
				$(".Sunday").toggle()
});
				$("#Monday").click(function () {
				$(".Monday").toggle()
});
				$("#Tuesday").click(function () {
				$(".Tuesday").toggle()
});
				$("#Wednesday").click(function () {
				$(".Wednesday").toggle()
});
				$("#Thursday").click(function () {
				$(".Thursday").toggle()
});
				$("#Friday").click(function () {
				$(".Friday").toggle()
});
$(".Saturday").hide();
$(".Sunday").hide();
$(".Monday").hide();
$(".Tuesday").hide();
$(".Wednesday").hide();
$(".Thursday").hide();
$(".Friday").hide();



$(".actions ul li:nth-child(2)").css('display','none');
$(".previous").css('display','none');
$(".next").click(function(){
  $(".previous").css('display','block');
});
});


  </script>


  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
  </script>

</body>

</html>