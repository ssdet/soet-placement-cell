<?php
session_start();
if(isset($_SESSION['semail'])&&(!empty($_SESSION['semail']))){
 echo '';
}
else{
	header('Location:../index.php');
}

$semail=$_SESSION['semail'];
?>
<title>Complete Your Details</title>
<style>
.procde{
	border: 3px solid red;
	border-radius: 15px 50px;
	padding:20px;
	margin:15px;
}
h2{
	text-align:center;
}
h4{
	color:red;
}

.image{
	text-align:center;
}

.box_m{
	width:40%;
	margin:auto;
}

label, input, select {
	display:grid;
	width:100%;
	padding:3px;
	margin:2px;
}
</style>

<?php 
			include '../db_con/connect.php';
			if((!empty($_POST['10th']))&&(!empty($_POST['12th']))){
				if (!isset($_POST['cgpa'])|| (!isset($_POST['cgpa']))){
					echo 'Please entry complete details!';
				}else{
						$tenth=$_POST['10th'];
						$tweth=$_POST['12th'];
						$gender=$_POST['gender'];
						$dob=$_POST['dob'];
						$course=$_POST['course'];
						$department=$_POST['department'];
						$yop = $_POST['yop'];
						$cgpa=$_POST['cgpa'];
						$ques=$_POST['s_ques'];
						$ans=$_POST['s_ans'];
						$backlog = $_POST['backlog'];
					$q_pass="UPDATE student SET dob='$dob', gender='$gender', yop='$yop', course='$course', department='$department', per10='$tenth', per12='$tweth', tcgpa='$cgpa', sec_ques='$ques', sec_ans='$ans',backlog='$backlog' WHERE semail = '$semail'";
					if($q_run=mysqli_query($conn,$q_pass)){
						echo 'Successfully Completed!';
						header('Location:student-page.php');

					}else{
						echo mysqli_error($conn);
					}
					
				}
			}	
			?>
<div class="procde">
	<h2>Registration</h2>
		<div class="box">
		  <form action="profile.php" method="POST">
			<div class="image">
			  <img src="img/avatar.jpg" width="7%" alt="Avatar">
			</div>

			<div class="box_m">
			<div class="box_s1">
				  <label for="gender"><b>Gender</b></label>
				  <select id="gender" name="gender" required>
					  <option value="M">Male</option>
					  <option value="F">Female</option>
				  </select>
				   <label for="dob"><b>Date of Birth</b></label>
				  <input type="text" name="dob" placeholder="YYYY-MM-DD" required 
						pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" 
						title="Enter a date in this format YYYY-MM-DD"/>
				  <label for="course"><b>Course</b></label>
				  <select id="Course" name="course" required>
					  <option value="BTech">BTech</option>
					  <option value="MCA">MCA</option>
					  <option value="MTech">MTech</option>
				  </select>
				  <label for="course"><b>Department</b></label>
				  <select id="Course" name="department">
					  <option value="CSE">Computer Science and Engineering</option>
					  <option value="MCA">Master of Computer Application</option>
					  <option value="ECE">Electronics and Communication Engineering</option>
					  <option value="ME">Mechanical Engineering</option>
					  <option value="IT">Information and Technology</option>
					  <option value="IN">Instrumentation Engineering</option>
					  <option value="MTechCSE">MTech CSE</option>
				  </select>
				  <label for="yop"><b>Year of Graduation</b></label>
				  <select id="yop" name="yop">
					  <option value="2020">2020</option>
					  <option value="2021">2021</option>
				  </select>
				  
		</div>
		<div  class="box_s2">
				  <label for="10th"><b>10th Marks (Percentage or CGPA)</b></label>
				  <input type="text" name="10th" required>
				  <label for="12th"><b>12th Marks (Percentage)</b></label>
				  <input type="text" name="12th" required>
				  <label for="cgpa"><b>CGPA (till now)</b></label>
				  <input type="text" name="cgpa" id="cgpa" required>
				  <label for="s_ques"><b>Security Question</b></label>
				  	  <select id="s_ques" name="s_ques">
					  <option value="101">What was your childhood nickname?</option>
					  <option value="102">What is the name of your favorite childhood friend?</option>
					  <option value="103">What was the name of your first stuffed animal?</option>
					  <option value="104">What was the last name of your third grade teacher?</option>
					  <option value="105">What is your oldest sibling's middle name?</option>
				  </select>
				  <input type="text" placeholder="Answer" name="s_ans" id="s_ans" required>
				  <label for="backlog"><b>Any Backlog</b></label>
				  <select id="backlog" name="backlog" required>
					  <option value="Y">YES</option>
					  <option value="N">NO</option>
				  </select>
				  
		</div>
		</div>
		<input style="width:30%; margin:auto;"type="submit" value="Register"></input>
		  </form>
</div>
</div>