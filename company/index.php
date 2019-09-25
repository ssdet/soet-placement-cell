<?php
session_start();
require '../db_con/connect.php';
if(isset($_SESSION['com_id'])&&(!empty($_SESSION['com_id']))){
 echo '';
}
else{
	header('Location:../index.php');
}
?>

<?php 
$user = $_SESSION['com_id'];
$sql ="SELECT full_name FROM company WHERE cemail= '$user'";
		$q_run=mysqli_query($conn,$sql);
		$r=mysqli_fetch_assoc($q_run);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/nav.css">
	</head>
<body class="bg">
	<!--  Navigation Menu Starting   -->
		<div class="navbar">
			 <a href="../index.php" target="_blank">Home</a>
			 <a href="../procedure.php" target="_blank">Procedure</a>
			 <div class="dropdown">
				<div class="dropdown-content">
				  <a href="../selection_process.php" target="frame">Selection Process</a>
				  <a href="../pool-placement.php" target="frame">Pool Placement</a>
				  <a href="../rec&alumni.php" target="frame">Our Recruiter & Alumni</a>
				  <a href="../develop.php" target="frame">All Round Development</a>
				</div>
			</div>
			  <a href="../academics.php" target="frame">Academics</a>
			  <a href="../contacts.php" target="frame">Contact Us</a>
		</div>
		
	<!--  Navigation Menu Ending   -->
	<div class="container">
<!--  Taskbar Begin   -->
		<div class="taskbar">
			<h4><a href="../company/company-page.php" target="frame"><?php echo $r['full_name'];?></a> || <a href="logout.php">Log out</a></h4>
		</div>
			<!--  Taskbar End   -->
	
	<!--  Frame Starting   -->
		<div class="frame">
			<iframe width="100%" height="104%" frameborder="0"  src="company-page.php" name="frame" id="frame"></iframe>
		</div>
		
	</div>
</body>
</html>