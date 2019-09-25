<?php
session_start();
require '../db_con/connect.php';
if(isset($_SESSION['semail'])&&(!empty($_SESSION['semail']))){
 echo '';
}
else{
	header('Location:../index.php');
}
?>

<link rel="stylesheet" type="text/css" href="css/register.css">
<style>
.procde{
	border: 3px solid red;
	border-radius: 15px 50px;
	padding:20px;
	margin:15px;
}
h3{
	text-align:center;
}
</style>
<div class="procde">
	<h3>User <?php echo $_SESSION['semail']; ?> is Logged On!<br><br>
	Click Here: <a target="_parent" href="smain.php">Student Page</a><br><br>
	Click Here: <a href="logout.php">Log Out</a><br><br>
	</h3>
</div>