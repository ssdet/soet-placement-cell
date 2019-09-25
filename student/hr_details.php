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

<?php $q="SELECT * FROM hr_details";					
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
<title>HR Details</title>
<body class="procde">
<h2><u>HR Details</u></h2>	
	<table style="width:100%">
	  <tr>
		<th>Company Name</th>
		<th>Company Address</th> 
		<th>Company Type</th>
		<th>HR Name</th>
		<th>Contact</th> 
		<th>Other Contact</th>
		<th>Company Email</th> 
		<th>Provider Name</th>
		<th>Provider Email</th>
		<th>Department/Course</th> 		
		<th>Provider</th> 		
	  </tr>
	  <?php  
		while($r=mysqli_fetch_assoc($q_run)){
	?>
	  <tr>
		<td><?php echo $r['cname'];?></td>
		<td><?php echo $r['caddress'];?></td> 
		<td><?php echo $r['ctype'];?></td>
		<td><?php echo $r['hr_name'];?></td>
		<td><?php echo $r['contact'];?></td>
		<td><?php echo $r['contact2'];?></td>
		<td><?php echo $r['cemail'];?></td> 
		<td><?php echo $r['name'];?></td>
		<td><?php echo $r['email'];?></td>
		<td><?php echo $r['department'];?></td>
		<td><?php echo $r['p_contact'];?></td>
	  </tr>
	<?php }?>
	</table>
	<p style="text-align:center; color:red;">
<b>Click Here:<a href="amain.php" target="_parent">Admin Page</a></b></p>
</body>