@extends('layouts.mainlayout')
@section('content')
    <div class="container" style="width:100%">
        <div class="col-xs-12">
            <div class="box-content">
                <h1>Restock Form</h1>
                <table id="restock-table" class="display compact responsive nowrap"></table>
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
            // var editor = new $.fn.dataTable.Editor({
            //     ajax: "{{ route('restock') }}",
            //     table: "#assets-table",
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
            //         label: "Photo",
            //         name: "photo",
            //         type: 'upload',
            //         display: function ( file_id ) {
            //             return '<img src="storage/'+file_id+'"/>';
            //         },
            //         clearText: "Clear",
            //         noImageText: 'No image'
            //     },  {
            //         label: "No. of Stocks",
            //         name: "number_of_stocks",
            //         type: 'text'
            //     }, {
            //         label: "Type",
            //         name: "type",
            //         type: 'text'
            //     }, {
            //         label: "Price",
            //         name: "price",
            //         type: 'text'
            //     }, {
            //         label: "Supplier",
            //         name: "supplier_id",
            //         type: 'select'
            //     }, {
            //         label: "Warehouse",
            //         name: "warehouse_id",
            //         type: 'select'
            //     }]
            // });

            // $('#restock-table').on('click', 'tbody td:not(:first-child)', function(e) {
            //     editor.inline( this, {
            //         buttons: { label: '&gt;', fn: function () { this.submit(); } }
            //     } );
            // });

            $('#restock-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                ajax: {
                    url: "{{ route('getRestock') }}",
                    type: 'post'
                },
                columns: [{
                        data: 'id',
                        title: 'ID',
                        width: "10px"
                    },
                    {
                        data: 'name',
                        title: 'Name',
                        width: "10px"
                    },
                    {
                        data: 'number_of_stocks',
                        title: 'No. of Stocks',
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
                        data: 'type',
                        title: 'Type',
                        width: "10px"
                    },
                    {
                        data: 'price',
                        render: $.fn.dataTable.render.number( ',', '.', 0, '₱' ),
                        title: 'Price',
                        width: "10px"
                    },
                    {
                        data: 'supplierdb',
                        editField: 'supplierdb',
                        title: 'Supplier',
                        width: "10px"
                    },
                    {
                        data: 'warehousedb',
                        editField: 'warehousedb',
                        title: 'Warehouse'
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
