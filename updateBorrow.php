<!--update borrow details landing page-->
<?php
	include 'header.php';
?>
<br><br><br>
<div class='displayingForm'>
	<h1>Update Borrow Details Form:</h1>
	<p id="error">please fill in the ID in each <br>field first before clicking on update</p>
</div>
<?php
		//for updating status
		if (isset($_POST['updateStatus'])&&$_POST['borrowDetailsId']!=''){
			$ID=$_POST['borrowDetailsId'];
			$newStatus=$_POST['newStatus'];
			$sql = "UPDATE borrowdetails SET borrow_status='$newStatus' WHERE borrow_details_id='$ID';";
			if ($conn->query($sql) === TRUE) {
				//check to see if ID entered exists
				$sql="SELECT * FROM borrowdetails WHERE borrow_details_id='$ID';";
				$result = $conn->query($sql);
				if ($result->num_rows == 0) {
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Error updating status:<br><br>There are no records with that ID";',
     			 		 '</script>';
				}
				else{
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Status updated succesfully!";',
     			 		 '</script>';
				}
			} 
		}
		//if id box is empty
		else if (isset($_POST['updateStatus'])&&$_POST['borrowDetailsId']==''){
			echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating status: <br><br>Please don\'t leave any boxes empty";',
     			 '</script>';
		}
		if (isset($_POST['updateDate'])&&$_POST['borrowDetailsIdDate']!=''&&$_POST['returnedDate']!=''){
			//things to be put into the database
			$newDateTime=$_POST['returnedDate']." ".$_POST['returnedTime'];
			$dateID=$_POST['borrowDetailsIdDate'];
			$sql = "UPDATE borrowdetails SET date_return='$newDateTime' WHERE borrow_details_id='$dateID';";
			if ($conn->query($sql) === TRUE) {
				//check to see if ID entered exists
				$sql="SELECT * FROM borrowdetails WHERE borrow_details_id='$dateID';";
				$result = $conn->query($sql);
				if ($result->num_rows == 0) {
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Error updating date returned: <br><br>There are no records with that ID";',
     			 		 '</script>';
				}
				else{
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Date updated succesfully!";',
     			 		 '</script>';
				}
			} 
		}
		//if date is empty
		else if (isset($_POST['updateDate'])&&$_POST['returnedDate']==''){
			echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Error updating date returned: <br><br>Please don\'t leave any boxes empty";',
     			 		 '</script>';
		}
	?>
<br><br>
<div class='displayingForm'>
	<h2>Update borrow status:</h2>
	<!--form for updating status-->
	<Form method="post">
		<input type="text" name="borrowDetailsId" placeholder="Borrow Details Id..."><br><br>
		<select name="newStatus">
  			<option value="returned">returned</option>
  			<option value="pending">pending</option>
  		</select>
		<br><br>
  		<button type="submit" name="updateStatus">Update!</button>
	</Form>
	<!--form for date returned-->
	<h2>Update date returned:</h2>
	<p>time format: hh:mm:ss PM/AM</p>
	<Form method="post">
		<input type="text" name="borrowDetailsIdDate" placeholder="Borrow Details Id..."><br><br>
		<input type="date" name="returnedDate"><br><br>
		<input value="00:00:00" type="time" name="returnedTime" step="1">
		<br><br>
  		<button type="submit" name="updateDate">Update!</button><br><br>
	</Form>
</div>
<br><br>
<div class='displayingForm'>
	<a href="index.php">Click here to go back to main page</a>
</div>