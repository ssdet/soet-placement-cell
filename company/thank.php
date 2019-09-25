<?php
session_start();
require '../db_con/connect.php';
if(isset($_SESSION['com_id'])&&(!empty($_SESSION['com_id']))){
 echo '';
}
else{
	header('Location:../index.php');
}
$email = $_SESSION['com_id'];
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
<title>Thank You</title>
<div class="procde">
	<?php
	if(!empty($_POST['10min'])){
		$min10 = $_POST['10min'];
		$min12 = $_POST['12min'];
		$key = $_POST['key'];
		$mincgpa = $_POST['cgpamin'];
		$y_allow = $_POST['year'];
		$backlog = $_POST['backlog'];
		$q = "UPDATE job_log SET min10='$min10', min12='$min12', cgpa='$mincgpa', y_allow='$y_allow', backlog='$backlog' WHERE email='$email' AND job_designation='$key'";
		if($q_run=mysqli_query($conn,$q)){
			echo '<h3>Thank You! Successfully Submitted<br><br>
			Click Here: <a target="_parent" href="index.php">Company Page</a><br><br>
			Click Here: <a href="logout.php">Log Out</a><br><br>
			</h3>';
		}else{
			echo 'Something is Incomplete!';
		}
	}
	?>
</div>