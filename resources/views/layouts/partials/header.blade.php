<header class="header">
	<a href="index.html" class="logo">PA-Logistics</a>
	<button type="button" class="button-close fa fa-times js__menu_close"></button>
	<div class="user">
		<a href="#" class="avatar"><img src="http://placehold.it/80x80" alt=""><span class="status online"></span></a>
		<h5 class="name"><a href="{{ route('profile_view') }}">{{ Auth::user()->name }}</a></h5>
		<?php
        // echo auth()->user()->getRoleNames();
			for($i=0; $i<count(auth()->user()->getRoleNames()); $i++){
				echo "<h5 class='position'>". auth()->user()->getRoleNames()[$i]. "</h5>";
			}
		?>
		<!-- /.name -->
		<div class="control-wrap js__drop_down">
			<i class="fa fa-caret-down js__drop_down_button"></i>
			<div class="control-list">
				<div class="control-item"><a href="{{ route('profile_view') }}"><i class="fa fa-user"></i> Profile</a></div>
			</div>
			<!-- /.control-list -->
		</div>
		<!-- /.control-wrap -->
	</div>
	<!-- /.user -->
</header>
