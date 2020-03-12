<!DOCTYPE HTML>
<html>
@include('elite.store_owner.header') @if(Session::has('service_deleted'))
<div class="alert alert-danger alert-dismissable" style="text-align:center;margin-bottom:0px;">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-check"></i> {{Session::get('service_deleted')}}
</div>
@endif

<body>

    <!--inner block start here-->
    <div class="inner-block">
        <div class="product-block">
            <div class="pro-head">
                <h2>Services</h2>
            </div>
            @foreach($data as $service)
            <div class="col-md-3 product-grid">
                <div class="product-items">
                    <div class="project-eff profile-pic">
                        <div id="nivo-lightbox-demo">
                            <p> <a href="{{route('store_owner.service_edit', $service->service_id)}}" data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p>
                        </div>
                        <img style="min-height: 270px; max-height: 270px;" class="img-responsive" src="{{asset($service->featured_image)}}" alt="">
                        <div class="edit"><a href="{{route('store_owner.delete', $service->service_id)}}"><i style="color:red" onclick="return confirm('Do you want to delete this product!');" class="fa fa-trash fa-lg"></i></a></div>
                    </div>
                </div>
                <div class="produ-cost">
                    <h4>{{str_limit($service->service_name, 30)}}</h4>
                    <h6 style="color:white;">{{$service->service_desc}}</h6> @if($service->service_approve_status == '0')
                    <h5 style="text-align:right;background:Navyblue">Pending...</h5>@endif @if($service->service_approve_status == '1')
                    <h5 style="text-align:right;background:Navyblue">Approved</h5>@endif @if($service->service_approve_status == '2')
                    <h5 style="text-align:right;background:Navyblue">Rejected</h5>@endif
                </div>
            </div>
        </div>
        @endforeach
        <div class="clearfix"> </div>
    </div>
    </div>
    <!--inner block end here-->
    @include('elite.store_owner.footer')

</body>

</html>