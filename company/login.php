<?php
session_start();
if(isset($_SESSION['com_id'])&&(!empty($_SESSION['com_id']))){
	header('Location:warning.php');
}
?>
<link rel="stylesheet" type="text/css" href="css/login.css">
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
</style>
<title>Login Page</title>
<div class="procde">
	<h2>Recruiter Login</h2>
		<div class="box">
  
		  <form  method="POST" target="_parent">
			<div class="image">
			  <img src="img/avatar.jpg" width="15%" alt="Avatar">
			</div>

			<div>
			  <label for="cemail"><b>Registered Email</b></label>
			  <input type="text" placeholder="Enter Email" name="cemail" required>

			  <label for="psw"><b>Password</b></label>
			  <input type="password" placeholder="Enter Password" name="psw" required>				
			  <button type="submit">Login</button>
			</div>
			
			<?php 
			include '../db_con/connect.php';
			if((!empty($_POST['cemail']))&&(!empty($_POST['psw']))){
				if (!isset($_POST['cemail'])|| (!isset($_POST['psw']))){
					echo 'Please entry username or password!';
				}else{
						$username=$_POST['cemail'];
						$password=$_POST['psw'];
					$q_pass="SELECT cemail, password FROM company WHERE cemail = '".mysqli_escape_string($conn,$username)."' AND password = '".mysqli_escape_string($conn,$password)."'";
					if($q_run=mysqli_query($conn,$q_pass)){
							$num_rows=mysqli_num_rows($q_run);
						if($num_rows==0){
							echo 'Invalid username or password';
							}
						else {if($num_rows==1){
							$row = mysqli_fetch_assoc($q_run);
							$sess_id= $row['cemail'];
							$_SESSION['com_id']=$sess_id;
							header('Location:index.php');
							} 
						
						}
					}
					
				}
			}	
			?>

			<div class="container" style="background-color:#f1f1f1;">
			  <span>New Company <a href="../jaf.php" target="_blank">Job Announcement Form</a></span>
			</div>
		  </form>
</div>
<p style="text-align:center; color:red;">* If not registered, please go through procedure first!<br><br>
<b>Click Here:<a href="..\index.php" target="_parent">Home Page</a></b></p>
</div>