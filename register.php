<?php
	session_start();
?>
<html>
<head>
	<title>Tangled Thoughts</title>
	
	<?php include 'head.html'; 
	?>
	
	<?php include 'header.html'; 
	?>
	
	<script type="text/javascript">
		window.onload = function(){
			document.getElementById("homeNav").className = "nav-item enabled";
			document.getElementById("aboutNav").className = "nav-item enabled";
			document.getElementById("contactNav").className = "nav-item enabled";
			document.getElementById("doctorNav").className = "nav-item enabled";
			document.getElementById("quizNav").className = "nav-item enabled";
		}
	</script>
	
	 <!-- Banner -->
	<div class="card bg-dark text-white my-5">
	<img src="img/ban5.png" class="card-img" alt="banner">
	</div>
	
	<!-- Registration=-->
		<div class="col-lg-6 col-12">
			<div class="reg-wrapper">
				<h1>Registration</h1>
			
			<?php
			if (isset($_POST['submitted'])) {
				if ($dbc=mysqli_connect("localhost", "root", "")) {
					$problem=false;
					
					if (@mysqli_select_db($dbc, 'tt')) {
						$problem=false;
					}
					else 
						print '<p style="color: red;">could not select the database because: <br />' . mysqli_error($dbc) . '.</p>';
				}
				else {
					print '<p style="color: red;">could not connect to MySQL:' . mysqli_error($dbc) . '.</p>';
				}
				$problem=FALSE;

				if (!empty($_POST['name']) && !empty($_POST['un']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['pw'])) {
					$name=$_POST['name'];
					$un=$_POST['un'];
					$age=$_POST['age'];
					$email=$_POST['email'];
					$pw=$_POST['pw'];	
				}
				else {
					print '<p style="color: red;">please ensure all fields are not empty.</p>';
					$problem=TRUE;
				}

				if (!$problem) {
					$contact=$_POST['contact'];
					$query="INSERT INTO reg(user_id, fullname, username, contact, age, email, password) VALUES (0, '$name', '$un', '$contact', '$age', '$email', '$pw')";
					if (@mysqli_query($dbc, $query)) {
						header("Location: /x/login.php?success=1");
					}
					else 
						print '<p style="color: red;">could not create account because: <br />' . mysqli_error($dbc) . '.</p>';
					
					mysqli_close($dbc);
				}
			}
			?>
				
			<form action="register.php" method="post">
			<div class="reg-form">
				<div class="input-box">
					<label>Full Name<span>*</span></label>
					<input type="Text" name="name" required>
				</div>
				<div class="input-box">
					<label>Age<span>*</span></label>
					<input type="number" name="age" min="1" max="100" required>
				</div>
				<div class="input-box">
					<label>Username<span>*</span></label>
					<input type="Text" name="un" required>
				</div>
				<div class="input-box">
					<label>Password<span>*</span></label>
					<input type="password" name="pw" required>
				</div>
				<div class="input-box">
					<label>Email<span>*</span></label>
					<input type="email" name="email" required>
				</div>
				<div class="input-box">
					<label>Contact Number</label>
					<input type="tel" name="contact">
				</div>
				<div class="form-btn">
					<input type="Submit" value="Register" class="submitBtn">
					<input type='hidden' name='submitted' value='true'>
				</div>
			</div>
				<a class="sign-in" href="login.php">Already have an account? Sign in here.</a>
			</form>
			</div>
		</div>
	</body>