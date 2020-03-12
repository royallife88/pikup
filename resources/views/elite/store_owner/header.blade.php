<html>

<head>
    <title>Shoppy an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="{{asset('admincss/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- Custom Theme files -->
    <link href="{{asset('admincss/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!--js-->
    <script src="{{asset('admincss/js/jquery-2.1.1.min.js')}}"></script>
    <!--icons-css-->
    <link href="{{asset('admincss/css/font-awesome.css')}}" rel="stylesheet">

    <script src="{{asset('admincss/js/Chart.min.js')}}"></script>
    <link href="path/to/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
    <script src="path/to/bootstrap-editable/js/bootstrap-editable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('/')}}css_signup/roboto-font.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}fonts_signup/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="{{asset('/')}}css_signup/style.css" />

   
    <!--//charts-->
    <!-- geo chart -->
    <style>
        .previous {
            right: 160px !important;
        }
        
        .alert-warning {
            color: white;
            width: 100%;
            text-align: center;
            background: orange;
            vertical-align: middle;
            padding: 30px;
        }
        
        .alert-danger {
            width: 100%;
            color: white;
            text-align: center;
            background: red;
            vertical-align: middle;
            padding: 30px;
        }
        
        .alert-danger ul li {
            list-style-type: none;
            padding: 1px;
        }
        
        input[type="time"] {
            width: 45% !important;
        }
        
        .timing {
            padding-top: 18px !important;
        }
        
        .alert-info {
            width: 100%;
            color: white;
            text-align: center;
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
            width: 100% !important;
        }
        
        .form-register .steps ul {
            padding-left: 194px !important;
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
    </style>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            float: right;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }
        
        .container span {
            float: right;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }
        
        input:checked+.slider {
            background-color: #2196F3;
        }
        
        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }
        
        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
        /* Rounded sliders */
        
        .slider.round {
            border-radius: 34px;
        }
        
        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <style>
        .edit {
            padding-top: 7px;
            padding-right: 7px;
            position: absolute;
            right: 0;
            top: 0;
            display: none;
        }
        
        .dropdown-menu {
            max-height: 250px;
            overflow-y: scroll;
        }
        
        .edit a {
            color: #000;
        }
        
        .profile-pic {
            position: relative;
            display: inline-block;
        }
        
        .profile-pic:hover .edit {
            display: block;
        }
        
        .fa-lg {
            color: #6F6F6F;
        }
        
        .product-items {
            margin-bottom: 0em !important;
        }
    </style>
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>
        window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')
    </script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
    <!-- Chartinator  -->
    <script src="{{asset('admincss/js/chartinator.js')}}"></script>
    <script type="text/javascript">
        jQuery(function($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{
                    role: 'tooltip',
                    type: 'string'
                }],

                colIndexes: [2],

                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']
                ],

                ignoreCol: [2],

                chartType: 'GeoChart',

                chartAspectRatio: 1.5,

                chartZoom: 1.75,

                chartOffset: [-12, 0],

                chartOptions: {

                    width: null,

                    backgroundColor: '#fff',

                    datalessRegionColor: '#F5F5F5',

                    region: 'world',

                    resolution: 'countries',

                    legend: 'none',

                    colorAxis: {

                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {

                        trigger: 'focus',

                        isHtml: true
                    }
                }

            });
        });
    </script>
    <!--geo chart-->

    <!--skycons-icons-->
    <script src="{{asset('admincss/js/skycons.js')}}"></script>
    <script src="{{asset('admincss/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('admincss/js/scripts.js')}}"></script>
    <!--//scrolling js-->
    <script src="{{asset('admincss/js/bootstrap.js')}}">
    </script>
    <!--//skycons-icons-->
</head>
<body style="overflow-y:scroll; height: 100%;">
<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <div class="header-main">
                <div class="header-left">
                    <div class="logo-name">
                        <a href="{{url('store_owner')}}"> <img src="{{asset('/uploads/logo.png')}}" alt="" width=74%;>
                            <!--<img id="logo" src="" alt="Logo"/>-->
                        </a>
                    </div>
                    <!--search-box-->
                    <div class="search-box">
                        <form>
                            <input type="text" placeholder="Search..." required="">
                            <input type="submit" value="">
                        </form>
                    </div>
                    <!--//end-search-box-->
                    <div class="clearfix"> </div>
                </div>

                <!--notification menu end -->
                <div class="profile_details">
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">
                                    <span class="prfil-img"><img src="images/p1.png" alt=""> </span>
                                    <div class="user-name">
                                        <p>@if(Session::has('user')){{(Session::get('user')->name)}}@endif</p>
                                        <span>@if(Session('user')->store_owner=='1'){{"Store Owner"}}@elseif(Session('user')->service_owner
											== 1){{"Service Owner"}}@else{{"Restaurant owner"}}@endif</span>
                                    </div>
                                    <i class="fa fa-angle-down lnr"></i>
                                    <i class="fa fa-angle-up lnr"></i>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                <li> <a href="{{url('profile')}}"><i class="fa fa-user"></i>Profile</a> </li>
                                <li> <a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> Logout</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>

            @if(Session::has('user_deleted'))
            <div class="alert alert-Danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-trash-o" style="color:red"></i><i class="fa fa-check"></i> {{Session::get('user_deleted')}}
            </div>
            @endif @if(Session::has('d_status'))
            <div class="alert alert-success alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-check"></i> {{Session::get('d_status')}}
            </div>
            @endif @if(Session::has('delete_order'))
            <div class="alert alert-Danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-trash-o" style="color:red"></i><i class="fa fa-check"></i> {{Session::get('delete_order')}}
            </div>
            @endif @if(Session::has('error'))
            <div class="alert alert-Danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-trash-o" style="color:red"></i> {{Session::get('error')}}
            </div>
            @endif

            <!-- Modal -->
            <div id="restuarant_modal" class="modal fade" role="dialog">
                <div class="modal-dialog" style="width: 80%;">

                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-body" style="background-image: url('images_signup/wizard-v3.jpg');">
                            <div class="wizard-header" style="text-align: center; margin-top: 20px;">
                                <h3 class="heading">Sign Up Your Restaurant Account</h3>
                                <p>Fill all form field to go next step</p>
                                <div class="wizard-v3-content">
                                    <div class="wizard-form">

                                        <div class="" style="padding: 0 30px;">
                                            <form id="regForm" class="form-register" action="{{route('partial_restuarants_register')}}" method="post">
                                                @csrf
                                                <div id="form-total">

                                                    <!-- SECTION 2 -->
                                                    <h2>
														<span class="step-icon"><i
																class="zmdi zmdi-local-dining"></i></span>
														<span class="step-text">Restaurant</span>
													</h2>
                                                    <section class="tab">
                                                        <div class="inner">
                                                            <h3>Restaurant Information:</h3>
                                                            <div class="form-row form-row-date">
                                                                <div class="form-holder form-holder-2">
                                                                    <label for="merchent_type" class="special-label">Merchant Type</label>
                                                                    <select name="merchent_type" id="merchent_type" style="width:100%">
                                                                        <option value="local" {{ old( 'merchent_type')=='local' ? 'selected' : '' }}>
                                                                            Local</option>
                                                                        <option value="national" {{ old( 'merchent_type')=='national' ? 'selected' : '' }}>
                                                                            Enterprice/National</option>

                                                                    </select>
                                                                </div>
                                                                <div class="form-holder form-holder-2">
                                                                    <label for="no_of_location" class="special-label"># of locations
                                                                    </label>
                                                                    <select name="no_of_location" id="no_of_location" style="width:100%">
                                                                        <option value="1-5" {{ old( 'no_of_location')=='1-5' ? 'selected' : '' }}>
                                                                            1-5</option>
                                                                        <option value="6-10" {{ old( 'no_of_location')=='6-10' ? 'selected' : '' }}>
                                                                            6-10</option>
                                                                        <option value="10-15" {{ old( 'no_of_location')=='10-15' ? 'selected' : '' }}>
                                                                            10-15</option>
                                                                        <option value="15+" {{ old( 'no_of_location')=='15+' ? 'selected' : '' }}>
                                                                            15+</option>

                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-holder form-holder-2">
                                                                    <label class="form-row-inner">
                                                                        <input type="text" class="form-control" id="phone_no" value="{{ old('phone_no') }}" name="phone_no" required>
                                                                        <span class="label">Phone Number*</span>
                                                                        <span class="border"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-holder form-holder-1">
                                                                    <label class="form-row-inner">
                                                                        <input type="text" class="form-control" id="address" value="{{ old('address') }}" name="address" required>
                                                                        <span class="label">Address*</span>
                                                                        <span class="border"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>

                                                    <!-- SECTION 2 -->
                                                    <h2>
														<span class="step-icon"><i
																class="zmdi zmdi-time-restore"></i></span>
														<span class="step-text">Timings</span>
													</h2>
                                                    <section class="tab">
                                                        <div class="inner">
                                                            <h3>Timings</h3>
                                                            <div class="form-row">

                                                                <div class="form-holder form-holder-2">
                                                                    <label for="link_to_menu" class="special-label">Link to menu
                                                                    </label>
                                                                    <input style="font-size:13px" value="{{ old('link_to_menu') }}" type="text" class="form-control" id="link_to_menu" name="link_to_menu" required placeholder="https://menulink.com">
                                                                </div>
                                                                <div class="form-holder form-holder-2">
                                                                    <label for="menu_img" class="special-label">Up To 2 Menus PDF/PNG/JPG </label>
                                                                    <input style="font-size:13px" type="file" multiple class="form-control " id="menu_img" name="menu_img[]">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-holder form-holder" class="timing">
                                                                    <label class="form-row-inner container special-label">Saturday
                                                                        <input type="checkbox" name="days[]" id="Saturday" value="Saturday">
                                                                        <span style="color: #333" class="checkmark checkmark1"></span>
                                                                        <br>
                                                                    </label>
                                                                </div>
                                                                <div class="form-holder form-holder">
                                                                    <span class="Saturday" style="display: block;margin-bottom: 5px;">
																		<input type="time"
																			value="{{ old('saturday_opening_time') }}"
																			name="saturday_opening_time" id="">
																		-
																		<input type="time"
																			value="{{ old('saturday_closing_time') }}"
																			name="saturday_closing_time" id="">
																		<br>
																	</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-holder form-holder" class="timing">
                                                                    <label class="form-row-inner container special-label">Sunday
                                                                        <input type="checkbox" name="days[]" id="Sunday" value="Sunday">
                                                                        <span style="color: #333" class="checkmark checkmark1"></span>
                                                                        <br>
                                                                    </label>
                                                                </div>
                                                                <div class="form-holder form-holder">
                                                                    <span class="Sunday" style="display: block;margin-bottom: 5px;">
																		<input type="time"
																			value="{{ old('sunday_opening_time') }}"
																			name="sunday_opening_time" id="">
																		-
																		<input type="time"
																			value="{{ old('sunday_closing_time') }}"
																			name="sunday_closing_time" id="">
																		<br>
																	</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-holder form-holder" class="timing">
                                                                    <label class="form-row-inner container special-label">Monday
                                                                        <input type="checkbox" name="days[]" id="Monday" value="Monday">
                                                                        <span style="color: #333" class="checkmark checkmark1"></span>
                                                                        <br>

                                                                    </label>
                                                                </div>
                                                                <div class="form-holder form-holder">
                                                                    <span class="Monday" style="display: block;margin-bottom: 5px;">
																		<input type="time"
																			value="{{ old('monday_opening_time') }}"
																			name="monday_opening_time" id="">
																		-
																		<input type="time"
																			value="{{ old('monday_closing_time') }}"
																			name="monday_closing_time" id="">
																		<br>
																	</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-holder form-holder" class="timing">
                                                                    <label class="form-row-inner container special-label">Tuesday
                                                                        <input type="checkbox" name="days[]" id="Tuesday" value="Tuesday">
                                                                        <span style="color: #333" class="checkmark checkmark1"></span>
                                                                        <br>
                                                                    </label>
                                                                </div>
                                                                <div class="form-holder form-holder">
                                                                    <span class="Tuesday" style="display: block;margin-bottom: 5px;">
																		<input type="time"
																			value="{{ old('tuesday_opening_time') }}"
																			name="tuesday_opening_time" id="">
																		-
																		<input type="time"
																			value="{{ old('tuesday_closing_time') }}"
																			name="tuesday_closing_time" id="">
																		<br>
																	</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-holder form-holder" class="timing">
                                                                    <label class="form-row-inner container special-label">Wednesday
                                                                        <input type="checkbox" name="days[]" id="Wednesday" value="Wednesday">
                                                                        <span style="color: #333" class="checkmark checkmark1"></span>
                                                                        <br>
                                                                    </label>
                                                                </div>
                                                                <div class="form-holder form-holder">
                                                                    <span class="Wednesday" style="display: block;margin-bottom: 5px;">
																		<input type="time"
																			value="{{ old('wednesday_opening_time') }}"
																			name="wednesday_opening_time" id="">
																		-
																		<input type="time"
																			value="{{ old('wednesday_closing_time') }}"
																			name="wednesday_closing_time" id="">
																		<br>
																	</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-holder form-holder" class="timing">
                                                                    <label class="form-row-inner container special-label">Thursday
                                                                        <input type="checkbox" name="days[]" id="Thursday" value="Thursday">
                                                                        <span style="color: #333" class="checkmark checkmark1"></span>
                                                                        <br>
                                                                    </label>
                                                                </div>
                                                                <div class="form-holder form-holder">
                                                                    <span class="Thursday" style="display: block;margin-bottom: 5px;">
																		<input type="time"
																			value="{{ old('thursday_opening_time') }}"
																			name="thursday_opening_time" id="">
																		-
																		<input type="time"
																			value="{{ old('thursday_closing_time') }}"
																			name="thursday_closing_time" id="">
																		<br>
																	</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-holder form-holder" class="timing">
                                                                    <label class="form-row-inner container special-label">Friday
                                                                        <input type="checkbox" name="days[]" id="Friday" value="Friday">
                                                                        <span style="color: #333" class="checkmark checkmark1"></span>
                                                                        <br>
                                                                    </label>
                                                                </div>
                                                                <div class="form-holder form-holder">
                                                                    <span class="Friday" style="display: block;margin-bottom: 5px;">
																		<input type="time"
																			value="{{ old('friday_opening_time') }}"
																			name="friday_opening_time" id="">
																		-
																		<input type="time"
																			value="{{ old('friday_closing_time') }}"
																			name="friday_closing_time" id="">
																		<br>
																	</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <!-- SECTION 3 -->

                                                    <h2>
														<span class="step-icon"><i
																class="zmdi zmdi-notifications-active"></i></span>
														<span class="step-text">Notification</span>
													</h2>
                                                    <section class="tab">
                                                        <div class="inner">
                                                            <h3>Order Notification:</h3>

                                                            <div class="form-row">
                                                                <label class="form-row-inner container">Email(Free)
                                                                    <input type="radio" name="same" id="" @if(old( 'same')) checked @endif value="email">
                                                                    <span style="color: #333" class="checkmark"></span>
                                                                    <br>
                                                                    <p style="color: #999">It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                                </label>
                                                            </div>
                                                            <div class="form-row">
                                                                <label class="form-row-inner container">SMS(Free)
                                                                    <input type="radio" name="same" id="" @if(old( 'same')) checked @endif value="sms">
                                                                    <span style="color: #333" class="checkmark"></span>
                                                                    <br>
                                                                    <p style="color: #999">It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </section>
                                                    <!-- SECTION 4 -->

                                                    <h2>
														<span class="step-icon"><i class="zmdi zmdi-card"></i></span>
														<span class="step-text">Payment</span>
													</h2>
                                                    <section class="tab">
                                                        <div class="inner">
                                                            <h3>Payment Information:</h3>

                                                            <div class="form-row">
                                                                <div class="form-holder">
                                                                    <label class="form-row-inner">
                                                                        <input type="text" class="form-control" id="holder" value="{{ old('business_name') }}" name="business_name" required>
                                                                        <span class="label">Legal business Name*</span>
                                                                        <span class="border"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-holder">
                                                                    <label class="form-row-inner">
                                                                        <input type="text" class="form-control" id="card_number" value="{{ old('id_number') }}" name="id_number" required>
                                                                        <span class="label">EIN/Tax ID Number*</span>
                                                                        <span class="border"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-holder">
                                                                    <label class="form-row-inner">
                                                                        <input type="text" class="form-control" id="owner_name" value="{{ old('owner_name') }}" name="owner_name" required>
                                                                        <span class="label">Business Owner Legal
																			Name*</span>
                                                                        <span class="border"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-holder">
                                                                    <label class="form-row-inner">
                                                                        <input type="date" class="form-control" id="owner_dob" value="{{ old('owner_dob') }}" name="owner_dob" required>
                                                                        <span class="label">Business Owner Date Of
																			Birth*</span>
                                                                        <span class="border"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <h3>Deposit Information:</h3>
                                                            <p>Download this free Bootstrap Framework form now and put it to use right away.</p>
                                                            <div class="row form-row">
                                                                <div class="col-md-6" style="width: 100%;">
                                                                    <div class="form-holder">
                                                                        <label class="form-row-inner">
                                                                            <input type="text" class="form-control" id="routing_number" value="{{ old('routing_number') }}" name="routing_number" required>
                                                                            <span class="label">Routing Number*</span>
                                                                            <span class="border"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-holder">
                                                                        <label class="form-row-inner">
                                                                            <input type="text" class="form-control" id="account_number" value="{{ old('account_number') }}" name="account_number" required>
                                                                            <span class="label">Account Number*</span>
                                                                            <span class="border"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-row">
                                                                        <div class="form-holder form-holder-2">
                                                                            <label class="pay-1-label" for="pay-1a"><img src="{{asset('/')}}images_signup/wizard_v3_icon_1.png" alt="pay-1">Credit Card</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>

                                                </div>
                                                {{--
                                                <input type="button" value="Submit" id="submit" class="previous" id="prevBtn" onclick="nextPrev(-1)">
                                                </button> --}}
                                                <div class="row">
                                                    <input type="submit" value="Submit" id="submit" class="next" id="nextBtn" onclick="nextPrev(1)">

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Modal -->
            <div id="service_registration" class="modal fade" role="dialog">
                <div class="modal-dialog" style="width: 80%;">

                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-body" style="background-image: url('images_signup/wizard-v3.jpg');">
                            <div class="wizard-header" style="text-align: center; margin-top: 20px;">
                                <h3 class="heading">Sign Up Your Service Account</h3>
                                <p>Fill all form field to go next step</p>
                            </div>
                            <div class="wizard-v3-content">
                                <div class="wizard-form">
                                    <div class="" style="padding: 0 30px;">

                                        <form id="regForm" class="form-register" action="{{route('partial_service_register')}}" method="post">
                                            @csrf
                                            <div id="form-total">
                                                <!-- SECTION 1 -->

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
                                                                    <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" class="form-control" required>
                                                                    <span class="label">Company Name</span>
                                                                    <span class="border"></span>
                                                                </label>
                                                            </div>
                                                            <div class="form-holder form-holder">
                                                                <label class="form-row-inner">
                                                                    <input type="number" name="company_phone_no" id="company_phone_no" value="{{ old('company_phone_no') }}" class="form-control" required>
                                                                    <span class="label">Company Phone</span>
                                                                    <span class="border"></span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">

                                                            <div class="form-holder form-holder">
                                                                <label class="form-row-inner">
                                                                    <input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control" required>
                                                                    <span class="label">Company Address</span>
                                                                    <span class="border"></span>
                                                                </label>
                                                            </div>
                                                            <div class="form-holder form-holder">
                                                                <label class="form-row-inner">
                                                                    <input type="text" name="service_name" value="{{ old('service_name') }}" id="service_name" class="form-control" required>
                                                                    <span class="label">Service Name</span>
                                                                    <span class="border"></span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-holder form-holder">
                                                                <label for="service_category" class="special-label">Service Type</label>
                                                                <select name="service_category" id="service_category" style="width:100%">
                                                                    <option value="car_wash" {{ old( 'service_category')=='car_wash' ? 'selected' : '' }}>
                                                                        Car Wash</option>
                                                                    <option value="clothe_wash" {{ old( 'service_category')=='clothe_wash' ? 'selected' : '' }}>
                                                                        Clothes Wash</option>
                                                                    <option value="ac_wash" {{ old( 'service_category')=='ac_wash' ? 'selected' : '' }}>
                                                                        AC Wash</option>
                                                                    <option value="car_repair" {{ old( 'service_category')=='car_repair' ? 'selected' : '' }}>
                                                                        Car Repairing</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-holder form-holder">
                                                                <label for="country" class="special-label">Country</label>
                                                                <select name="country" id="country" style="width:100%">
                                                                    <option value="Afghanistan">Afghanistan</option>
                                                                    <option value="Åland Islands">Åland Islands</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa
                                                                    </option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antarctica">Antarctica</option>
                                                                    <option value="Antigua and Barbuda">Antigua and Barbuda
                                                                    </option>
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
                                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                                                    </option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Bouvet Island">Bouvet Island</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Territory">
                                                                        British Indian Ocean Territory</option>
                                                                    <option value="Brunei Darussalam">Brunei Darussalam
                                                                    </option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands
                                                                    </option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island
                                                                    </option>
                                                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Congo, The Democratic Republic of The">
                                                                        Congo, The Democratic Republic of The</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic
                                                                    </option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic
                                                                    </option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea
                                                                    </option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia
                                                                    </option>
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
                                                                    <option value="Heard Island and Mcdonald Islands">
                                                                        Heard Island and Mcdonald Islands</option>
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
                                                                    <option value="Korea, Democratic People's Republic of">
                                                                        Korea, Democratic People's Republic of</option>
                                                                    <option value="Korea, Republic of">Korea, Republic of
                                                                    </option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya
                                                                    </option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macao">Macao</option>
                                                                    <option value="Macedonia, The Former Yugoslav Republic of">
                                                                        Macedonia, The Former Yugoslav Republic of
                                                                    </option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands
                                                                    </option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Micronesia, Federated States of">
                                                                        Micronesia, Federated States of</option>
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
                                                                    <option value="Netherlands Antilles">Netherlands Antilles
                                                                    </option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island
                                                                    </option>
                                                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau">Palau</option>
                                                                    <option value="Palestinian Territory, Occupied">
                                                                        Palestinian Territory, Occupied</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea
                                                                    </option>
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
                                                                    <option value="Russian Federation">Russian Federation
                                                                    </option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="Saint Helena">Saint Helena</option>
                                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                                    <option value="Saint Vincent and The Grenadines">
                                                                        Saint Vincent and The Grenadines</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome and Principe">Sao Tome and Principe
                                                                    </option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Serbia">Serbia</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands
                                                                    </option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="South Georgia and The South Sandwich Islands">
                                                                        South Georgia and The South Sandwich Islands
                                                                    </option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syrian Arab Republic">Syrian Arab Republic
                                                                    </option>
                                                                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania, United Republic of">
                                                                        Tanzania, United Republic of</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Timor-leste">Timor-leste</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad and Tobago">Trinidad and Tobago
                                                                    </option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Emirates">United Arab Emirates
                                                                    </option>
                                                                    <option value="United Kingdom">United Kingdom
                                                                    </option>
                                                                    <option value="United States">United States</option>
                                                                    <option value="United States Minor Outlying Islands">
                                                                        United States Minor Outlying Islands</option>
                                                                    <option value="Uruguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Viet Nam">Viet Nam</option>
                                                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.
                                                                    </option>
                                                                    <option value="Wallis and Futuna">Wallis and Futuna
                                                                    </option>
                                                                    <option value="Western Sahara">Western Sahara
                                                                    </option>
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
                                                                    <input type="text" name="state" value="{{ old('state') }}" id="state" class="form-control" required>
                                                                    <span class="label">State</span>
                                                                    <span class="border"></span>
                                                                </label>
                                                            </div>

                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-holder form-holder">
                                                                <label class="form-row-inner">
                                                                    <input type="text" name="service_charges" value="{{ old('service_charges') }}" id="service_charges" class="form-control" required>
                                                                    <span class="label">Service Charges</span>
                                                                    <span class="border"></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-holder form-holder-2">
                                                                <span class="label">Service Description</span>
                                                                <label class="form-row-inner">
                                                                    <textarea name="service_desc" id="" class="form-control service_desc" cols="135" rows="10">{{ old('service_desc') }}</textarea>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <input type="submit" value="Submit" id="submit" class="next" id="nextBtn" onclick="nextPrev(1)">

                                                    </div>
                                                </section>

                                            </div>
                                            {{--
                                            <input type="button" value="Previous" id="submit" class="previous" id="prevBtn" onclick="nextPrev(-1)">
                                            </button> --}}

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @if (isset($show_resturant_form)) @if ($show_resturant_form == '1')
            <script>
                $('#restuarant_modal').modal('show');
            </script>

            @endif @endif @if (isset($show_service_form)) @if ($show_service_form == '1')
            <script>
                $('#service_registration').modal('show');
            </script>

            @endif @endif