@extends('layouts.mainlayout')
@section('content')
    <div class="container" style="width:100%">
        <div class="col-xs-12">
            <div class="box-content">
                <h1>Employee</h1>
                <table id="employee-table" class="display compact responsive nowrap"></table>
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
                ajax: "{{ route('storeEmployee') }}",
                table: "#employee-table",
                idSrc: 'id',
                fields: [{
                    label: "First Name",
                    name: "first_name",
                    type: 'text'
                }, {
                    label: "Middle Name",
                    name: "middle_name",
                    type: 'text'
                }, {
                    label: "Last Name",
                    name: "last_name",
                    type: 'text'
                }, {
                    label: "Photo",
                    name: "photo",
                    type: 'upload',
                    display: function ( file_id ) {
                        return '<img src="storage/'+file_id+'"/>';
                    },
                    clearText: "Clear",
                    noImageText: 'No image'
                },  {
                    label: "Type",
                    name: "employee_type",
                    type:  "select",
                    options: [
                        { label: "Regular", value: "Regular" },
                        { label: "Probationary", value: "Probationary" },
                        { label: "Trainee", value: "Trainee" }
                    ]
                }]
            });

            $('#employee-table').on('click', 'tbody td:not(:first-child)', function(e) {
                editor.inline( this, {
                    buttons: { label: '&gt;', fn: function () { this.submit(); } }
                } );
            });

            $('#employee-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                ajax: {
                    url: "{{ route('getEmployee') }}",
                    type: 'post'
                },
                columns: [{
                        data: 'id',
                        title: 'ID',
                        width: "10px"
                    },
                    {
                        data: 'first_name',
                        title: 'First Name',
                        width: "10px"
                    },
                    {
                        data: 'middle_name',
                        title: 'Middle Name',
                        width: "10px"
                    },
                    {
                        data: 'last_name',
                        title: 'Last Name',
                        width: "10px"
                    },
                    {
                        data: 'employee_type',
                        title: 'Type',
                        width: "10px"
                    },
                    {
                        data: "photo",
                        render: function ( file_id ) {
                            return file_id ?
                                '<img src="storage/'+file_id+'" "/>' :
                                null;
                        },
                        defaultContent: "No image",
                        title: "Image",
                        width: "10px",
                        height: "50px"
                    },
                    {
                        data: 'created_at',
                        title: 'Date Created',
                        width: "10px"
                    },
                    {
                        data: 'updated_at',
                        title: 'Date Updated',
                        width: "10px"
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
