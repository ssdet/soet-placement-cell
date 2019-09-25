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
<?php $q="SELECT * FROM student";					
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
<title>Registered Students</title>
<body class="procde">
<h2><u>Registered Students</u></h2>	
	<table style="width:100%">
	  <tr>
		<th>Student Name</th>
		<th>Email</th>
		<th>Roll Number</th>
		<th>Date of Birth</th> 
		<th>Gender</th>
		<th>Course</th> 
		<th>Department</th>
		<th>10th Percentage</th>
		<th>12th Percentage</th>
		<th>C.G.P.A</th>
		<th>Contact Number</th>
		<th>Year of Passing</th>
		<th>Backlog</th>		
	  </tr>
	  <?php  
		while($r=mysqli_fetch_assoc($q_run)){
	?>
	  <tr>
		<td><?php echo $r['sname'];?></td>
		<td><?php echo $r['semail'];?></td>
		<td><?php echo $r['roll_num'];?></td>
		<td><?php echo $r['dob'];?></td>
		<td><?php echo $r['gender'];?></td> 
		<td><?php echo $r['course'];?></td>
		<td><?php echo $r['department'];?></td>
		<td><?php echo $r['per10'];?></td> 
		<td><?php echo $r['per12'];?></td>
		<td><?php echo $r['tcgpa'];?></td>
		<td><?php echo $r['contact'];?></td>
		<td><?php echo $r['yop'];?></td>
		<td><?php echo $r['backlog'];?></td>
	  </tr>
		<?php }?>
	</table>
	<p style="text-align:center; color:red;">
<b>Click Here:<a href="amain.php" target="_parent">Admin Page</a></b></p>
</body>