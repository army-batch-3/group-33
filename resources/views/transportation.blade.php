@extends('layouts.mainlayout')
@section('content')
    <div class="container" style="width:100%">
        <div class="col-xs-12">
            <div class="box-content">
                <h1>Transportations</h1>
                <table id="transportations-table" class="display compact responsive nowrap"></table>
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
                ajax: "{{ route('storeTransportation') }}",
                table: "#transportations-table",
                idSrc: 'id',
                fields: [{
                    label: "id",
                    name: "id",
                    type: 'hidden'
                }, {
                    label: "Type",
                    name: "type",
                    type: 'text'
                }, {
                    label: "Plate Number",
                    name: "plate_number",
                    type: 'text'
                }, {
                    label: "Available",
                    name: "is_available",
                    type: "radio",
                    options: [{
                            label: "Yes",
                            value: '1'
                        },
                        {
                            label: "No",
                            value: '1'
                        }
                    ],
                }, {
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


            $('#transportations-table').on('click', 'tbody td:not(:first-child)', function(e) {
                editor.inline(this);
            });

            $('#transportations-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                ajax: {
                    url: "{{ route('getTransportation') }}",
                    type: 'post'
                },
                columns: [{
                        data: 'id',
                        title: 'ID'
                    },
                    {
                        data: 'type',
                        title: 'Type'
                    },
                    {
                        data: 'plate_number',
                        title: 'Plate Number'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            if (data.active == '1')
                                return 'Yes';
                            else
                                return 'No';
                        },
                        editField: 'is_available',
                        title: 'Available'
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
                buttons: [{
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
