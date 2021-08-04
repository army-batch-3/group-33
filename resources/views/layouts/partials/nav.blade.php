<style>
	.sub-menu 
	{
		padding-left: 15px !important;
	}
	</style>
	<div class="navigation">
			<h5 class="title">Settings</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				@can('Dashboard List')
				<li class="">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-home"></i><span>Dashboard</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content" style="display: none;">
						<li><a class="waves-effect" href="{{ route('dashboard_lists') }}"><i class="menu-icon fa fa-list"></i><span>Lists</span></a></li>
						
					</ul>
				</li>
				@endcan

				@can('Manage Employee')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('basicinfo_view') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Manage Employees Info</span></a>
				</li>
				@endcan



				@can('Roles - Permission')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('view_roles_permission') }}"><i class="menu-icon fa fa-group"></i><span>Roles & Permissions</span></a>
				</li>
				@endcan
			
			</ul>
			
		</div>
		