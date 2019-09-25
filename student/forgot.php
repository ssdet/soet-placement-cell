<?php
	require '../db_con/connect.php';
?>
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

.box1{
	background-color: #7F00FF;
	width:35%;
	margin:20px 20px 20px 30%;
	padding:20px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

label, input, select {
	display:grid;
	width:100%;
	padding:3px;
	margin:2px;
}
</style>
<title>Reset Password</title>
<div class="procde">
	<h2>Reset Password</h2>
		<div class="box1">
  
		  <form method="POST">
			<div>
			  <label for="email"><b>Email ID:</b></label>
			  <input type="email" placeholder="Enter Email" name="email" required>
				<label for="s_ques"><b>Security Question</b></label>
				  	  <select id="s_ques" name="s_ques">
					  <option value="101">What was your childhood nickname?</option>
					  <option value="102">What is the name of your favorite childhood friend?</option>
					  <option value="103">What was the name of your first stuffed animal?</option>
					  <option value="104">What was the last name of your third grade teacher?</option>
					  <option value="105">What is your oldest sibling's middle name?</option>
				  </select>
				  <input type="text" placeholder="Answer" name="s_ans" id="s_ans" required>
			  <button type="submit">Submit</button>
			</div>
		  </form>
		  
		<?php 
		if(isset($_POST['email']) && !empty($_POST['email'])){
			if(isset($_POST['s_ques']) && !empty($_POST['s_ques'])){
				if(isset($_POST['s_ans']) && !empty($_POST['s_ans'])){
					$email=$_POST['email'];
					$ques = $_POST['s_ques'];
					$ans = $_POST['s_ans'];
					$s="SELECT password FROM student WHERE semail='".mysqli_escape_string($conn,$email)."' AND sec_ques='".mysqli_escape_string($conn,$ques)."' AND sec_ans='".mysqli_escape_string($conn,$ans)."'";
					$q_run=mysqli_query($conn,$s);
					if(mysqli_num_rows($q_run)=='1'){
						$sf=mysqli_fetch_assoc($q_run);
						echo 'Password - '.$sf['password'];
					}else{
						echo 'Invalid Excess!';
					}
				}else{
					echo 'Answer is NOT Set!';
				}
			}
		}
		
		?>  
		</div>
</div>