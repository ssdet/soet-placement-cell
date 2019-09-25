<?php
session_start();
require 'db_con/connect.php';
if(isset($_GET['com_email'])){
	$_SESSION['com_id']=$_GET['com_email']; 
}
if(isset($_SESSION['com_id'])&&(!empty($_SESSION['com_id']))){
 if(isset($_GET['job_design'])&&(!empty($_GET['job_design']))){
	 $key = $_GET['job_design'];
	 $uemail = $_SESSION['com_id'];
 }else{
	 echo 'Job Designation Problem!';
 }
}
else{
	header('Location:index.php');
}

$q = "SELECT * FROM job_log WHERE email='$uemail' AND job_designation='$key'";
$q_run=mysqli_query($conn,$q);
	$r = mysqli_fetch_assoc($q_run);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Job Announcement Form</title>
<link rel="stylesheet" type="text/css" href="style/jaf.css">
</head>
<body class="bg">
<div id="main-box">
<header>
<h3 style="text-align:center;">SCHOOL OF ENGINEERING AND TECHNOLOGY<br>
HEMVATI NANDAN BAHUGUNA GARHWAL UNIVERSITY<br>
CAMPUS PLACEMENTS 2019-2020<br>
JOB ANNOUNCEMENT FORM</h3><hr>
</header>
<div>
	<form method="POST">
		<div class="boxes">
		<h4><u>Job Profile</u></h4>
		<ul>
			<li><label>*Job Designation</label>
			<input type="text" value="<?php echo $key; ?>" readonly>
			<li><label>*Job Type</label><br>
			<input type="text" value="<?php echo $r['job_type'];?>" readonly>	
		</ul>
		</div>
		<hr>
		<div class="boxes">
		<ul>
			<li><label><b>*Job Description</b></label>
			<input type="text" required value="<?php echo $r['Job_description'];?>" readonly>
			<li><label><b>*Place of Posting</b></label>
			<input type="text" value="<?php echo $r['posting'];?>" readonly>
			<li><label><b>*Joining By</b></label>
			<input type="text" value="<?php echo $r['joining'];?>" readonly>
		</ul>
		</div>
		<hr>
		<div class="boxes">
			<h4><u>Salary Details</u></h4>
			<ul>
			<li><label>*Cost to Company</label>
			<input type="text" value="<?php echo $r['cost_to_company'];?>" readonly>
			<li><label>*Gross<i>(Take-home, before tax and other deductions)</i></label>
			<input type="text" value="<?php echo $r['gross'];?>" readonly><br>
			<li><label>Bonus/Perks/Incentive <i>(if any)</i></label>
			<input type="text" value="<?php echo $r['bonus'];?>" readonly>
			<li><label>Bond or Service Contract (if yes, please specify)</i></label>
			<input type="text" value="<?php echo $r['bond'];?>" readonly>	
			</ul>
		</div>
		
		<hr>
		
		<div class="boxes">
			<h4><u>Selection Process</u></h4>
			<ul>
			<li><label>*Requirements</label>
			<textarea readonly><?php echo $r['selection'];?></textarea><br>
			<li><label>*Minimum Number of offers you intend to make - </label>
			<input type="text" value="<?php echo $r['mini_offer'];?>" readonly>
			<li><label>*Eligible Departments and Programs</label>
			<input type="text" value="<?php echo $r['eli_course'];?>" readonly>
			<p>(List of Programs are available at <a href="index.php" target="_blank">Website</a>)</p>
			</ul>
		</div>
		
		<hr>
		
		<div class="boxes">
		<ul>
			<h4><u>Logistics Requirements</u></h4>
			<textarea readonly><?php echo $r['log_require'];?></textarea><br>
		</ul>
		</div>
		<hr>

  </form>
</div>
</div>
</body>
</html>