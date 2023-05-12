<?php 

include('header.php');
include('dbconnect2.php');

 ?>


<div class="container-fluid">
	

      <?php include('menubar.php')?> 
	<?php // include('menubar1.php');

	
	?>
<div class="container-fluid">

	<div class="col-md-2"></div>
	<div class="col-md-8">
		
			<div class="panel panel-success">
					  	<div class="panel-heading">
		
					  		<h3 class="panel-title">Enter Login Details</h3>
					  	</div>
			<div class="panel-body">

			 
				


				<div class="container-fluid">
					<form class="form-horizontal" action="saveuserlogin.php"  method="post" role="form">
						<div class="form-row">
                        <div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">First Name:</label>
					    		<input type="text" name="fname" class="form-control" id="staffid" required="" >
					  		</div>
					  	</div>
					  	<div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Last Name:</label>
					    		<input type="text" name="oname" class="form-control" id="staffid" required="" >
					  		</div>
					  	</div>
				</div>

						<div class="form-row">
							<div class="col-md-6">
					  		<div class="form-group">
					    		<label for="">Staff Id:</label>
					    		<input type="text" name="username" class="form-control" id="staffid" required="">
					  		</div>
					  	</div>
                        	<div class="col-md-6">
					       		<div class="form-group">
					       		 <label for="">Password:</label>
					       	
					        		<input type="password" readonly="" name="pwd" value="1234" class="form-control" id="pname"
					    		autofocus=""  >
					       		</div>
					   		</div>

					   		<div class="col-md-6">
					  		<div class="form-group">

					  			
					    		<label for="">Select Role:</label>
									    <select class="form-control" name="status" id ="sdcrime">
									    <option selected="selected" value="">Select</option>

											<option value="Admin"> Admin </option>
											<option value="CBI"> Investigating Officer</option>
											<option value="JailSuperintendent"> Jail Superintendent</option>
											<option value="Police"> Police</option>
											<option value="Judge"> Judge</option>
											
										

										 </select>
					  			</div>
					  		</div>
					  	</div>

					  
					  </div>
					  <div class="form-group">
					  <button  type="submit" name="save_case" class="btn btn-success form-control">Save and Continue
					  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
					  </button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

<?php include('scripts.php'); ?>
<script type="text/javascript">

	$(document).on('submit', '#addsdtaff', function(event) {
		
		event.preventDefault();
		// This removes the error messages from the page
		 $(".list-group-item").remove();
		
		var formData = $(this).serialize();

			$.ajax({
					url: 'saveuserlogin.php',
					type: 'post',
					data: formData,
					dataType: 'JSON',

					success: function(response){

						if(response.error){

							console.log(response.error);
					}

						else{

							Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: 'Staff Saved',
							  showConfirmButton: false,
							  timer: 3000
							});
							
							
							setTimeout( function(){
								window.location='addstaff.php';
							}, 900);
							

						}

					}
					
					
				});
		


	});

</script>

</body>
</html>