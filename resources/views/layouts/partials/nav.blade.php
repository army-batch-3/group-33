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
						<li><a class="waves-effect" href="{{ route('dashboard_graphs') }}"><i class="menu-icon fa fa-area-chart"></i><span>Graphs</span></a></li>
						
					</ul>
				</li>
				@endcan

				@can('Manage Employee')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('basicinfo_view') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Manage Employees Info</span></a>
				</li>
				@endcan

				@can('Payroll Settings')
				<li class="">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-home"></i><span>Payroll Settings</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content" style="display: none;">
						<li><a class="waves-effect" href="{{ route('cutoff_view') }}"><i class="menu-icon fa fa-area-chart"></i><span>Cutoff Dates</span></a></li>
						<li><a class="waves-effect" href="{{ route('jobsalary_view') }}"><i class="menu-icon fa fa-list"></i><span>Job Salary</span></a></li>
						<li><a class="waves-effect" href="{{ route('deduction_view') }}"><i class="menu-icon fa fa-area-chart"></i><span>Deductions</span></a></li>
						
					</ul>
				</li>
				@endcan

				@can('Payroll - Payslip')
				<li class="">
					<li><a class="waves-effect" href="{{ route('payslip_view') }}"><i class="menu-icon fa fa-area-chart"></i><span>Payslip/Payroll</span></a></li>
					<!-- <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-home"></i><span>Payroll/Payslip</span><span class="menu-arrow fa fa-angle-down"></span></a> -->
					<!-- <ul class="sub-menu js__content" style="display: none;">
						<li><a class="waves-effect" href="{{ route('payslip_view') }}"><i class="menu-icon fa fa-area-chart"></i><span>Payslip</span></a></li>
					</ul> -->
				</li>
				@endcan
				
				@can('Leave Management')
				<li class="">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-home"></i><span>Leave Management</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content" style="display: none;">
						<li><a class="waves-effect" href="{{ route('leave_view') }}"><i class="menu-icon fa fa-area-chart"></i><span>Manage Leave</span></a></li>
						<li><a class="waves-effect" href="{{ route('leave_request_view') }}"><i class="menu-icon fa fa-list"></i><span>Leave Requests</span></a></li>
					</ul>
				</li>
				@endcan

				@can('Roles - Permission')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('view_roles_permission') }}"><i class="menu-icon fa fa-group"></i><span>Roles & Permissions</span></a>
				</li>
				@endcan
				<h5 class="title">User Menu</h5>
				@can('Leave Request')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('emp_leave_view') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Leave Request</span></a>
				</li>
				@endcan

				@can('Attendance')
				<li id="tabs2">
					<a class="waves-effect" href="{{ route('emp_attendance_view') }}"><i class="menu-icon fa fa-arrow-circle-down"></i><span>Attendance</span></a>
				</li>
				@endcan

			
			</ul>
			
		</div>
		