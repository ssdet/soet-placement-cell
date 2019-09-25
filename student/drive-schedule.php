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
<?php $q="SELECT id, email, job_designation, drive_date, set_drive FROM job_log";					
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
<title>Drive Schedule</title>
<body class="procde">
<h2><u>Drive Schedule</u></h2>	
	<table style="width:100%">
	  <tr>
		<th>Job ID</th>
		<th>Company Name</th>
		<th>Job Designation</th> 
		<th>Date</th>	
		<th>Drive Set</th>	
	  </tr>
	  <?php  
		while($r=mysqli_fetch_assoc($q_run)){
	?>
	  <tr>
	  <?php $mail=$r['email'];
	  $w="SELECT company_name FROM company WHERE cemail='$mail'";
	  $w_run=mysqli_query($conn,$w);
	  $wf = mysqli_fetch_assoc($w_run);
		?>
		<td><?php echo $r['id'];?></td>
		<td><?php echo $wf['company_name'];?></td>
		<td><?php echo $r['job_designation'];?></td> 
		<td><?php echo $r['drive_date'];?></td>
		<td><?php if($r['set_drive']=='0'){echo 'Not Fixed';}else{echo 'Final Date'; }?></td>
	  </tr>
		<?php }?>
	</table>
	<p style="text-align:center; color:red;">
<b>Click Here:<a href="amain.php" target="_parent">Admin Page</a></b></p>
</body>