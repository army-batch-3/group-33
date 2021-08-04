@if(Session::get('first_reg') == 'updated')
  <script>window.location = '{{route("dashboard_lists")}}';</script>
@endif
@extends('layouts.mainlayout')
@section('content')

<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
      <h4 class="box-title">Update Info</h4>
      <!-- /.box-title -->
      <div class="card-content">
        <div class="input-group margin-bottom-20">
          <div class="input-group-btn"></div>
          <input id="id" type="hidden" required autofocus class="form-control" placeholder="ID" value="{{Auth::user()['id']}}">
        </div>

        <div class="input-group margin-bottom-20">
          <div class="input-group-btn"><label for="ig-1" class="btn btn-default"><i class="fa fa-user"></i></label></div>
          <input id="fname" type="text" required autofocus class="form-control" placeholder="First Name">
        </div>
        <div class="input-group margin-bottom-20">
          <div class="input-group-btn"><label for="ig-1" class="btn btn-default"><i class="fa fa-user"></i></label></div>
          <input id="mname" type="text" required autofocus class="form-control" placeholder="Middle Name">
        </div>
        <div class="input-group margin-bottom-20">
          <div class="input-group-btn"><label for="ig-1" class="btn btn-default"><i class="fa fa-user"></i></label></div>
          <input id="lname" type="text" required autofocus class="form-control" placeholder="Last Name">
        </div>

        <div class="input-group margin-bottom-20">
          <div class="input-group-btn"><label for="ig-1" class="btn btn-default"><i class="fa fa-user"></i></label></div>
          <input id="cn" type="number" required autofocus class="form-control" placeholder="Contact Number">
        </div>

        <div class="input-group margin-bottom-20">
          <div class="input-group-btn"><label for="ig-2" class="btn btn-default"><i class="fa fa-flag-o"></i></label></div>
          <input id="country" type="email" required autofocus class="form-control" placeholder="Country">
        </div>

        <div class="input-group margin-bottom-20">
          <div class="input-group-btn"><label for="ig-3" class="btn btn-default"><i class="fa fa-map"></i></label></div>
          <input id="city" type="text" required autofocus class="form-control" placeholder="City">
        </div>

        <div class="input-group">
          <div class="input-group-btn"><label for="ig-3" class="btn btn-default"><i class="fa fa-building"></i></label></div>
          <input id="address" type="text" required autofocus class="form-control" placeholder="Address">
        </div>

        <div class="text-center margin-top-20">
          <button type="button" id="update_profile" class="btn btn-success btn-rounded waves-effect waves-light">Update</button>
        </div>
      </div>
      <!-- /.card-content -->
    </div>
    <!-- /.box-content card white -->
  </div>
  <!-- /.col-lg-4 ol-xs-12 -->

<div>

@endsection

@section('content_script')

<script>
    $(document).ready(function(){
       $(document).on('click','#update_profile',function(){
            let id = $('#id').val();
            let fn = $('#fname').val();
            let mn = $('#mname').val();
            let ln = $('#lname').val();
            let cn = $('#cn').val();
            let country = $('#country').val();
            let city = $('#city').val();
            let address = $('#address').val();
            $.ajax({
                url:'{{route("updateInfo")}}',
                type:"POST",
                data:({"_token": "{{ csrf_token() }}", "given_name":fn, "middle_name":mn, "last_name":ln, "contact":cn, "country":country, "city":city, "address":address, "user_id":id, "active":"1"}),
                dataType:'JSON',
            }).done(function(data){
               setInterval(function(){ window.location.replace("{{route('dashboard_lists')}}"); }, 3000);
                swal({
                  title: "Thank you! Your profile is now updated!",
                  text: "You will be redirected after 3 seconds.",
                  timer: 3000,
                  showConfirmButton: false
                });
            });
      });

    });
</script>

@endsection
