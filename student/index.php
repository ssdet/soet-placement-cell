<?php
session_start();
if(isset($_SESSION['semail'])&&(!empty($_SESSION['semail']))){
	header('Location:swarning.php');
}

if(isset($_SESSION['user_id'])&&(!empty($_SESSION['user_id']))){
	header('Location:awarning.php');
}
?>
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="css/slogin.css">
</style>
<div class="procde">
	
		<div class="box1">
			<h2>Student Login</h2>
		  <form target="_parent" method="POST">
			<div class="image">
			  <img src="img/avatar.jpg" width="15%" alt="Avatar">
			</div>

			<div>
			  <label><b>Registered Email</b></label>
			  <input type="text" placeholder="Enter Email" name="email" required>

			  <label><b>Password</b></label>
			  <input type="password" placeholder="Enter Password" name="psw" required>
				
			  <button type="submit">Login</button>
			</div>
			
			
			<?php 
			include '../db_con/connect.php';
			if((!empty($_POST['email']))&&(!empty($_POST['psw']))){
				if (!isset($_POST['email'])|| (!isset($_POST['psw']))){
					echo 'Please entry username or password!';
				}else{
						$email=$_POST['email'];
						$password=$_POST['psw'];
					$q_pass="SELECT * FROM student WHERE semail = '".mysqli_escape_string($conn,$email)."' AND password = '".mysqli_escape_string($conn,$password)."'";
					if($q_run=mysqli_query($conn,$q_pass)){
							$num_rows=mysqli_num_rows($q_run);
						if($num_rows==0){
							echo 'Invalid username or password';
							}
						else {if($num_rows==1){
							
							$row1 = mysqli_fetch_assoc($q_run);
							$student_email= $row1['semail'];
							$_SESSION['semail']=$student_email;
							header('Location:smain.php');
							} 
						
						}
					}
					
				}
			}	
			?>
			

			<div class="container" style="background-color:#f1f1f1">
			  <span>Forgot <a href="forgot.php">Password</a></span>
			  <span style="float:right;">New Student <a href="register.php">Register</a></span>
			</div>
		  </form>
		</div>
		<div class="box2">
			<h2>Admin Login</h2>
		  <form target="_parent" method="POST">
			<div class="image">
			  <img src="img/avatar.jpg" width="15%" alt="Avatar">
			</div>

			<div>
			  <label for="uname"><b>Username</b></label>
			  <input type="text" placeholder="Enter Username" name="uname" required>

			  <label for="psw"><b>Password</b></label>
			  <input type="password" placeholder="Enter Password" name="psw1" required>
				
			  <button type="submit">Login</button>
			</div>
			
			
			<?php 
			include '../db_con/connect.php';
			if((!empty($_POST['uname']))&&(!empty($_POST['psw1']))){
				if (!isset($_POST['uname'])|| (!isset($_POST['psw1']))){
					echo 'Please entry username or password!';
				}else{
						$username=$_POST['uname'];
						$pass=$_POST['psw1'];
					$q_pass="SELECT * FROM admins WHERE username = '".mysqli_escape_string($conn,$username)."' AND password = '".mysqli_escape_string($conn,$pass)."'";
					if($q_run=mysqli_query($conn,$q_pass)){
							$num_rows=mysqli_num_rows($q_run);
						if($num_rows==0){
							echo 'Invalid username or password';
							}
						else {if($num_rows==1){
							
							$row = mysqli_fetch_assoc($q_run);
							$user_id= $row['id'];
							$_SESSION['user_id']=$user_id;
							header('Location:amain.php');
							} 
						
						}
					}
					
				}
			}	
			?>
			
			
			<div class="container" style="background-color:#f1f1f1">
			</div>
		  </form>
		</div>
	<br><p style="text-align:center; color:red;">* If student is not registered, please register first!<br><br>
<b>Click Here:<a href="..\index.php" target="_parent">Home Page</a></b></p>
</div>