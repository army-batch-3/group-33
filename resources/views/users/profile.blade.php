
@extends('layouts.mainlayout')

@section('content_css')
<style>
dt { margin-top: 1em; }
    dt:first-child { margin-top: 0; }
    dd { width: 25% }

    *[data-editor-field] {
        border: 1px dashed #ccc;
        padding: 0.5em;
        /* margin: 0.5em; */
    }

    *[data-editor-field]:hover {
        background: #f3f3f3;
        border: 1px dashed #333;
    }
</style>
@endsection

@section('modal')
@include('users.modal.PersonalData')
@endsection

@section('content')


<div class="container" style="width:100%">
   <div class="col-xs-12">
       <div class="box-content">
        <div class="row small-spacing">
                <div class="col-md-3 col-xs-12">
                    <div class="box-content bordered primary margin-bottom-20">
                        <div class="profile-avatar">
                            <img src="http://placehold.it/450x450" alt="">
                            <a href="#" class="btn btn-block btn-friend"><i class="fa fa-check-circle"></i> Friends</a>
                            <a href="#" class="btn btn-block btn-inbox"><i class="fa fa-envelope"></i> Send Messages</a>
                            <h3><strong id="prof_name">Name</strong></h3>
                            <h4 id="job_title">Title</h4>
                        </div>
                        <!-- .profile-avatar -->
                        <table class="table table-hover no-margin">
                            <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td><span class="notice notice-danger">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-content bordered -->


                </div>
                <!-- /.col-md-3 col-xs-12 -->
                <div class="col-md-9 col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box-content card">
                                <h4 class="box-title"><i class="fa fa-user ico"></i>About</h4>

                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <dl>
                                                    <div class="col-xs-5"><label>First Name:</label></div>
                                                    <dd data-editor-field="given_name" id="given_name" class="col-xs-7"></dd>
                                                </dl>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <dl>
                                                    <div class="col-xs-5"><label>Middle Name:</label></div>
                                                    <dd data-editor-field="middle_name" id="middle_name" class="col-xs-7"></dd>
                                                </dl>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <dl>
                                                    <div class="col-xs-5"><label>Last Name:</label></div>
                                                    <dd data-editor-field="last_name" id="last_name" class="col-xs-7"></dd>
                                                </dl>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <dl>
                                                    <div class="col-xs-5"><label>Email:</label></div>
                                                    <dd data-editor-field="email" id="email" class="col-xs-7"></dd>
                                                </dl>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <dl>
                                                    <div class="col-xs-5"><label>City:</label></div>
                                                    <dd data-editor-field="city" id="city" class="col-xs-7"></dd>
                                                </dl>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <dl>
                                                    <div class="col-xs-5"><label>Country:</label></div>
                                                    <dd data-editor-field="country" id="country" class="col-xs-7"></dd>
                                                </dl>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <dl>
                                                    <div class="col-xs-5"><label>Address:</label></div>
                                                    <dd data-editor-field="address" id="address" class="col-xs-7"></dd>
                                                </dl>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <dl>
                                                    <div class="col-xs-5"><label>Contact:</label></div>
                                                    <dd data-editor-field="contact" id="contact" class="col-xs-7"></dd>
                                                </dl>
                                            </div>
                                            <!-- /.row -->
                                        </div>

                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-content -->
                            </div>
                            <!-- /.box-content card -->
                        </div>
                        <!-- /.col-md-12 -->
                        <div class="col-md-12 col-xs-12">
                            <div class="box-content card">
                                <h4 class="box-title"><i class="fa fa-file-text ico"></i> Benefits & Contributions Info</h4>
                                <!-- /.box-title -->
                                <div class="card-content">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <dl>
                                                <div class="col-xs-5"><label>SSS No:</label></div>
                                                <dd data-editor-field="sss" id="sss" class="col-xs-7"></dd>
                                            </dl>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <dl>
                                                <div class="col-xs-5"><label>Pagibig No:</label></div>
                                                <dd data-editor-field="pagibig" id="pagibig" class="col-xs-7"></dd>
                                            </dl>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <dl>
                                                <div class="col-xs-5"><label>PhilHealth No:</label></div>
                                                <dd data-editor-field="philhealth" id="philhealth" class="col-xs-7"></dd>
                                            </dl>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <dl>
                                                <div class="col-xs-5"><label>PhilHealth Savings No:</label></div>
                                                <dd data-editor-field="savings" id="savings" class="col-xs-7"></dd>
                                            </dl>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <dl>
                                                <div class="col-xs-5"><label>Tin No:</label></div>
                                                <dd data-editor-field="tin" id="tin" class="col-xs-7"></dd>
                                            </dl>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <!-- /.card-content -->
                            </div>
                            <!-- /.box-content card -->
                        </div>
                        <!-- /.col-md-6 -->

                    </div>

                </div>
                <!-- /.col-md-9 col-xs-12 -->
            </div>
       </div>
   </div>
</div>

@endsection

@section('content_script')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{csrf_token()}}'
    }
});
var editor;
$(document).ready(function () {
    editor = new $.fn.dataTable.Editor( {
		ajax: "{{route('infoUpdate')}}",
		fields: [ {
				label:     "First Name:",
				name:      "given_name"
			}, {
				label:     "Middle Name:",
				name:      "middle_name"
			}, {
				label:     "Last Name:",
				name:      "last_name"
			}, {
				label:     "Email:",
				name:      "email"
			}, {
				label:     "City:",
				name:      "city"
			}, {
				label:     "Country:",
				name:      "country"
			}, {
				label:     "Address:",
				name:      "address"
			}, {
				label:     "Contact No.:",
				name:      "contact"
			}, {
				label:     "SSS No.:",
				name:      "sss"
			}, {
				label:     "Pagibig No.:",
				name:      "pagibig"
			}, {
				label:     "PhilHealth No.:",
				name:      "philhealth"
			}, {
				label:     "PhilHealth Savings No.:",
				name:      "savings"
			}, {
				label:     "Tin No.:",
				name:      "tin"
			}

		]
	} );

    $.ajax({
        url:"{{route('getAllPersonal')}}",
        type:"POST",
        dataType:'JSON',
    }).done(function(data){
        data.PersonalInfo.forEach(function(item){
            document.getElementById("prof_name").innerHTML = (item.given_name +' '+item.middle_name+" "+item.last_name);
            document.getElementById("job_title").innerHTML = (item.Title);
            document.getElementById("given_name").innerHTML = (item.given_name);
            document.getElementById("middle_name").innerHTML = (item.middle_name);
            document.getElementById("last_name").innerHTML = (item.last_name);
            document.getElementById("email").innerHTML = (item.email);
            document.getElementById("city").innerHTML = (item.city);
            document.getElementById("country").innerHTML = (item.country);
            document.getElementById("address").innerHTML = (item.address);
            document.getElementById("contact").innerHTML = (item.contact);
        });
        data.Benefit.forEach(function(item){
            document.getElementById("sss").innerHTML = item.sss;
            document.getElementById("pagibig").innerHTML = item.pagibig;
            document.getElementById("philhealth").innerHTML = item.philhealth;
            document.getElementById("savings").innerHTML = item.savings;
            document.getElementById("tin").innerHTML = item.tin;
        });
    });

	$('[data-editor-field]').on( 'click', function (e) {
		editor.inline( this, {
			buttons: '_basic'
		} );
	} );


});
</script>
@endsection

