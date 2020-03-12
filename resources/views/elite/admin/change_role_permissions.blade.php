@include('elite.admin.header')

<body>
    <div class="col-md-12">
        <h1>{{ ucwords(str_replace('_', ' ', collect(request()->segments())->last()))  }} </h1>

        @if(Session::has('message'))
        <div class="alert alert-info alert-dismissable" style="text-align:center;margin-bottom:0px;">
            <a class="panel-close close" data-dismiss="alert">×</a>
            <i class="fa fa-check"></i>
            {{Session::get('message')}}
        </div>
        @endif

        <form action="role_change_permissions_update" method="post" style="margin-top: 50px;">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="user_id">Role</label>
                    <div class="col-md-4">
                        <select name="role" id="role" class="form-control" required>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                            <option @if(!empty($role_id)) @if($role_id==$role->id) {{'selected'}} @endif @endif
                                value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            @php
            if(!empty($role_id)){
            $role = Spatie\Permission\Models\Role::find($role_id);

            }

            @endphp
            {{-- showing all permissions --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="user_id">Permissions</label>
                    <div class="row"></div>
                    @foreach ($permissions as $permission)
                    <div class="checkbox">
                        <label
                            style="font-weight: @if(strpos($permission->name, 'sub') == false) {{'600'}} @endif"><input
                                class="permissions {{$permission->name}}" name="permissions[]"
                                @if($role->hasPermissionTo($permission->name)) {{'checked'}} @endif type="checkbox"
                            value="{{$permission->id}}">@if(strpos($permission->name, 'sub') !== false) &emsp; @endif
                            {{$permission->name}}</label>
                    </div>
                    @endforeach
                </div>
                <input type="submit" value="Submit" class="btn btn-success pull-right"
                    style="margin-right: 20px; margin-bottom: 20px;">
            </div>
        </form>
    </div>
    <script>
        $('#role').on('change',function(){

        role = $(this).val();
        console.log(role);
        
        window.location.replace('{{route('admin.change_permissions_by_role')}}/?role_id='+role);
    });

// changing permission to selected of parent when child get selected
    $('.permissions').on('change', function(){
        let permission = new Array();
        $.each($("input[name='permissions[]']:checked"), function() {
            permission.push($(this).val());

            });
        if(jQuery.inArray("3", permission) !== -1 || jQuery.inArray("2", permission) !== -1){
            $('.categories_menu').attr("checked", true);
        }else{
            $('.categories_menu').removeAttr('checked');
        }
        if(jQuery.inArray("5", permission) !== -1 || jQuery.inArray("6", permission) !== -1 || jQuery.inArray("7", permission) !== -1 || jQuery.inArray("8", permission) !== -1 || jQuery.inArray("9", permission) !== -1){
            $('.user_menu').attr("checked", true);
        }else{
            $('.user_menu').removeAttr('checked');
        }
        if(jQuery.inArray("11", permission) !== -1 || jQuery.inArray("12", permission) !== -1){
            $('.products_menu').attr("checked", true);
        }else{
            $('.products_menu').removeAttr('checked');
        }
        if(jQuery.inArray("14", permission) !== -1 || jQuery.inArray("15", permission) !== -1){
            $('.admins_menu').attr("checked", true);
        }else{
            $('.admins_menu').removeAttr('checked');
        }
        if(jQuery.inArray("14", permission) !== -1 || jQuery.inArray("15", permission) !== -1){
            $('.admins_menu').attr("checked", true);
        }else{
            $('.admins_menu').removeAttr('checked');
        }
        if(jQuery.inArray("17", permission) !== -1){
            $('.roles_menu').attr("checked", true);
        }else{
            $('.roles_menu').removeAttr('checked');
        }
        if(jQuery.inArray("19", permission) !== -1){
            $('.orders_menu').attr("checked", true);
        }else{
            $('.orders_menu').removeAttr('checked');
        }
        if(jQuery.inArray("21", permission) !== -1 || jQuery.inArray("22", permission) !== -1){
            $('.drivers_menu').attr("checked", true);
        }else{
            $('.drivers_menu').removeAttr('checked');
        }
        
    });
    </script>
</body>

</html>
@include('elite.admin.footer')