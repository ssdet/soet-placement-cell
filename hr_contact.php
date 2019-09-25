<?php
require 'db_con/connect.php';
?>
<title>HR Details Form</title>
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
	text-align:left;
}
input[type=text],input[type=email]{
width:90%;
padding:3px;

}

input[type=submit]{
width:20%;
padding:3px;
}
</style>

<div class="procde">
<form method="POST">
<table style="width:80%">
	<h3 style="text-align:center;">Update Details</h3>
	  <tr>
		<td>*Company Name: <input type="text" name="cname" required></td>
		<td>Company Address:<input type="text" name="caddress"></td> 
	  </tr>
	  <tr>
		<td>Company Profile: <input type="text" name="ctype"></td>
		<td>*HR Name: <input type="text" name="hrname" required></td> 
	  </tr>
	  <tr>
		<td>Contact Number: <input type="text" name="contact"></td>
		<td>Other Number: <input type="text" name="contact2"  ></td> 
	  </tr>
	  <tr>
		<td>*Company Email: <input type="text" name="cemail" required></td>
		<td>*Your Name: <input type="text" name="name"></td> 
	  </tr>
	  <tr>
		<td>*Your Email: <input type="email" name="email" required></td> 
		<td>*Your Department: <input type="text" name="department" required></td>
	  </tr>
	  <tr>
		<td>*Your Contact: <input type="text" name="pcontact" required></td> 
		<td><input type="hidden"></td>
	  </tr>
	  <tr>
		<td><br><input type="submit" value="Submit"></input></td> 
	  </tr>
	  
</table>
</form>
<?php
if(isset($_POST['cname']) && !empty($_POST['cname'])){
	if(isset($_POST['email']) && !empty($_POST['email'])){
		if(isset($_POST['cemail']) && !empty($_POST['cemail'])){
			$cname=$_POST['cname'];
			$caddress=$_POST['caddress'];
			$hrname = $_POST['hrname'];
			$ctype = $_POST['ctype'];
			$contact = $_POST['contact'];
			$contact2 = $_POST['contact2'];
			$cemail=$_POST['cemail'];
			$name=$_POST['name'];
			$email=$_POST['email'];
			$department=$_POST['department'];
			$pcontact=$_POST['pcontact'];
			
			$q1="INSERT INTO hr_details VALUES('$cname','$caddress','$ctype','$hrname','$contact','$contact2','$cemail','$name','$email','$department', '$pcontact')";
			if(mysqli_query($conn,$q1)){
				echo '<p style="text-align:center;">Successfully Added!<br>
				<h3 style="text-align:center;">HOME PAGE: <a href="index.php">Click Here</a></h3></p>';
			}else{
				echo mysqli_error($conn);
			}
		}
	}
}
?>
</div>