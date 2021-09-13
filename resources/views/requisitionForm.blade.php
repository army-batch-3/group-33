@extends('layouts.mainlayout')
@section('content')
    <div class="container" style="width:100%">
        <div class="col-xs-12">
            <div class="box-content">
                <h1>Restocks Form</h1>
                <table id="requesition-table" class="display compact responsive nowrap"></table>
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
                ajax: "{{ route('storeRequisitionForm') }}",
                table: "#requesition-table",
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
                    name: "transportations_id",
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
      
            $('#requesition-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                ajax: {
                    url: "{{ route('getRequisitionForm') }}",
                    type: 'post'
                },
                columns: [{
                        data: 'id',
                        title: 'ID',
                        width: "10px"
                    },
                    {
                        data: 'employeedb',
                        editField: 'employeedb',
                        title: 'Employee',
                    },
                    {
                        data: 'transportationdb',
                        editField: 'transportationdb',
                        title: 'Transportation'
                    },
                    {
                        data: 'assetsdb',
                        editField: 'assetsdb',
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
                        extend: "edit",
                        editor: editor
                    },
                    {
                        extend: "remove",
                        editor: editor
                    }
                ]
            });
        });
    </script>
@endsection
