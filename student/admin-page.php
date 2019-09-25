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

<?php $q="SELECT * FROM job_log";					
			$q_run=mysqli_query($conn,$q);	
?>
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="css/admin-page.css">
<body>	
<!--  Logo Banner Begin   -->
	<div class="banner">
		<a href="admin-page.php"><img id="img_logo" src="../img/logo.png"></img></a>
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
				<p style="color:red; text-align:center;">Highly recommended to read procedure before moving forward!</p>
					<div id="job">
					<!--  Job Announcements   -->
						<h3 style="color:blue;">Job Announcements</h3>
						<table style="width:100%">
						  <tr>
							<th>Job ID</th>
							<th>Company Name</th>
							<th>Job Designation</th> 
							<th>JNF</th>
							<th>Drive Date</th>
						  </tr>
						<?php  
							while($r=mysqli_fetch_assoc($q_run)){
						?>
						  <tr>
						  <?php $cemail = $r['email'];
								$q1="SELECT company_name FROM company WHERE cemail='$cemail'";					
								$q1_run=mysqli_query($conn,$q1);	
								$r1 = mysqli_fetch_assoc($q1_run); ?>
							<td><?php echo $job = $r['id'];?></td>
							<td><?php echo $r1['company_name'];?></td>
							<td><?php echo $job = $r['job_designation'];
							if(isset($_GET['date'])){
									$date1 = $_GET['date'];
								$q1="UPDATE job_log set drive_date='$date1' WHERE email='$cemail' AND job_designation='$job'";
								$q1_run=mysqli_query($conn,$q1);
								header("location:admin-page.php");
								}
							?></td>						
							<td><a href="../view_jaf.php?job_design=<?php echo $r['job_designation'];?>&com_email=<?php echo $r['email'];?>" target="_blank">Details</a></a></td>
							<td><?php if($r['drive_date']=='0000-00-00'){
								
								echo 'No Date!';}else{
										echo $r['drive_date'];
									}
							?></td>	
							</tr> <?php }?>
						</table>
						<hr>
						<li><h3 style="color:blue;">Set Drive Date</h3>
						<form method="POST">
							<label>Job ID:</label>
							<input type="text" name="job_id">
							<label>Enter Last Date For Submission:</label>
							<input type="text" placeholder="YYYY-MM-DD" 
							pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"
							name="drive_date"><br>
							<input type="submit" value="Submit"></input>
						</form>
					<?php if(isset($_POST['drive_date']) && !empty($_POST['drive_date'])){
								$date = $_POST['drive_date'];
								$id = $_POST['job_id'];
								$qu="UPDATE job_log SET drive_date='$date' WHERE id='$id'";
								if($qu_run=mysqli_query($conn,$qu)){
									echo 'Status Updated!';
									header('Location:admin-page.php');
								}else{
									echo mysqli_error($conn);
								}
							}?>
						<hr>
					
					<table style="width:50%">
						  <tr>
							<th>Job ID</th>
							<th>Eligible Course</th>
						  </tr>
						<?php  
						$query ="SELECT * FROM course_allow"; 
						$query_run=mysqli_query($conn,$query);
							while($rquery=mysqli_fetch_assoc($query_run)){
						?>
						  <tr>
							<td><?php echo $rquery['job_id'];?></td>
							<td><?php echo $rquery['course'];?></td>	
						  </tr> <?php }?>
						</table>
					
					
					<li><h3 style="color:blue;">Department Eligible</h3>
					<form method="POST">
							<label>Job ID:</label>
							<input type="text" name="job_id1"><br>
							<label>Enter Course Eligible:</label>
							 <select name="course">
								  <option value="CSE">Computer Science and Engineering</option>
								  <option value="MCA">Master of Computer Application</option>
								  <option value="ECE">Electronics and Communication Engineering</option>
								  <option value="ME">Mechanical Engineering</option>
								  <option value="IT">Information and Technology</option>
								  <option value="IN">Instrumentation Engineering</option>
								  <option value="MTechCSE">MTech CSE</option>
							  </select><br>
							<input type="submit" value="Submit"></input>
						</form>
					<?php if(isset($_POST['course']) && !empty($_POST['course'])){
								$course = $_POST['course'];
								$id = $_POST['job_id1'];
								$qu="INSERT INTO course_allow (job_id,course) VALUES ('$id', '$course')";
								if($qu_run=mysqli_query($conn,$qu)){
									echo 'Status Updated!';
									header('Location:admin-page.php');
								}else{
									echo mysqli_error($conn);
								}
							}?>
					</div>
					
					<hr>
				<p style="color:blue; padding-left:20px; text-align:justify;">For any query email us at <u>tnp.soet.hnbgu@gmail.com</u> or contact us.</p>
				</div>
			<!--  Right Banner Ending   -->
		</div>
</body>