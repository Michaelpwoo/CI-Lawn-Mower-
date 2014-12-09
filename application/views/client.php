<h1>Client's Page</h1>
	<div class="container img-rounded">
		<label>Add New Client</label>
		<form action="client/add" method="POST" role="form">
			<div class="form-group">
				<label for="name">First Name:</label>
				<input type="text" class="form-control" name="fname" placeholder="Enter First Name">
			</div>
			<div class="form-group">
				<label for="name">Last Name:</label>
				<input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
			</div>
			<div>
				<input class="btn" type="submit" value="Submit">
			</div>	
		</form>
	</div>

	<div  class="container img-rounded" >
		<form method="post" action="client/displayInvoice">
			<label>Invoice: </label>
			<!-- dynamicaly create client's dropdown menu-->
			<?php echo "<select class='form-control' name='clientlist'>";
			foreach ($client as $rows) {
				echo "<option  value=".$rows->CID." >".$rows->firstname." ".$rows->lastname."</option>";
			}
			echo "</select>";?><br>
			<!-- end dynamicaly create client's dropdown menu-->
			<input class="btn" type="submit" value="Submit">
		</form>
	</div>





