<?php 
//require_once('session_login.php');
include('dbconnect.php');
include('header.php');

 ?>
<br />
<div class="container-fluid">
	<?php include('menubar.php');?>


<?php include('scripts.php'); ?>


	

<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-trans').DataTable();
	});
</script>
</body>
</html>