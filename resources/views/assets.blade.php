@extends('layouts.mainlayout')
@section('content')
    <div class="container" style="width:100%">
        <div class="col-xs-12">
            <div class="box-content">
                <h1>Assets</h1>
                <table id="assets-table" class="display compact responsive nowrap"></table>
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
                ajax: "{{ route('storeAssets') }}",
                table: "#assets-table",
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
                    label: "Photo",
                    name: "photo",
                    type: 'upload',
                    display: function ( file_id ) {
                        return '<img src="'+editor.file( 'files', file_id ).web_path+'"/>';
                    },
                    clearText: "Clear",
                    noImageText: 'No image'
                },  {
                    label: "Number of Stocks",
                    name: "number_of_stocks",
                    type: 'text'
                }, {
                    label: "Type",
                    name: "type",
                    type: 'text'
                }, {
                    label: "Price",
                    name: "price",
                    type: 'text'
                }, {
                    label: "Supplier",
                    name: "supplier",
                    type: 'select'
                }, {
                    label: "Warehouse",
                    name: "warehouse",
                    type: 'select'
                }, {
                    label: 'Updated At:',
                    name: 'updated_at',
                    type: "hidden",
                    def: function() {
                        return moment(new Date()).format("YYYY-MM-DD HH:mm:ss");
                    }
                }]
            });
            
            $('#assets-table').on('click', 'tbody td:not(:first-child)', function(e) {
                editor.inline(this);
            });

            $('#assets-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                ajax: {
                    url: "{{ route('getAssets') }}",
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
                        data: 'number_of_stocks',
                        title: 'Number of Stocks'
                    },
                    {
                        data: "photo",
                        render: function ( file_id ) {
                            return file_id ?
                                '<img src="'+editor.file( 'files', file_id ).web_path+'"/>' :
                                null;
                        },
                        defaultContent: "No image",
                        title: "Image"
                    },
                    {
                        data: 'type',
                        title: 'Type'
                    },
                    {
                        data: 'price',
                        title: 'Price'
                    },
                    {
                        data: 'supplierdb',
                        editField: 'supplier',
                        title: 'Supplier'
                    },
                    {
                        data: 'warehousedb',
                        editField: 'warehouse',
                        title: 'Warehouse'
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
