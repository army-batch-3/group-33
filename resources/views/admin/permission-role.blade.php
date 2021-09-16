@extends('layouts.mainlayout')

@section('modal')
    <div class="modal fade" id="modal_permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-2"
        style="display: none;">
        <div class="modal-dialog modal-sm" role="document" style="width: 500px;">
            <div class="modal-content" style="width: 515px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel-2">Permission Assignment</h4>
                </div>
                <div class="modal-body">
                    <ul class="list-inline" id='permission_lists'>

                    </ul>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"
                            id="store_permission">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-2"
        style="display: none;">
        <div class="modal-dialog modal-sm" role="document" style="width: 500px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel-2">Role Assignment</h4>
                </div>
                <div class="modal-body">
                    <ul class="list-inline" id='role_lists'>

                    </ul>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm waves-effect waves-light"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" id="store_role">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container" style="width:100%">
        <div class="col-xs-12">
            <div class="box-content">
                <h1>Assign Roles</h1>
                <table id="assign-table" class="display compact responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th>Last Update</th>
                        </tr>
                    </thead>
                </table>


                <h1>Manage Roles & Permissions</h1>
                <table id="roles-table" class="display compact responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role Name</th>
                            <th>Date Created</th>
                            <th>Last Update</th>
                        </tr>
                    </thead>
                </table>

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
        let _roleid;
        let _roleid_assign;

        function show_permission(id, name) {
            _roleid = id;
            $.ajax({
                url: "{{ route('getPermission') }}",
                data: ({
                    id: id,
                    name: name
                }),
                type: "POST",
                dataType: 'JSON',
            }).done(function(data) {
                $('#permission_lists').html("");
                data.forEach(function(item) {
                    $('#permission_lists').append(`
            <li>
               <div class="checkbox info"><input class='permission_value' type="checkbox" permission-id="${item.id}" permission-name="${item.name}" id="checkbox-${item.id}" ${item.permission}><label for="checkbox-${item.id}">${item.name}</label></div>
            </li>
         `);
                });
            });
            $('#modal_permission').modal('show');
        }

        function show_roles(id, name) {
            let counter = 100;
            _roleid_assign = id;
            $.ajax({
                url: "{{ route('getRolesAvailable') }}",
                data: ({
                    id: id,
                    name: name
                }),
                type: "POST",
                dataType: 'JSON',
            }).done(function(data) {
                $('#role_lists').html("");
                data.forEach(function(item) {
                    $('#role_lists').append(`
            <li>
               <div class="checkbox info"><input class='role_value' type="checkbox" role-id="${item.id}" role-name="${item.name}" id="checkbox-${counter}" ${item.roles_available}><label for="checkbox-${counter}">${item.name}</label></div>
            </li>
         `);
                    counter++;
                });
            });
            $('#modal_role').modal('show');
        }

        function getCheckedBoxes(chkboxName, value, name) {

            let data = $(value).map(function() {
                if ($(this)[0].checked) {
                    return $(this).attr(name);
                }
            }).get();
            return data;
        }


        function getUnCheckBoxes(chkboxName, value, name) {
            let data = $(value).map(function() {
                if ($(this)[0].checked) {} else {
                    return $(this).attr(name);
                }
            }).get();
            return data;
        }

        $(document).on('click', "#store_role", function() {
            let role_value = getCheckedBoxes("role_value", ".role_value", "role-name");
            let role_unset = getUnCheckBoxes("role_value", ".role_value", "role-name");
            $.ajax({
                url: "{{ route('storeRoleSelect') }}",
                data: ({
                    role_id: _roleid_assign,
                    role_name: role_value,
                    role_unset: role_unset
                }),
                type: "POST",
                dataType: 'JSON',
            }).done(function(data) {
                console.log(data);
                swal({
                    title: "User Role Updated!",
                    text: "This will close in 2 seconds.",
                    timer: 2000,
                    type: 'success',
                    showConfirmButton: false
                });
            });

        });

        $(document).on('click', "#store_permission", function() {
            let permission_value = getCheckedBoxes("permission_value", ".permission_value", "permission-name");
            let permission_unset = getUnCheckBoxes("permission_value", ".permission_value", "permission-name");
            $.ajax({
                url: "{{ route('storePermission') }}",
                data: ({
                    role_id: _roleid,
                    permission_name: permission_value,
                    permission_unset: permission_unset
                }),
                type: "POST",
                dataType: 'JSON',
            }).done(function(data) {
                console.log(data);
                swal({
                    title: "Permission Updated!",
                    text: "This will close in 2 seconds.",
                    timer: 2000,
                    type: 'success',
                    showConfirmButton: false
                });
            });

        });
        $(document).ready(function() {

            var editor = new $.fn.dataTable.Editor({
                ajax: "{{ route('storeRole') }}",
                table: "#roles-table",
                idSrc: 'id',
                fields: [{
                    label: "ID",
                    name: "id",
                    type: 'hidden'
                }, {
                    label: "Name",
                    name: "name",
                    type: 'text'
                }, ]
            });


            var role_table = $('#roles-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                processing: true,
                deferRender: true,
                autoWidth: false,
                ajax: {
                    url: "{{ route('getRoles') }}",
                    //  data: function ( d ) {
                    //      d.clientid="{{ Session::get('client_id') }}";
                    //  },
                    type: "POST",
                    dataSrc: 'data',
                    dataType: 'JSON'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'updated_at'
                    },
                ],
                select: true,
                buttons: [
                    // @can('Add Permission')
                        { extend: "create", editor: editor },
                    // @endcan('Add Permission')
                    // @can('Edit Permission')
                        { extend: "edit", editor: editor },
                    // @endcan('Edit Permission')
                    // @can('Delete Permission')
                        { extend: "remove", editor: editor },
                    // @endcan('Delete Permission')
                    // @can('Assign Permission')
                        {
                        extend: "selectedSingle",
                        text: "Assign Permission",
                        className: 'btn-space permission_btn',
                        action: function ( e, dt, node, config ) {
                        let role_id = role_table.row( { selected: true } ).data().id;
                        let role_name = role_table.row( { selected: true } ).data().name;
                        show_permission(role_id,role_name);
                        }
                        }
                    // @endcan('Assign Permission')
                ],
                order: [
                    [0, 'asc']
                ],
                select: {
                    style: 'os',
                }
            });
            role_table.on('select', function() {
                btn_value_id = role_table.row({
                    selected: true
                }).data().name;
                $('.permission_btn').html('Assign Permission for ' + btn_value_id);
            });

            role_table.on('deselect', function() {
                btn_value_id = "";
                $('.permission_btn').html('Assign Permission');
            });



            var user_table = $('#assign-table').DataTable({
                dom: "<'clear'l>Bfrtip",
                processing: true,
                deferRender: true,
                autoWidth: false,
                ajax: {
                    url: "{{ route('getLogin') }}",
                    type: "POST",
                    dataSrc: 'data',
                    dataType: 'JSON'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'updated_at'
                    },
                ],
                select: true,
                buttons: [
                    // @can('Assign Roles')
                        {
                        extend: "selectedSingle",
                        text: "Assign Role",
                        className: 'btn-space assign_btn',
                        action: function ( e, dt, node, config ) {
                        let user_id = user_table.row( { selected: true } ).data().id;
                        let user_name = user_table.row( { selected: true } ).data().name;
                        show_roles(user_id,user_name);
                        }
                        }
                    // @endcan('Assign Roles')

                ],
                order: [
                    [0, 'asc']
                ],
                select: {
                    style: 'os',
                }
            });
            user_table.on('select', function() {
                btn_value_id = user_table.row({
                    selected: true
                }).data().name;
                $('.assign_btn').html('Assign Role for ' + btn_value_id);
            });

            user_table.on('deselect', function() {
                btn_value_id = "";
                $('.assign_btn').html('Assign Role');
            });
        });
    </script>

@endsection
