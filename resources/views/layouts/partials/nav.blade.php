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
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-home"></i><span>Dashboard</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content" style="display: none;">
						<li><a class="waves-effect" href="{{ route('dashboard_lists') }}"><i class="menu-icon fa fa-list"></i><span>Lists</span></a></li>
						
					</ul>
				</li>
				{{-- @endcan --}}

				<li id="tabs2">
					<a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Users</span></a>
				</li>
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Transportations</span></a>
				</li>
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Suppliers</span></a>
				</li>
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Warehouses</span></a>
				</li>
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Assets</span></a>
				</li>
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Employees</span></a>
				</li>
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Reports</span></a>
				</li>
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('manageUser') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Fleet</span></a>
				</li>
	

				@can('Roles - Permission')
				{{-- <li id="tabs2">
					<a class="waves-effect" href="{{ route('view_roles_permission') }}"><i class="menu-icon fa fa-group"></i><span>Roles & Permissions</span></a>
				</li> --}}
				@endcan
			
			</ul>
			
		</div>
		