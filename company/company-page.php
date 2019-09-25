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

<?php 

$sql ="SELECT * FROM company WHERE cemail= '$email'";
		$q_run=mysqli_query($conn,$sql);
		$r=mysqli_fetch_assoc($q_run);
?>
<title>Company Page</title>
<style>
table, th, td {
  border: 1px solid black;
}

</style>

<link rel="stylesheet" type="text/css" href="css/company-page.css">
<body>	
<!--  Logo Banner Begin   -->
	<div class="banner">
		<a href="company-page1.php"><img id="img_logo" src="../img/logo.png"></img></a>
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
						<h3><u><a href="company-page.php">Company Page</a></u></h3>
						<h4>Company Name:</h4>
						<h4><u><?php echo $r['company_name']?></u></h4>
						<p>
						
						User:<?php echo $r['full_name']?>
						Email:<?php echo $email?>
						
						</p>
					</div>
				</div>
			<!--  Left Banner Ending   -->
			
			<!--  Right Banner Starting   -->
				<div class="right-banner">
				<p style="color:red; text-align:center;">Highly recommended to read procedure before moving forward.</p>
					<div id="job">
					<!--  Job Announcement   -->
						<h3 style="color:blue;">Job Announcements</h3>
						<ol>
						<li> * Please proceed as follows:
						<li id="button"><a href="jaf.php" target="_blank">Post Another Job Announcement Form(JAF)</a></li>
						<?php 
						 $q1="SELECT * FROM job_log WHERE email='$email'";
							$q1_run=mysqli_query($conn,$q1);
							
						?>
						
						
						<li id="button" style="text-align:center;"><b>Job Log</b>
						<table style="width:100%">
						  <tr>
							<th>Job Designation</th>
							<th>Set Criteria</th> 
							<th>View Form</th>
							<th>Drive Date</th>
						  </tr>
						  <?php while($r=mysqli_fetch_assoc($q1_run)){?>
						  <tr>
							<td><?php echo $r['job_designation'];?></td>
							<td><a href="criteria.php?keyword=<?php echo $r['job_designation'];?>">Click Here</a></td>
							<td><a href="../view_jaf.php?job_design=<?php echo $r['job_designation'];?>" target="_blank">View</a></td>
							<td><?php if($r['drive_date']=='0000-00-00' || $r['set_drive']=='0'){ echo 'Under Process'; }else{echo $r['drive_date'];}?></td>
						  </tr>
						  <?php }?>
						</table>
						
						</li>

						</ol>
					</div>
				<p style="color:blue; padding-left:20px; text-align:justify; margin:0px;">For any query email us at <u>tnp.soet.hnbgu@gmail.com</u> or contact us.</p>
				</div>
			<!--  Right Banner Ending   -->
		</div>
</body>