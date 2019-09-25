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

<?php $q="SELECT * FROM drive_interest";					
			$q_run=mysqli_query($conn,$q);			
?>
<style>
.procde{
	border: 3px solid red;
	border-radius: 15px 50px;
	padding:30px;
	margin:15px;
	text-align:justify;
}
h2{
	text-align:center;
}
h4{
	text-align:center;
}

table, th, td {
  border: 1px solid black;
}
</style>

<title>Companies & Interested Students</title>

<body class="procde">
<h2><u>Interested Students</u></h2>	
	<table style="width:100%">
	  <tr>
		<th>Job ID</th>
		<th>Company Name</th>
		<th>Designation</th> 
		<th>Interested Students</th>		
	  </tr>
	  <?php  
		while($r=mysqli_fetch_assoc($q_run)){
	?>
	  <tr> <?php 
	  $id=$r['id'];
	  $semail=$r['student_email'];
	  $q1="SELECT email, job_designation FROM job_log WHERE id='$id'";
		$q1_run=mysqli_query($conn,$q1);
		$r1=mysqli_fetch_assoc($q1_run);
		$cemail=$r1['email'];
		$q2="SELECT company_name FROM company WHERE cemail='$cemail'";
		$q2_run=mysqli_query($conn,$q2);
		$r2=mysqli_fetch_assoc($q2_run);
	$q3="SELECT sname FROM student WHERE semail='$semail'";	
	$q3_run=mysqli_query($conn,$q3);
		$r3=mysqli_fetch_assoc($q3_run);
	  ?>
		<td><?php echo $id;?></td>
		<td><?php echo $r2['company_name'];?></td>
		<td><?php echo $r1['job_designation'];?></td>
		<td><?php echo $r3['sname'];?></td>
	  </tr>
	<?php }?>
	</table>
	<p style="text-align:center; color:red;">
<b>Click Here:<a href="amain.php" target="_parent">Admin Page</a></b></p>
</body>