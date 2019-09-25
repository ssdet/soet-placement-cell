<?php
require '../db_con/connect.php';
?>
<link rel="stylesheet" type="text/css" href="css/register.css">
<style>
.procde{
	border: 3px solid red;
	border-radius: 15px 50px;
	padding:20px;
	margin:15px;
}
h2{
	text-align:center;
}
h4{
	color:red;
}
</style>
<title>Student Registration</title>
<div class="procde">
	<h2>Student Registration</h2>
	
	
<?php 
	if(isset($_POST['sname']) && isset($_POST['email'])){
		$sname = $_POST['sname'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$roll_num = $_POST['roll_num'];
		if($_POST['psw']==$_POST['cpsw']){
		$password = $_POST['psw'];
		$q = "INSERT INTO student (sname, semail, password, contact, roll_num)VALUES ('$sname', '$email', '$password', '$contact', '$roll_num')";
		if($q_run=mysqli_query($conn,$q)){
				echo '<h3 style="text-align:center;">Thank You For Registration</h3>';
			}else{
				echo mysqli_error($conn);
			}
		}else{
			echo '<h4 style="text-align:center;">Password does not Match!</h4>';
		}
	}	
		?>
	
	
		<div class="box" style="margin:auto;">
		  <form action="register.php" method="POST">
			<div class="image">
			  <img src="img/avatar.jpg" width="15%" alt="Avatar">
			</div>

			<div class="box_m">
			<div class="box_s1">
				  <label for="sname"><b>Student Name</b></label>
				  <input type="text" id="sname" name="sname" required>
				  <label for="email"><b>Email</b></label>
				  <input type="email" name="email" required>
				  		  
		</div>
		<div  class="box_s2">
				  <label for="contact"><b>Contact Number</b></label>
				  <input type="text" name="contact" required>
				  <label for="roll_num"><b>University Roll Number</b></label>
				  <input type="text" name="roll_num" pattern="[1-1]{1}[6-8]{1}[1-1]{1}[3-3]{1}[4-4]{1}[5-7/3-3]{1}[0-9]{5}" title="Sorry! This Roll Number is Not Allowed" required>
				  <label for="psw"><b>Password</b></label>
				  <input type="password" name="psw" required>
				  <label for="cpsw"><b>Confirm Password</b></label>
				  <input type="password" name="cpsw" required>	
				  
		</div>
		
		<input type="submit" value="Register" style="background-color:green; color:white;">
		</div>
		  </form>
</div>
<p style="text-align:center; color:red;"><b>Click Here:<a href="..\index.php" target="_parent">Home Page</a></b></p>
</div>