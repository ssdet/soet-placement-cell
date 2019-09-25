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
		$r1=mysqli_fetch_assoc($q_run);
		$course=$r1['department'];
		$min10 = $r1['per10'];
		$min12 = $r1['per12'];
		$yop= $r1['yop'];
		$cgpa = $r1['tcgpa'];
		$backlog = $r1['backlog'];
		if($backlog=='Y'){$backlog = 'N';}else if($backlog=='N'){$backlog = 'Y';}
		$q="SELECT id,email, job_designation, min10, min12, cgpa, y_allow, backlog,drive_date FROM job_log WHERE min10 <= '$min10' AND min12<='$min12' AND cgpa <= '$cgpa' AND backlog <> '$backlog' AND drive_date <> '0000-00-00' AND y_allow >= '$yop'";
			$q_run=mysqli_query($conn,$q);	

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
						<h3><u><a href="profile_update.php">Update Student Profile</a></u></h3>
						<p>
						<ul><li><?php echo $r1['sname']?></li>
							<li><?php echo $user; ?></li>
							<li><?php echo $r1['department']?></li>
						</ul>
						</p>
					</div>
				</div>
			<!--  Left Banner Ending   -->
			
			<!--  Right Banner Starting   -->
				<div class="right-banner">
				<p style="color:red; text-align:center;">Highly recommended to read procedure before moving forward!<br><br>
					Please complete Step 1 & 2 before moving to Job Announcements! 
				</p>
					<div id="job">
					<h3><u>Step 1:Profile is Complete</u></h3>
					<h3 style="color:blue;"><a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLScVezB5oQatBCjaY4zwdLIUAJxr_criXkNHL6wDkzjyFqDy-A/viewform" target="">Step 2:Upload Resume</a></h3>
					<!--  Job Announcements   -->
						<h3 style="color:blue;">Job Announcements</h3>
						<ol>
						<li> * Companies Interested:
						<table style="width:100%">
						  <tr>
							<th>Job ID</th>
							<th>Company Name</th>
							<th>Job Designation</th> 
							<th>JNF</th>
							<th>Last Date/ Drive Date</th>
							<th>Interested</th>
						  </tr>
						<?php  
							while($r=mysqli_fetch_assoc($q_run)){
								$c_id=$r['id'];
								$cq="SELECT * FROM course_allow WHERE course='$course'";
								$q_r=mysqli_query($conn,$cq);
								$q_num=mysqli_num_rows($q_r);
								if($q_num!='0'){
						?>
						  <tr>
						  <?php 
						  $email=$r['email'];
						  $qw= "SELECT company_name FROM company WHERE cemail='$email'";
						  $qw_run=mysqli_query($conn,$qw);
							$rw=mysqli_fetch_assoc($qw_run);
						  ?>
							<td><?php echo $r['id'];?></td>
							<td><?php echo $rw['company_name'];?></td>
							<td><?php echo $r['job_designation'];?></td> 
							<td><a href="../view_jaf.php?job_design=<?php echo $r['job_designation'];?>&com_email=<?php echo $user;?>" target="_blank">Details</a></a></td>
							<td><?php echo $r['drive_date'];?></td> 
							<td><?php 
								$id = $r['id'];
								$w="SELECT * FROM drive_interest where id='$id' AND student_email='$user'";
								
								$w_run=mysqli_query($conn,$w);
								$w_num=mysqli_num_rows($w_run);
								$wr=mysqli_fetch_assoc($w_run);
								if($w_num=='0'){
									echo 'Under Progress!';
								}else if($w_num=='1'){
									echo 'YES';
								}
							?>
							</td>
								</tr> <?php }}?>
						</table>
						<li><br>
						<form method="POST">
							<label>Enter Job ID</label>
							<input type="text" name="job_id">
							<input type="submit" value="Interested"></input>
						</form>
						<?php if(isset($_POST['job_id']) && !empty($_POST['job_id'])){
								$id1 = $_POST['job_id'];
								$qu="INSERT INTO drive_interest (id, student_email) VALUES ('$id1','$user')";
								if($qu_run=mysqli_query($conn,$qu)){
									echo 'Status Updated!';
									header('Location:student-page.php');
								}else{
									echo mysqli_error($conn);
								}
							}?>
						</ol>
					</div>
				
				<p style="color:blue; padding-left:20px; text-align:justify;">For any query email us at <u>tnp.soet.hnbgu@gmail.com</u> or contact us.</p>
				</div>
			<!--  Right Banner Ending   -->
		</div>
</body>