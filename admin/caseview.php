<?php 
//require_once('session_login.php');
include('dbconnect.php');
include('header.php');

 ?>

 
<br />
<div class="container-fluid">
	<?php include('menubar.php');?>
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="panel panel-success">
			<div class="panel panel-success">
			 	<div class="panel-heading">
			 		<h3 class="panel-title">
			 			Criminal List
			 		</h3>
			 	</div>
<div id="trans-table">
<table id="myTable-trans" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>S/N</th>
	        
			<th>Criminal Id</th>
	        <th ><center>Criminal Name</center></th>
			<th><center>Crime type</center></th>
	        <th><center>Punishment</center></th>
	        <th><center> Gender</center></th>
	         <th><center>Age</center></th>
	        <th><center> Height</center></th>
	        <th><center>Convicted</center></th>
			
			
	    </tr>
	</thead>
    <tbody>
    	<?php
		// The serial number variable
		$sn=0;
		$query=mysqli_query($dbcon,"select * from complainant");
		while($row = mysqli_fetch_array($query)){
		$id = $row['case_id'];
		// $status=$row['status'];
		$sn++;
		?>
		<tr>
       
        <td><?php echo $sn;?></td>
       
        <td><?php echo $row['case_id'];?></td> 
		<td><?php echo $row['comp_name'];?></td>
		<td><?php echo $row['crimetyp']; ?></td>
		<td><?php echo $row['occupation']; ?></td>  
		<td><?php echo $row['gender']; ?></td>
		<td><?php echo $row['age']; ?></td>
		<td><?php echo $row['tel']; ?></td>
		<td><?php echo $row['convicted']; ?></td>
		
		</tr>
	<?php } ?>    
    </tbody>
</table>
</div>
</div>

	</div>
	<div class="col-md-1"></div>
</div>


<?php include('scripts.php'); ?>


	

<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-trans').DataTable();
	});
</script>
</body>
</html>