<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.partials.head')
	@yield('content_css')
</head>
@yield('modal')
<body>
<div class="main-menu">
		@include('layouts.partials.header')
	<!-- /.header -->
	<div class="content">

		@include('layouts.partials.nav')
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	@include('layouts.partials.fixnav')
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->
@include('layouts.partials.notification')
<!-- /#notification-popup -->
@include('layouts.partials.messages')
<!-- /#message-popup -->
<!-- @include('layouts.partials.gear_switch') -->
<!-- #color-switcher -->

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">

			@yield('content')

		</div>
		<!-- /.row -->
		@include('layouts.partials.footer')
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!--
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	@include('layouts.partials.footer-scripts')
	@yield('content_script')
	@stack('scripts')

</body>
</html>
