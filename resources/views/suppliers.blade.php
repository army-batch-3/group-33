@extends('layouts.mainlayout')
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });


        $(document).ready(function() {
            var editor = new $.fn.dataTable.Editor({
                ajax: "{{ route('storeSupplier') }}",
                table: "#suppliers-table",
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
                    label: "Email",
                    name: "email",
                    type: 'text'
                }, {
                    label: "Contact Number",
                    name: "contact_number",
                    type: 'text'
                }, {
                    label: "Contact Person",
                    name: "contact_person",
                    type: 'text'
                }, {
                    label: "Address",
                    name: "address",
                    type: 'text'
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


            $('#suppliers-table').on('click', 'tbody td:not(:first-child)', function(e) {
                editor.inline(this);
            });

            $('#suppliers-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                ajax: {
                    url: "{{ route('getSupplier') }}",
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
