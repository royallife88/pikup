@include('elite.admin.header')

<body>
    <style>
        .table thead>tr>th {
            font-size: 13px;
        }

        .table tbody>tr>td {
            font-size: 12px;
        }
    </style>
    <div class="col-md-12">
        @if(Session::has('message'))
        <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
            <a class="panel-close close" data-dismiss="alert">×</a>
            <i class="fa fa-check"></i>
            {{Session::get('message')}}
        </div>
        @endif
        <h1>{{ ucwords(str_replace('_', ' ', collect(request()->segments())->last()))  }} </h1>
        <table class="table table-striped" style="text-align:center">

            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">SSN</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date of Work Started</th>
                    <th scope="col">License Number</th>
                    <th scope="col">Licence Expiry Date</th>
                    <th scope="col">Home Region</th>
                    <th scope="col">Driver Level</th>
                    <th scope="col">Routing Number</th>
                    <th scope="col">Account Number</th>
                    <th scope="col">Profile Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($drivers as $value)

            <tbody>
                <tr>
                    <th scope="row">{{$value->first_name}} {{$value->last_name}}</th>

                    <td style="text-align:left">{{$value->email}}</td>
                    <td style="text-align:left">{{$value->social_security_number}}</td>
                    <td style="text-align:left">{{$value->dob}}</td>
                    <td style="text-align:left">{{$value->age}}</td>
                    <td style="text-align:left">{{$value->address}}</td>
                    <td style="text-align:left">{{$value->phone_number}}</td>
                    <td style="text-align:left">{{$value->date_started_working}}</td>
                    <td style="text-align:left">{{$value->license_number}}</td>
                    <td style="text-align:left">{{$value->licence_expiry_date}}</td>
                    <td style="text-align:left">{{$value->home_region}}</td>
                    <td style="text-align:left">{{$value->driver_level}}</td>
                    <td style="text-align:left">{{$value->bank_routing_number}}</td>
                    <td style="text-align:left">{{$value->bank_account_number}}</td>
                    <td style="text-align:left"><img src="{{asset($value->license_image)}}" alt="profile" width="50px"
                            height="40px"></td>

                    <td><a style='text-decoration: none;' href="{{url('/admin/edit_driver/'.$value->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a> 
                        <a style='text-decoration: none;' href="{{url('/admin/delete_driver/'.$value->id)}}"
                            onClick="return confirm('Do You Want To Delete This?')"><i class="fa fa-trash"
                                aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</body>

</html>
@include('elite.admin.footer')