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
<?php 
$user = $_SESSION['semail'];
$sql ="SELECT sname FROM student WHERE semail = '$user'";
		$q_run=mysqli_query($conn,$sql);
		$r=mysqli_fetch_assoc($q_run);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Student Page</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/nav.css">
	</head>
<body class="bg">
	<!--  Navigation Menu Starting   -->
		<div class="navbar">
			 <a href="../index.php" target="_blank">Home</a>
			 <a href="../procedure.php" target="frame">Procedure</a>
			  <a href="../academics.php" target="frame">Academics</a>
			  <a href="../contacts.php" target="frame">Contact Us</a>
		</div>
		
	<!--  Navigation Menu Ending   -->
	<div class="container">
<!--  Footer Begin   -->
		<div class="taskbar">
			<h4><a href="../student/student-page.php" target="frame"><?php echo $r['sname'];?></a> || <a href="logout.php">Log out</a></h4>
		</div>
			<!--  Footer End   -->
	
	<!--  Frame Starting   -->
		<div class="frame">
			<iframe width="100%" height="104%" frameborder="0"  src="student-page.php" name="frame" id="frame"></iframe>
		</div>
		
	</div>
</body>
</html>