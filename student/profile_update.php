<?php
session_start();
require '../db_con/connect.php';
if(isset($_SESSION['semail'])&&(!empty($_SESSION['semail']))){
 $user = $_SESSION['semail'];
}
else{
	header('Location:../index.php');
}

$q="SELECT * FROM student WHERE semail='$user'";
$q_run=mysqli_query($conn,$q);
$r=mysqli_fetch_assoc($q_run);
?>

<style>
.procde{
	border: 3px solid red;
	border-radius: 15px 50px;
	padding:20px;
	margin:15px;
	text-align:justify;
}
h2{
	text-align:center;
}
table{
	margin-left:8%;
	text-align:right;
}
input[type=text]{
width:70%;
padding:3px;

}
input[type=submit]{
width:20%;
padding:3px;
}
</style>
<title>Update Profile</title>
<div class="procde">
<form method="POST">
<table style="width:80%">
	<h3 style="text-align:center;">Update Details</h3>
	  <tr>
		<td>Name: <input type="text" name="name" value="<?php echo $r['sname'];?>" required readonly></td>
		<td>Email: <input type="text" name="email" value="<?php echo $r['semail'];?>"  required readonly></td> 
	  </tr>
	  <tr>
		<td>Date of Birth: <input type="text" name="dob" value="<?php echo $r['dob'];?>"  required></td>
		<td>Gender: <input type="text" name="gender" value="<?php echo $r['gender'];?>"  required></td> 
	  </tr>
	  <tr>
		<td>Course: <input type="text" name="course" value="<?php echo $r['course'];?>"  required readonly></td>
		<td>Department: <input type="text" name="department" value="<?php echo $r['department']; ?>"  required readonly></td> 
	  </tr>
	  <tr>
		<td>10th Percentage: <input type="text" name="per10" value="<?php echo $r['per10'];?>"  required></td>
		<td>12th Percentage: <input type="text" name="per12" value="<?php echo $r['per12'];?>"  required></td> 
	  </tr>
	  <tr>
		<td>C.G.P.A: <input type="text" name="cgpa" value="<?php echo $r['tcgpa'];?>"  required></td>
		<td>Contact: <input type="text" name="contact" value="<?php echo $r['contact'];?>"  required></td> 
	  </tr>
	  <tr>
		<td>Year of Passing: <input type="text" placeholder="YYYY"name="yop" value="<?php echo $r['yop'];?>"  required></td>
		<td>Backlog: <input type="text" name="backlog" value="<?php echo $r['backlog'];?>"  required></td> 
	  </tr>
	  <tr>
		<td><br><input type="submit" value="Update"></input></td> 
	  </tr>
	  
</table>
</form>
<?php
if(isset($_POST['dob']) && !empty($_POST['dob'])){
	if(isset($_POST['gender']) && !empty($_POST['gender'])){
		if(isset($_POST['name']) && !empty($_POST['name'])){
			$dob=$_POST['dob'];
			$gender=$_POST['gender'];
			$per10 = $_POST['per10'];
			$per12 = $_POST['per12'];
			$cgpa = $_POST['cgpa'];
			$contact=$_POST['contact'];
			$yop=$_POST['yop'];
			$backlog=$_POST['backlog'];
			
			$q1="UPDATE student SET dob='$dob', gender='$gender', per10='$per10', per12='$per12', tcgpa='$cgpa', contact='$contact', yop='$yop', backlog='$backlog' 
			WHERE semail='$user'";
			if(!mysqli_query($conn,$q1)){
				echo mysqli_error($conn);
			}else{
				echo '<p style="text-align:center;">Successfully Updated</p>';
			}
		}
	}
}
?>
</div>