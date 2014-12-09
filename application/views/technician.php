<h1>Technician's Page</h1>

	<div class="container img-rounded">
		<label>Add New Technician</label>
		<form action="technician/add" method="POST">
			<div class="form-group">	
				<label for="name">First Name:</label>
				<input class="form-control" type="text" name="fname" placeholder="Enter First Name">			
			</div>
			<div class="form-group">
				<label for="name">Last Name:</label>
				<input class="form-control" type="text" name="lname" placeholder="Enter Last Name">
			</div>
			<div>
				<input class = "btn"type="submit" value="Submit">
			</div>
		</form>
	</div><!--end of technician form -->

	<div class="container img-rounded">
		<form method = "post" action="technician/displayWork">
			<label>Weekly Assignment: </label>
			<!-- Start dynamic created technician's dropdown menu-->
			<?php echo "<select class='form-control' name='techlist'>";
				foreach ($technician as $rows) {
   					echo "<option value=".$rows->TID ." >".$rows->tech_firstname ." ". $rows->tech_lastname ."</option>";
				}
				echo "</select>"; 
			?><br>
			<!-- End dynamic created technician's dropdown menu-->
			<input class = "btn" type="submit" value="Submit">	
		</form>	
	</div> <!-- End of assigment div-->


	
