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

<?php $q="SELECT * FROM company";					
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
<title>Registered Companies</title>
<body class="procde">
<h2><u>Registered Companies</u></h2>	
	<table style="width:100%">
	  <tr>
		<th>Company Name</th>
		<th>User Full Name</th> 
		<th>User Designation</th>
		<th>Contact</th>
		<th>Other Contact</th> 
		<th>Registered Email</th>
		<th>Password</th> 
		<th>Website</th>
		<th>Company Type</th>
		<th>Postal Address</th> 
		<th>Write</th> 
		
	  </tr>
	  <?php  
		while($r=mysqli_fetch_assoc($q_run)){
	?>
	  <tr>
		<td><?php echo $r['company_name'];?></td>
		<td><?php echo $r['full_name'];?></td> 
		<td><?php echo $r['designation'];?></td>
		<td><?php echo $r['contact'];?></td>
		<td><?php echo $r['contact2'];?></td>
		<td><?php echo $r['cemail'];?></td>
		<td><?php echo $r['password'];?></td> 
		<td><?php echo $r['website'];?></td>
		<td><?php echo $r['company_type'];?></td>
		<td><?php echo $r['postal_address'];?></td>
		<td><?php echo $r['writeup'];?></td>
	  </tr>
	<?php }?>
	</table>
	<p style="text-align:center; color:red;">
<b>Click Here:<a href="amain.php" target="_parent">Admin Page</a></b></p>
</body>