<style>
	.sub-menu
	{
		padding-left: 15px !important;
	}
	</style>
	<div class="navigation">
			{{-- <h5 class="title">Settings</h5> --}}
			<!-- /.title -->
			<ul class="menu js__accordion">
				{{-- @can('Dashboard List') --}}
				<li class="">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-area-chart"></i><span>Dashboard</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content" style="display: none;">
						<li><a class="waves-effect" href="{{ route('dashboard_lists') }}"><i class="menu-icon fa fa-list"></i><span>Lists</span></a></li>

					</ul>
				</li>
				{{-- @endcan --}}
                @can('Manage Employee')
                <li id="tabs2">
                    <a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-users"></i><span>Users</span></a>
                </li>
                @endcan

                @can('Roles - Permission')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('permission_role') }}"><i class="menu-icon fa fa-shield"></i><span>Roles & Permissions</span></a>
				</li>
				@endcan

                @can('Manage Transportation')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('transportation') }}"><i class="menu-icon fa fa-car"></i><span>Transportations</span></a>
				</li>
				@endcan

                @can('Manage Suppliers')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('supplier') }}"><i class="menu-icon fa fa-archive"></i><span>Suppliers</span></a>
				</li>
				@endcan

                @can('Manage Warehouses')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('warehouse.view') }}"><i class="menu-icon fa fa-building"></i><span>Warehouses</span></a>
				</li>
				@endcan

                @can('Manage Assets')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('assets') }}"><i class="menu-icon fa fa-bank"></i><span>Assets</span></a>
				</li>
				@endcan

                @can('Manage Employee')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('employee') }}"><i class="menu-icon fa fa-users"></i><span>Employees</span></a>
				</li>
				@endcan

             
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('restock') }}"><i class="menu-icon fa fa-users"></i><span>Restocks</span></a>
				</li>
             
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('requisition') }}"><i class="menu-icon fa fa-users"></i><span>Requisition Form</span></a>
				</li>
				

                @can('Manage Reports')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-file-pdf-o"></i><span>Reports</span></a>
				</li>
				@endcan

                @can('Manage Fleet')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-ship"></i><span>Fleet</span></a>
				</li>
                @endcan



			</ul>

		</div>
