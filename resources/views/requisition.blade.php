@extends('layouts.mainlayout')
@section('content')
    <div class="container" style="width:100%">
        <div class="col-xs-12">
            <div class="box-content">
                <h1>Requisition Form</h1>
                <table id="requisition-table" class="display compact responsive nowrap"></table>
            </div>
        </div>
    </div>
@endsection
@section('content_script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $(document).ready(function() {

             var editor = new $.fn.dataTable.Editor({
                ajax: "{{ route('storeRequisition') }}",
                table: "#requisition-table",
                idSrc: 'id',
                fields: [{
                    label: "id",
                    name: "id",
                    type: 'hidden'
                }, {
                    label: "Employee",
                    name: "employee_id",
                    type: 'select'
                }, {
                    label: "Transportation",
                    name: "transportation_id",
                    type: 'select'
                }, {
                    label: "Assets",
                    name: "assets_id",
                    type: 'select'
                }, {
                    label: "Quantity",
                    name: "quantity",
                    type: 'text'
                }, {
                    label: "Status",
                    name: "status",
                    type:  "select",
                    options: [
                        { label: "Pending", value: "Pending" },
                        { label: "Approved", value: "Approved" },
                        { label: "Shipped", value: "Shipped" },
                        { label: "Dropped off", value: "Dropped off" },
                        { label: "Received", value: "Received" },
                        { label: "Closed", value: "Closed" }
                    ]
                }]
            });

            var requisition = $('#requisition-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                ajax: {
                    url: "{{ route('getRequisition') }}",
                    type: 'post'
                },
                columns: [{
                        data: 'id',
                        title: 'ID',
                        width: "10px"
                    },
                    {
                        data: 'employee_name',
                        editField: 'employee_id',
                        title: 'Employee',
                    },
                    {
                        data: 'transportationdb',
                        editField: 'transportation_id',
                        title: 'Transportation'
                    },
                    {
                        data: 'assetsdb',
                        editField: 'assets_id',
                        title: 'Assets'
                    },
                    {
                        data: 'quantity',
                        title: 'Quantity'
                    },
                    {
                        data: 'status',
                        title: 'Status'
                    },
                    {
                        data: 'created_at',
                        title: 'Date Created'
                    },
                    {
                        data: 'updated_at',
                        title: 'Last Update'
                    }
                ],
                select: true,
                buttons: [
                    {
                        extend: "create",
                        editor: editor
                    },
                    {
                        extend: "remove",
                        editor: editor
                    },
                    {
                        extends: 'select_single',
                        className: 'marginLeft',
                        text: 'Pending',
                        action: function ( e, dt, node, config ) {
                            editor
                                .edit( requisition.row( { selected: true } ).index(), false )
                                .set( 'status', "Pending" )
                                .submit();
                        }
                    },{
                        extends: 'select_single',
                        className: 'marginLeft',
                        text: 'Approved',
                        action: function ( e, dt, node, config ) {
                            editor
                                .edit( requisition.row( { selected: true } ).index(), false )
                                .set( 'status', "Approved" )
                                .submit();
                                restock.ajax.reload();
                        }
                    },{
                        extends: 'select_single',
                        className: 'marginLeft',
                        text: 'Shipped',
                        action: function ( e, dt, node, config ) {
                            editor
                                .edit( requisition.row( { selected: true } ).index(), false )
                                .set( 'status', "Shipped" )
                                .submit();
                        }
                    },{
                        extends: 'select_single',
                        className: 'marginLeft',
                        text: 'Dropped Off',
                        action: function ( e, dt, node, config ) {
                            editor
                                .edit( requisition.row( { selected: true } ).index(), false )
                                .set( 'status', "Dropped Off" )
                                .submit();
                        }
                    },{
                        extends: 'select_single',
                        className: 'marginLeft',
                        text: 'Received',
                        action: function ( e, dt, node, config ) {
                            editor
                                .edit( requisition.row( { selected: true } ).index(), false )
                                .set( 'status', "Received" )
                                .submit();
                                restock.ajax.reload();
                        }
                    },
                    {
                        extends: 'select_single',
                        className: 'marginLeft',
                        text: 'Closed',
                        action: function ( e, dt, node, config ) {
                            editor
                                .edit( requisition.row( { selected: true } ).index(), false )
                                .set( 'status', "Closed" )
                                .submit();
                                restock.ajax.reload();
                        }
                    }
                ]
            });
            editor.on( 'postSubmit', function ( e, type ) {
                if(type.data[0].status == "Received" || type.data[0].status == "Closed"){
                    requisition.buttons().disable();
                    requisition.buttons(0).enable();
                    requisition.buttons(1).enable();
                    (btn_value_id=="Received" ? requisition.buttons(7).enable() : '')
                }else{
                    requisition.buttons().enable();
                }
            } );

            requisition.on( 'select', function () {
                btn_value_id = requisition.row( { selected: true } ).data().status;
                console.log("btn", btn_value_id);
                if(btn_value_id == "Received" || btn_value_id == "Closed"){
                    requisition.buttons().disable();
                    requisition.buttons(0).enable();
                    requisition.buttons(1).enable();
                    (btn_value_id=="Received" ? requisition.buttons(7).enable() : '')
                }else{
                    requisition.buttons().enable();
                }

            });
        });
    </script>
@endsection
