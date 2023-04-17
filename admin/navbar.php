<nav id="sidebar" class='mx-lt-5 bg-light' style="background-color: #e3f2fd !important;">
	<div class="container-fluid">
		
		<div class="sidebar-list">
				
				<a href="index.php?page=book" class="nav-item nav-book"><span class='icon-field'><i class="fa fa-book"> </i></span>Bookings</a>
				<a href="index.php?page=movielist" class="nav-item nav-movielist"><span class='icon-field'><i class="fa fa-list"></i></span> Movie List</a>
				<a href="index.php?page=theater_settings" class="nav-item nav-theater_settings"><span class='icon-field'><i class="fa fa-cog"></i></span> Theater Settings	</a>
		</div>

	</div>
</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>