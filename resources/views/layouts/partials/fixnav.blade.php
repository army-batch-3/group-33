	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Home
			<?php
			$user = Auth::user();
			?>

		</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item fa fa-arrows-alt js__full_screen"></div>		
         <a class="ico-item fa fa-power-off js__logout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
		<!-- <a href="#" class="ico-item fa fa-power-off js__logout"></a> -->
	</div>