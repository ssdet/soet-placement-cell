<?php
session_start();
require '../db_con/connect.php';
if(isset($_SESSION['user_id'])&&(!empty($_SESSION['user_id']))){
 echo '';
}
else{
	header('Location:../index.php');
}
?>

<?php $q="SELECT * FROM company";					
			$q_run=mysqli_query($conn,$q);			
?>

<link rel="stylesheet" type="text/css" href="css/admin-page.css">
<title>Setting</title>
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
						<h3><u>Administrator Profile</u></h3>
						<p>
						<ul>
							<li>*<a href="amain.php" target="_parent">Home Page</a></li>
							<li>*<a href="hr_details.php" target="_blank">HR Contacts</a></li>
							<li>*<a href="drive-schedule.php" target="_blank">Drive Schedule</a></li>
							<li>*<a href="cregistered.php" target="_blank">Registered Companies</a></li>
							<li>*<a href="sregistered.php" target="_blank">Registered Students</a></li>
							<li>*<a href="interest.php" target="_blank">Interested Students</a></li>
							<li>*<a href="setting.php">Fix Final Date</a></li>
						</ul>
						</p>
					</div>
				</div>
			<!--  Left Banner Ending   -->
			
			<!--  Right Banner Starting   -->
				<div class="right-banner">
				<div id="job">
					<!--  Job Announcements   -->
						<h3 style="color:blue;">Publish Drive Date</h3>
						<hr>
						<ul>
							<li><h4>Enter Job ID</h4></li>
							<li><form method="POST"><input type="text" name="job_id" required></input></li>
							<li><input type="submit" value="Publish"></input></li></form>
							<?php if(isset($_POST['job_id']) && !empty($_POST['job_id'])){
								$job_id = $_POST['job_id'];
								$z="SELECT set_drive FROM job_log WHERE id='$job_id'";
								if($z_run=mysqli_query($conn,$z)){
									$zf = mysqli_fetch_assoc($z_run);
									if($zf['set_drive']=='1'){echo 'Already Fixed!';}
								}
								$qu="UPDATE job_log SET set_drive='1' WHERE id='$job_id'";
								if($qu_run=mysqli_query($conn,$qu)){
									echo ' Final Date Scheduled!';
								}else{
									echo mysqli_error($conn);
								}
							}
							?>
						</ul>
						<hr>
					</div>
				</div>
			<!--  Right Banner Ending   -->
		</div>
</body>