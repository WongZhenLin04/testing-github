<!--update member landing page-->
<?php
	include 'header.php';
?>
<div class='displayingForm' id="top">
	<h1>Update Members Form</h1>
	<p id='error'>please fill in the ID in each <br>field first before clicking on update</p>
</div>
<br><br>
<!--displaying user actions-->
<?php
	//for name
	//=======================================================================================================================
	if(isset($_POST['updateName'])){
		if($_POST['nameMemberID']!=''&&($_POST['firstName']!=''||$_POST['lastName']!='')){
			$ID=$_POST['nameMemberID'];
			$sql="SELECT * FROM member WHERE member_id='$ID';";
			$result = $conn->query($sql);
			//check if member exists 
			if ($result->num_rows == 0) {
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "There are no records with that ID";',
     			 		 '</script>';
			}
			else{
				$ID=$_POST['nameMemberID'];
				$newFirstName=$_POST['firstName'];
				$newLastName=$_POST['lastName'];
				//if updating only first name
				if ($_POST['nameMemberID']!=''&&$_POST['lastName']==''&&$_POST['firstName']!=''){
					$sql = "UPDATE member SET firstname='$newFirstName' WHERE member_id='$ID';";
					if ($conn->query($sql) === TRUE) {
						echo '<script type="text/javascript">',
     			 		 	 'document.getElementById("error").innerHTML = "First Name Succesfully updated!";',
     			 		 	 '</script>';
					}
				}
				//if updating only last name
				else if ($_POST['nameMemberID']!=''&&$_POST['firstName']==''&&$_POST['lastName']!=''){
					$sql = "UPDATE member SET lastname='$newLastName' WHERE member_id='$ID';";
					if ($conn->query($sql) === TRUE) {
						echo '<script type="text/javascript">',
     			 		 	 'document.getElementById("error").innerHTML = "Last Name Succesfully updated!";',
     			 		 	 '</script>';
					}
				}
				//if updating both 
				else if ($_POST['nameMemberID']!=''&&$_POST['firstName']!=''&&$_POST['lastName']!=''){
					$sql = "UPDATE member SET lastname='$newLastName',firstname='$newFirstName' WHERE member_id='$ID';";
					if ($conn->query($sql) === TRUE) {
						echo '<script type="text/javascript">',
     			 		 	 'document.getElementById("error").innerHTML = "Last Name and First Name Succesfully updated!";',
     			 		 	 '</script>';
					}
				}
			}
		}
		//if name is empty
		else if ($_POST['nameMemberID']!=''&&$_POST['firstName']==''&&$_POST['lastName']==''){
			echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating name: please fill in either first name or last name";',
     			 '</script>';
		}
		//if ID is empty
		else if ($_POST['nameMemberID']==''){
			echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating name: please fill in the member ID";',
     			 '</script>';
		}
	}
	//=======================================================================================================================
	//for gender
	//=======================================================================================================================
	if(isset($_POST['updateGender'])){
		//if member id is empty
		if ($_POST['genderMemberID']==''){
			echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating gender: please fill in the member ID";',
     			 '</script>';
		}
		else{
			$ID=$_POST['genderMemberID'];
			$sql="SELECT * FROM member WHERE member_id='$ID';";
			$result = $conn->query($sql);
			//check if member exists 
			if ($result->num_rows == 0) {
				echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating gender: There are no records with that ID";',
     			 '</script>';
			}
			else{
				$ID=$_POST['genderMemberID'];
				$newGender=$_POST['newGender'];
				$sql = "UPDATE member SET gender='$newGender' WHERE member_id='$ID';";
				if ($conn->query($sql) === TRUE) {
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Gender updated succesfully";',
     			 		 '</script>';
				}
			}
		}
	}
	//=======================================================================================================================
	//for address
	//=======================================================================================================================
	if(isset($_POST['updateAddress'])){
		//if member id is empty
		if ($_POST['addressMemberID']==''){
			echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating address: please fill in the member ID";',
     			 '</script>';
		}
		//if address is empty
		else if($_POST['addressMemberID']!=''&&$_POST['address']==''){
			echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating address: please fill in the address box";',
     			 '</script>';
		}
		else{
			$ID=$_POST['addressMemberID'];
			$sql="SELECT * FROM member WHERE member_id='$ID';";
			$result = $conn->query($sql);
			//check if member exists 
			if ($result->num_rows == 0) {
				echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating address: There are no records with that ID";',
     			 '</script>';
			}
			else{
				$ID=$_POST['addressMemberID'];
				$newAddress=$_POST['address'];
				$sql = "UPDATE member SET address='$newAddress' WHERE member_id='$ID';";
				if ($conn->query($sql) === TRUE) {
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Address updated succesfully!";',
     			 		 '</script>';
				}
			}
		}
	}
	//=======================================================================================================================
	//for contact
	//=======================================================================================================================
	if(isset($_POST['updateContact'])){
		//if member id is empty
		if ($_POST['contactMemberID']==''){
			echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating contact: please fill in the member ID";',
     			 '</script>';
		}
		else{
			$ID=$_POST['contactMemberID'];
			$sql="SELECT * FROM member WHERE member_id='$ID';";
			$result = $conn->query($sql);
			//check if member exists 
			if ($result->num_rows == 0) {
				echo '<script type="text/javascript">',
     			 	 'document.getElementById("error").innerHTML = "Error updating contact: There are no records with that ID";',
     			 	 '</script>';
			}
			else{
				$ID=$_POST['contactMemberID'];
				$newcontact=$_POST['contact'];
				$sql = "UPDATE member SET contact='$newcontact' WHERE member_id='$ID';";
				if ($conn->query($sql) === TRUE) {
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Contact updated succesfully";',
     			 		 '</script>';
				}
			}
		}
	}
	//=======================================================================================================================
	//for year level
	//=======================================================================================================================
	if(isset($_POST['updateLevel'])){
		//if member id is empty
		if ($_POST['levelMemberID']==''){
			echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating Year Level: please fill in the member ID";',
     			 '</script>';
		}
		else{
			$ID=$_POST['levelMemberID'];
			$sql="SELECT * FROM member WHERE member_id='$ID';";
			$result = $conn->query($sql);
			//check if member exists 
			if ($result->num_rows == 0) {
				echo '<script type="text/javascript">',
     			 	 'document.getElementById("error").innerHTML = "Error updating Year Level: There are no records with that ID";',
     			 	 '</script>';
			}
			else{
				$ID=$_POST['levelMemberID'];
				$newLevel=$_POST['newLevel'];
				$sql = "UPDATE member SET year_level='$newLevel' WHERE member_id='$ID';";
				if ($conn->query($sql) === TRUE) {
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Year Level updated succesfully";',
     			 	 	 '</script>';
				}
			}
		}
	}
	//=======================================================================================================================
	//for status
	//=======================================================================================================================
	if(isset($_POST['updateStatus'])){
		//if member id is empty
		if ($_POST['statusMemberID']==''){
			echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error updating status: please fill in the member ID";',
     			 '</script>';
		}
		else{
			$ID=$_POST['statusMemberID'];
			$sql="SELECT * FROM member WHERE member_id='$ID';";
			$result = $conn->query($sql);
			//check if member exists 
			if ($result->num_rows == 0) {
				echo '<script type="text/javascript">',
     			 	 'document.getElementById("error").innerHTML = "Error updating status: There are no records with that ID";',
     			 	 '</script>';
			}
			else{
				$ID=$_POST['statusMemberID'];
				$newStatus=$_POST['newStatus'];
				$sql = "UPDATE member SET status='$newStatus' WHERE member_id='$ID';";
				if ($conn->query($sql) === TRUE) {
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Member Status updated succesfully";',
     			 	 	 '</script>';
				}
			}
		}
	}
	//=======================================================================================================================
?>
<!--actual forms-->
<div class='displayingForm'>
	<h2>Update Name:</h2>
	<p>(note: if you only want to update either first <br>name or last name only then leave either <br>one or the other blank, <br>or fill in both to update both!)</p>
	<!--form for renaming a member-->
	<Form method="post">
		<input type="text" name="nameMemberID" placeholder="Member Id..."><br><br>
		<input type="text" name="firstName" placeholder="First Name...">
		<input type="text" name="lastName" placeholder="Last Name..."><br><br>
		<button type="submit" name="updateName">Update!</button>
		<br><br>
	</Form>
	<!--form for changing the gender of a member-->
	<h2>Update Gender:</h2>
	<Form method="post">
		<input type="text" name="genderMemberID" placeholder="Member Id..."><br><br>
		<select name="newGender">
  			<option value="Male">Male</option>
  			<option value="Female">Female</option>
  		</select><br><br>
  		<button type="submit" name="updateGender">Update!</button>
  		<br><br>
	</Form>
	<h2>Update Address:</h2>
	<!--form for changing the address of a member-->
	<Form method="post">
		<input type="text" name="addressMemberID" placeholder="Member Id..."><br><br>
		<input type="text" name="address" placeholder="Address..."><br><br>
		<button type="submit" name="updateAddress">Update!</button>
		<br><br>
	</Form>
	<!--form for changing contact of a member-->
	<h2>Update Contact:</h2>
	<p>(note: leave field empty but<br> fill in ID to clear the contact)</p>
	<Form method="post">
		<input type="text" name="contactMemberID" placeholder="Member Id..."><br><br>
		<input type="text" name="contact" placeholder="Contact..."><br><br>
		<button type="submit" name="updateContact">Update!</button>
		<br><br>
	</Form>
	<!--form for changing the year level of a member-->
	<h2>Update Year Level:</h2>
	<Form method="post">
		<input type="text" name="levelMemberID" placeholder="Member Id..."><br><br>
		<select name="newLevel">
  			<option value="Faculty">Faculty</option>
  			<option value="First Year">First Year</option>
  			<option value="Second Year">Second Year</option>
  			<option value="Third Year">Third Year</option>
  			<option value="Fourth Year">Fourth Year</option>
  		</select><br><br>
		<button type="submit" name="updateLevel">Update!</button>
		<br><br>
	</Form>
	<!--form for changing the status of a member-->
	<h2>Update member status:</h2>
	<Form method="post">
		<input type="text" name="statusMemberID" placeholder="Member Id..."><br><br>
		<select name="newStatus">
  			<option value="Active">Active</option>
  			<option value="Banded">Banded</option>
  		</select><br><br>
		<button type="submit" name="updateStatus">Update!</button>
		<br><br>
	</Form>
</div>
<br><br>
<div class='displayingForm'>
	<a href="index.php">Click here to go back to main page</a>
</div>