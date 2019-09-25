<?php
session_start();
require '../db_con/connect.php';
if(isset($_SESSION['semail'])&&(!empty($_SESSION['semail']))){
 $user = $_SESSION['semail'];
}
else{
	header('Location:../index.php');
}
?>
<?php 
$user = $_SESSION['semail'];
$sql ="SELECT * FROM student WHERE semail = '$user'";
		$q_run=mysqli_query($conn,$sql);
		$r=mysqli_fetch_assoc($q_run);
?>

<link rel="stylesheet" type="text/css" href="css/student-page.css">
<title>Student Page</title>
<body>	
<!--  Logo Banner Begin   -->
	<div class="banner">
		<a href="student-page.php"><img id="img_logo" src="../img/logo.png"></img></a>
		<div id="title">
			<h1>Hemvati Nandan Bahuguna Garhwal University<br>
			School of Engineering and Technology, Placement Portal</h1>
		</div>
	</div>
<!--  Logo Banner Ending   -->
<div class="mid-con">
	
			<!--  Left Banner Starting   -->
				<div class="left-banner">
					<div id="speak">
						<h3><u>Student Profile</u></h3>
						<p>
						<ul><li><?php echo $r['sname']?></li>
							<li><?php echo $user; ?></li>
							<li><?php echo $r['department']?></li>
						</ul>
						</p>
					</div>
				</div>
			<!--  Left Banner Ending   -->
			
			<!--  Right Banner Starting   -->
				<div class="right-banner">
				<p style="color:red; text-align:center;">Highly recommended to read procedure before moving forward!<br>
				</p>
					<div id="job">
					<h3 style="color:blue;"><a href="profile.php">Step 1:Complete Registration</a></h3>
						<?php
							if(empty($r['per10'])|| (empty($r['per12']))){
								echo '';
							}else{
								header('Location:student-page1.php');
							}
						?>
					</div>
				
				<p style="color:blue; padding-left:20px; text-align:justify;">For any query email us at <u>tnp.soet.hnbgu@gmail.com</u> or contact us.</p>
				</div>
			<!--  Right Banner Ending   -->
		</div>
</body>