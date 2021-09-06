@extends('layouts.mainlayout')
@section('content')
    <div class="container" style="width:100%">
        <div class="col-xs-12">
            <div class="box-content">
                <h1>Warehouse</h1>
                <table id="warehouse-table" class="display compact responsive nowrap"></table>
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
                ajax: "{{ route('storeWarehouse') }}",
                table: "#warehouse-table",
                idSrc: 'id',
                fields: [{
                    label: "id",
                    name: "id",
                    type: 'hidden'
                }, {
                    label: "Name",
                    name: "name",
                    type: 'text'
                }, {
                    label: "Floor",
                    name: "floor",
                    type: 'text'
                }, {
                    label: "Building",
                    name: "building",
                    type: 'text'
                }, {
                    label: "room",
                    name: "room",
                    type: 'text'
                }, {
                    label: "Address",
                    name: "address",
                    type: 'text'
                }, {
                    label: "Section",
                    name: "section",
                    type: 'text'
                }, {
                    label: "Contact Number",
                    name: "contact_number",
                    type: 'text'
                },  {
                    label: 'Created At:',
                    name: 'created_at',
                    type: "hidden",
                    def: function() {
                        return moment(new Date()).format("YYYY-MM-DD HH:mm:ss");
                    }
                }, {
                    label: 'Updated At:',
                    name: 'updated_at',
                    type: "hidden",
                    def: function() {
                        return moment(new Date()).format("YYYY-MM-DD HH:mm:ss");
                    }
                }]
            });


            $('#warehouse-table').on('click', 'tbody td:not(:first-child)', function(e) {
                editor.inline(this);
            });


            $('#warehouse-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                ajax: {
                    url: "{{ route('getWarehouse') }}",
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
                        data: 'floor',
                        title: 'Floor'
                    },
                    {
                        data: 'building',
                        title: 'Building'
                    },
                    {
                        data: 'room',
                        title: 'Room'
                    },
                    {
                        data: 'address',
                        title: 'Address'
                    },
                    {
                        data: 'section',
                        title: 'Section'
                    },
                    {
                        data: 'contact_number',
                        title: 'Contact Number'
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
