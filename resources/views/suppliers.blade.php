@extends('layouts.mainlayout')

@section('content_css')
    <link rel="stylesheet" href="{{ URL::asset('editor/DataTables-1.10.20/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('editor/Responsive-2.2.3/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('editor/Buttons-1.6.1/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('editor/Editor-1.9.2/css/editor.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('editor/Select-1.3.1/css/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('editor/DataTables-1.10.20/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="container" style="width:100%">
        <div class="col-xs-12">
            <div class="box-content">
                <h1>Suppliers</h1>
                <table id="suppliers-table" class="display compact responsive nowrap"></table>
            </div>
        </div>
    </div>
@endsection

@section('content_script')

    <script src="{{ URL::asset('editor/DataTables-1.10.20/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('editor/Responsive-2.2.3/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('editor/Editor-1.9.2/js/dataTables.editor.min.js') }}"></script>
    <script src="{{ URL::asset('editor/Buttons-1.6.1/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('editor/KeyTable-2.5.1/js/dataTables.keyTable.min.js ') }}"></script>
    <script src="{{ URL::asset('editor/Select-1.3.1/js/dataTables.select.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $(document).ready(function() {
            // var editor = new $.fn.dataTable.Editor({
            //     ajax: "{{ route('storeSupplier') }}",
            //     table: "#suppliers-table",
            //     idSrc: 'id',
            //     fields: [{
            //         label: "id",
            //         name: "id",
            //         type: 'hidden'
            //     }, {
            //         label: "Name",
            //         name: "name",
            //         type: 'text'
            //     }, {
            //         label: "Email",
            //         name: "email",
            //         type: 'text'
            //     }, {
            //         label: "Contact Number",
            //         name: "contact_number",
            //         type: 'number'
            //     }, {
            //         label: "Contact Person",
            //         name: "contact_person",
            //         type: 'text'
            //     }, {
            //         label: "Address",
            //         name: "address",
            //         type: 'text'
            //     } ]
            // });

            $('#suppliers-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                ajax: {
                    url: "{{route('getSupplier')}}",
                    type: 'post'
                },
                columns: [{
                        data: 'id',
                        title: 'ID'
                    },
                    {
                        data: 'name',
                        title: 'Name'
                    },
                    {
                        data: 'email',
                        title: 'Email'
                    },
                    {
                        data: 'contact_number',
                        title: 'Contact Number'
                    },
                    {
                        data: 'contact_person',
                        title: 'Contact Person'
                    },
                    {
                        data: 'address',
                        title: 'Address'
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
                select: true
                // buttons: [{
                //         extend: "create",
                //         editor: editor
                //     },
                //     {
                //         extend: "edit",
                //         editor: editor
                //     },
                //     {
                //         extend: "remove",
                //         editor: editor
                //     }
                // ]
            });
        });
    </script>
@endsection
