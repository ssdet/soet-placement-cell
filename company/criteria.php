<?php
session_start();
require '../db_con/connect.php';
if(isset($_SESSION['com_id'])&&(!empty($_SESSION['com_id']))){
 if(isset($_GET['keyword'])&&(!empty($_GET['keyword']))){
	 $key = $_GET['keyword'];
	 $user = $_SESSION['com_id'];
 }else{
	 echo 'Keyword Problem!';
 }
}
else{
	header('Location:../index.php');
}


$q0="SELECT * FROM job_log WHERE email='$user' AND job_designation='$key'";
	$q0_run=mysqli_query($conn,$q0);
	$r0 = mysqli_fetch_assoc($q0_run);
?>
<title>Job Criteria Setting</title>
<link rel="stylesheet" type="text/css" href="css/cri.css">
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
</style>
<div class="procde">
	<h2>Filtering Criteria for <?php echo $key.' Job'?></h2>
		<div class="box">
  
		  <form action="thank.php" method="POST">
			<div class="image">
			  <img src="img/avatar.jpg" width="15%" alt="Avatar">
			</div>

			<div>
				  <label for="year"><b>Allowed Batch</b></label><br>
				  <input type="radio" name="year" value="2020" <?php if($r0['y_allow']=='2020'){echo 'checked';}?>>2020
				  <input type="radio" name="year" value="2021" <?php if($r0['y_allow']=='2021'){echo 'checked';}?>>2020 & 2021<br>
				  <label for="10min"><b>10 Marks (Minimum Percentage Required)</b></label>
				  <input type="text" name="10min" value="<?php echo $r0['min10']?>">
				  <label for="12min"><b>12 Marks (Minimum Percentage Required)</b></label>
				  <input type="text" name="12min" value="<?php echo $r0['min12']?>">
				  <label for="cgpamin"><b>CGPA (Minimum - Till now Required)</b></label>
				  <input type="text" name="cgpamin" value="<?php echo $r0['cgpa']?>">
				  <label for="backlog"><b>Back Log Students are</b></label><br>
				  <input type="radio" name="backlog" value="A" <?php if($r0['backlog']=='A'){echo 'checked';}?>>Allowed
				  <input type="radio" name="backlog" value="N" <?php if($r0['backlog']=='N'){echo 'checked';}?>>Not Allowed</input><br>
				  <input type="hidden" name="key" value="<?php echo $key?>">
				  <button type="submit">Submit</button>
			</div>
		  </form>
</div>
</div>