<?php
session_start();
require '../db_con/connect.php';
if(isset($_SESSION['com_id'])&&(!empty($_SESSION['com_id']))){
 echo '';
}
else{
	header('Location:../index.php');
}
$uemail = $_SESSION['com_id'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Job Announcement Form</title>
<link rel="stylesheet" type="text/css" href="../style/jaf.css">
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


<?php
	if(isset($_POST['job_design'])){
		$job = $_POST['job_design'];	
		 $job_type = $_POST['jtype'];
		 if($_POST['jtype']=='other1'){$job_type= $_POST['last1'];}else{$job_type = $_POST['jtype'];}
		 $job_des = $_POST['job_descrip'];
		 $posting = $_POST['posting'];
		 $joining = $_POST['joinning'];
		 $cost_to_company = $_POST['costcompany'];
		 $gross = $_POST['gross'];
		 $bonus = $_POST['bonus'];
		 $bond = $_POST['bond'];
		 $selection = $_POST['resume'].' & '.$_POST['written'].' & '.$_POST['Gd'].' & '.$_POST['Pi'].' & '.$_POST['Mt'];
		 $mini_offer = $_POST['offers'];
		 $eli_course = $_POST['eli_depart'];
		 $long_require = 'Members '.$_POST['noM'].' Rooms '.$_POST['noR'].' Other '.$_POST['require'];
		$q1 = "INSERT INTO job_log (email, job_designation, job_type, Job_description, posting, joining, cost_to_company, gross,bonus, bond, selection, mini_offer, eli_course, log_require)
		VALUES ('$uemail', '$job', '$job_type', '$job_des',  '$posting', '$joining', '$cost_to_company', '$gross', '$bonus', '$bond', '$selection', '$mini_offer', '$eli_course', '$long_require')";
		if($q1_run=mysqli_query($conn,$q1)){
			echo '<a href="index.php"><h3>Login Company<h3></a><h2 style="color:darkgreen; margin:0px; border:0px;">Successfully Posted a Job Announcement! After details verification, Login credentials will be Mailed. Thank You!</h2>';
		}else{
			echo mysqli_error($conn);
		}
}
?>



	<form method="POST">
		<div class="boxes">
		<h4><u>Job Profile</u></h4>
		<ul>
			<li><label>*Job Designation</label>
			<input type="text" required name="job_design">
			<li><label>*Job Type</label><br>
			1. Analytics<input type="radio" name="jtype" value="Analytics">
			2. Consulting<input type="radio" name="jtype" value="Consulting">
			3. Core (Technical)<input type="radio" name="jtype" value="Core (Technical)">
			4. Finance<input type="radio" name="jtype" value="Finance">
			5. I.T.<input type="radio" name="jtype" value="I.T.">
			6. Management<input type="radio" name="jtype" value="Management">
			7. Teaching & Research <input type="radio" name="jtype" value="Teaching & Research"><br>
			6. Other<input type="radio" name="jtype" value="other1">
			 (Please Specify)<input type="text" name="last1">	
		</ul>
		</div>
		<hr>
		<div class="boxes">
		<ul>
			<li><label><b>*Job Description</b></label>
			<input type="text" required name="job_descrip">
			<li><label><b>*Place of Posting</b></label>
			<input type="text" required name="posting">
			<li><label><b>*Joining By</b></label>
			<input type="text" placeholder="YYYY-MM-DD" required name="joinning" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
		</ul>
		</div>
		<hr>
		<div class="boxes">
			<h4><u>Salary Details</u></h4>
			<div>
				<p><ol>Please Note:
					<li>Performance based bonus should not be declared as part of Gross/CTC but to be indicated in Bonus/Perks/Incentive section.
					<li>Any amount to be disbursed later than the end of first 12 months should not be a part of Gross/CTC.
					<li>Joining Bonus/Signing Bonus to be indicated in Bonus/Perks/Incentive section.
					<li>Statutory Annual Payouts (e.g., Medical, LTC etc.) not to be a part of Gross.
				</ol></p>
			</div>
			<ul>
			<li><label>*Cost to Company</label>
			<input type="text" required name="costcompany">
			<li><label>*Gross<i>(Take-home, before tax and other deductions)</i></label>
			<input type="text" required name="gross"><br>
			<li><label>Bonus/Perks/Incentive <i>(if any)</i></label>
			<input type="text" name="bonus">
			<li><label>Bond or Service Contract (if yes, please specify)</i></label>
			<input type="text" name="bond">	
			</ul>
		</div>
		
		<hr>
		
		<div class="boxes">
			<h4><u>Selection Process</u></h4>
			<ul>
			<li><label>*Shortlist from Resumes - </label>
			Yes<input type="radio" name="resume" value="Resume">
			No<input type="radio" name="resume" value="N"><br>
			<li><label>*Written Test (Technical, Aptitude) - </label>
			Yes<input type="radio" name="written" value="Written">
			No<input type="radio" name="written" value="N"><br>
			<li><label>*Group Discussion - </label>
			Yes<input type="radio" name="Gd" value="Gd">
			No<input type="radio" name="Gd" value=" "><br>
			<li><label>*Personal Interview - </label>
			Yes<input type="radio" name="Pi" value="Pi">
			No<input type="radio" name="Pi" value="N"><br>
			<li><label>*Medical Test - </label>
			Yes<input type="radio" name="Mt" value="Medical Test">
			No<input type="radio" name="Mt" value="N"><br>
			<li><label>*Minimum Number of offers you intend to make - </label>
			<input type="text" required name="offers">
			<li><label>*Eligible Departments and Programs</label>
			<input type="text" required name="eli_depart">
			<p>(List of Programs are available at <a href="index.php" target="_blank">Website</a>)</p>
			</ul>
		</div>
		
		<hr>
		
		<div class="boxes">
		<ul>
			<h4><u>Logistics Requirements</u></h4>
			<li><label>*Number of Members</label>
			<input type="text" required name="noM">
			<li><label>*Number of Rooms Required for Selection Process</label>
			<input type="text" required name="noR">
			<li><label>*Other Requirements</label>
			<input type="text" required name="require">
		</ul>
		</div>
		<hr>
		<p><b style="color:red;">Fields marked by ‘*’ are mandatory.</b></p>

	<p>
	Companies are welcome to come for recruiting multiple times if interested. Companies on campus are advised not to engage in any off-campus activity.<br>
	For further queries, please contact <u>tnp.soet.hnbgu@gmail.com</u> or call at <u>+91 7579407840</u>.<br>
	For more details, please visit to: <a href="index.php"  target="_blank">Our Website</a>.
</p>
	<div class="row">
		<input type="submit" value="Submit">
	</div>
  </form>
</div>
<footer>
</footer>
</div>
</body>
</html>