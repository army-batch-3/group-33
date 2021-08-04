
@extends('layouts.mainlayout')

@section('content_css')
<link rel="stylesheet" href="{{ URL::asset('editor/DataTables-1.10.20/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('editor/Responsive-2.2.3/css/responsive.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('editor/Buttons-1.6.1/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('editor/Editor-1.9.2/css/editor.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('editor/Select-1.3.1/css/select.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('editor/DataTables-1.10.20/css/dataTables.bootstrap4.min.css') }}">
<style>
div.DTE_Bubble {
    z-index: 99;
}
</style>
@endsection

@section('modal')
@include('users.modal.personal')
@endsection

@section('content')


   <div class="container" style="width:100%">
      <div class="col-xs-12">
          <div class="box-content">
                  <h1>Manage Users</h1>
                  <table id="basicinfo_table" class="display compact responsive nowrap"></table>
          </div>
      </div>
   </div>



@endsection

@section('content_script')
<script src="{{ URL::asset('editor/DataTables-1.10.20/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('editor/Responsive-2.2.3/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('editor/Editor-1.9.2/js/dataTables.editor.min.js') }}"></script>
<script src="{{ URL::asset('editor/Buttons-1.6.1/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('editor/KeyTable-2.5.1/js/dataTables.keyTable.min.js ') }}"></script> <!--  for tab editing -->
<script src="{{ URL::asset('editor/Select-1.3.1/js/dataTables.select.min.js') }}"></script>
<script>
let current_tab="save_record_benefits";
let last_class="save_record_benefits";
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{csrf_token()}}'
    }
});
function dynamic_data(class_name, count_fields){
    let cq={};
    let d=[];
    let counter=0;
    let count=0;
    $(class_name).each(function() {
        count++;
        let value=$(this).val();
        let key=$(this).attr("data-col");
        cq[key]=value
        d[counter] = cq;
        if((count % count_fields)==0){
            cq={};
            counter++;
        }
    });
    return d;
}

$(document).on("click",".save_record_benefits",function(){
    let data={};
    let id = $('#table_id_attr').val();
    $('.personalinfo-benefits').each(function() {
        let value=$(this).val();
        let key=$(this).attr('data-col');
        data[key]=value;
    });
     $.ajax({
            url:"{{route('storeBenefits')}}",
            data:({data:data, id:id}),
            type:"POST",
            dataType:'JSON',
        }).done(function(data){
            swal({
                title: "Benefits Info Updated!",
                text: "This will close in 2 seconds.",
                timer: 2000,
                type: 'success',
                showConfirmButton: true
            });
        });

});

$(document).on("click",".save_record_employment",function(){
    let data = dynamic_data(".personalinfo-employment",5);
    let id = $('#table_id_attr').val();
     $.ajax({
            url:"{{route('storeEmployment')}}",
            data:({data:data, id:id}),
            type:"POST",
            dataType:'JSON',
        }).done(function(data){
            swal({
                title: "Employment History Updated!",
                text: "This will close in 2 seconds.",
                timer: 2000,
                type: 'success',
                showConfirmButton: true
            });
        });
});

$(document).on("click",".save_record_reference",function(){
    let data = dynamic_data(".personalinfo-reference",4);
    let id = $('#table_id_attr').val();
     $.ajax({
            url:"{{route('storeReference')}}",
            data:({data:data, id:id}),
            type:"POST",
            dataType:'JSON',
        }).done(function(data){
            swal({
                title: "Reference Info Updated!",
                text: "This will close in 2 seconds.",
                timer: 2000,
                type: 'success',
                showConfirmButton: true
            });
        });

});


$(document).on("click",".update-data",function(){
    let type=$(this).attr("data-target").substr(1);
    current_tab = type;
    document.getElementById("info_data_btn").classList.remove(last_class);
    document.getElementById("info_data_btn").classList.add("save_record_"+current_tab);
    last_class = "save_record_"+current_tab;
});


$(document).on("click",".js__todo_button_reference",function(){
    let list = $(".js__todo_list_reference"),
    data={};
    $('.ref-data').each(function() {
        let value=$(this).val();
        let key=$(this).attr("data-col");
        data[key]=value;
    });
    if(data.name == "" || data.company=="" || data.relationship=="" || data.contact==""){
        swal({
			title: "Please fill up all the fields.",
			text: "This will close in 5 seconds.",
            timer: 5000,
            type: 'error',
			showConfirmButton: true
        });
        return;
    }
	if(data.length != 0){
        list.append(`
        <div class="col-sm-3">
            <input type="text" class="form-control personalinfo-reference" value="${data.name}" placeholder="Name" data-col="name" >
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control personalinfo-reference" value="${data.company}" placeholder="Company Name" data-col="company" >
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control personalinfo-reference" value="${data.relationship}" placeholder="Relationship" data-col="relationship" >
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control personalinfo-reference" value="${data.contact}" placeholder="Contact" data-col="contact" >
        </div>
        `);
        data={};
        $('.ref-data').each(function() {
            $(this).val("");
        });
	}else{
        swal({
			title: "Please fill up all the fields.",
			text: "This will close in 5 seconds.",
            timer: 5000,
            type: 'error',
			showConfirmButton: true
		});
	}
	return false;
});

$(document).on("click",".js__todo_button_employment",function(){
    let list = $(".js__todo_list_employment"),
    data={};
    $('.emp-data').each(function() {
        let value=$(this).val();
        let key=$(this).attr("data-col");
        data[key]=value;
    });

    if(data.position == "" || data.company=="" || data.reason=="" || data.date_from=="" || data.date_to==""){
        swal({
			title: "Please fill up all the fields.",
			text: "This will close in 5 seconds.",
            timer: 5000,
            type: 'error',
			showConfirmButton: true
        });
        return;
    }

	if(data.length != 0){
        list.append(`
            <div class="col-sm-2">
                <input type="text" class="form-control personalinfo-employment" value="${data.position}" placeholder="Position" data-col="position" >
            </div>

            <div class="col-sm-3">
                <input type="text" class="form-control personalinfo-employment" value="${data.company}" placeholder="Company" data-col="company" >
            </div>

            <div class="col-sm-3">
                <input type="text" class="form-control personalinfo-employment" value="${data.reason}" placeholder="Reason for Leaving" data-col="reason" >
            </div>

            <div class="col-sm-2">
                <input type="date" class="form-control personalinfo-employment" value="${data.date_from}" placeholder="From Date" data-col="date_from" >
            </div>

            <div class="col-sm-2">
                <input type="date" class="form-control personalinfo-employment" value="${data.date_to}" placeholder="To Date" data-col="date_to" >
            </div>
        `);
        data={};
        $('.emp-data').each(function() {
            $(this).val("");
        });
	}else{
        swal({
			title: "Please fill up all the fields.",
			text: "This will close in 5 seconds.",
            timer: 5000,
            type: 'error',
			showConfirmButton: true
		});
	}
	return false;
});

function additional_Info(table_id)
{
    $.ajax({
		url:"{{route('getPersonalAllInfo')}}",
		data:({id:table_id}),
		type:"POST",
		dataType:'JSON',
	}).done(function(data){
        data.Benefits.forEach(function(item){
            for ( var property in data.Benefits[0] ) {
                $('.personalinfo-benefits').each(function() {
                    if(property == $(this).attr('data-col')){
                        $(this).val(item[property]);
                        return false; //AKA break
                    }
                });
            }
        });
        $(".js__todo_list_employment").html(``);
        data.Employment.forEach(function(item){
            $(".js__todo_list_employment").append(`
                <div class="col-sm-2">
                    <input type="text" class="form-control personalinfo-employment" value="${item.position}" placeholder="Position" data-col="position" >
                </div>

                <div class="col-sm-3">
                    <input type="text" class="form-control personalinfo-employment" value="${item.company}" placeholder="Company" data-col="company" >
                </div>

                <div class="col-sm-3">
                    <input type="text" class="form-control personalinfo-employment" value="${item.reason}" placeholder="Reason for Leaving" data-col="reason" >
                </div>

                <div class="col-sm-2">
                    <input type="date" class="form-control personalinfo-employment" value="${item.date_from}" placeholder="From Date" data-col="date_from" >
                </div>

                <div class="col-sm-2">
                    <input type="date" class="form-control personalinfo-employment" value="${item.date_to}" placeholder="To Date" data-col="date_to" >
                </div>
            `);
        });
        $(".js__todo_list_reference").html('');
        data.Reference.forEach(function(item){
            $(".js__todo_list_reference").append(`
                <div class="col-sm-3">
                    <input type="text" class="form-control personalinfo-reference" value="${item.name}" placeholder="Name" data-col="name" >
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control personalinfo-reference" value="${item.company}" placeholder="Company Name" data-col="company" >
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control personalinfo-reference" value="${item.relationship}" placeholder="Relationship" data-col="relationship" >
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control personalinfo-reference" value="${item.contact}" placeholder="Contact" data-col="contact" >
                </div>
            `);
        });
    });

    $('#personalinfo-modal').modal('show');
}
var editor;
$(document).ready(function () {
   editor = new $.fn.dataTable.Editor( {
        ajax: "{{route('storePersonalinfo')}}",
        table: "#basicinfo_table",
        idSrc:  'id',
        fields: [ {
                label: "id",
                name: "id",
                type: "hidden"
            }, {
                label: "First Name",
                name: "given_name"
            }, {
                label: "Middle Name",
                name: "middle_name"
            }, {
                label: "Last Name",
                name: "last_name"
            }, {
                label: "Email",
                name: "email"
            }, {
                label: "Contact No.",
                name: "contact"
            }, {
                label: "Address",
                name: "address"
            }, {
                label: "Company",
                name: "company"
            },  {
                label: "Job Title",
                name: "job_title",
                type: "select"
            }, {
                label: "Country",
                name: "country"
            }, {
                label: "City",
                name: "city"
            }, {
                label: "Active",
                name: "active",
                type:  "radio",
                options: [
                    { label: "Yes", value: '1' },
                    { label: "No",  value: '0' }
                ],
                def: '1'
            }
        ]
    } );

    // $('#basicinfo_table').on('click', 'tbody td:not(:first-child)', function (e){
    //     editor.inline(this);
    // })

    $('#basicinfo_table').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.bubble( this );
    } );

    let basicinfo = $('#basicinfo_table').DataTable( {
        dom: 'Bfrtip',
        ajax: {
            url: "{{route('getPersonalinfo')}}",
            type: 'post'
        },
        columns: [
            { data: 'id' , title: 'Id'},
            { data: null, render: function ( data, type, row ) {
                return data.given_name+' '+data.middle_name+' '+data.last_name;
            }, editField: ['given_name', 'middle_name', 'last_name'] , title: 'Name' },
            { data: 'email' , title: 'Email'},
            { data: 'contact' , title: 'Contact'},
            { data: 'address' , title: 'Address'},
            { data: 'company' , title: 'Company'},
            { data: 'Title', editField: "job_title" , title: 'Job Title'},
            { data: 'country' , title: 'Country'},
            { data: 'city' , title: 'City'},
            { data: null, render: function ( data, type, row ) {
            if(data.active == '1')
                return 'Yes';
            else
                return 'No';
            },editField: 'active', title: 'Active' },
            { data: 'date_created' , title: 'Date Created'},
            { data: 'update_at' , title: 'Date Modified'}
        ],
        select: true,
        buttons: [
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor },
            {
                extend: "selectedSingle",
                text: "Add/Edit Additional Information",
                className: "text-center",
                action: function ( e, dt, node, config ) {
                    let table_id = basicinfo.row( { selected: true } ).data().id;
                    $('#table_id_attr').val(table_id);
                    additional_Info(table_id);
                }
            }
        ]
    } );


});
</script>
@endsection

