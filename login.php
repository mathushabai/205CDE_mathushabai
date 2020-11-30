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

	<?php
		if (isset($_POST['submitted'])) {
			
			if ($dbc=mysqli_connect("localhost", "root", "",)) {
				if (@mysqli_select_db($dbc, 'tt'))
					print '<p>the database has been selected!</p>';
				else 
					print '<p style="color: red;">Could not select the database because: <br />' . mysqli_error($dbc) . '.</p>';
			}
			else {
				print '<p style="color: red;">Could not conenct to MySQL:' . mysqli_error($dbc) . '.</p>';
			}
			$problem=FALSE;

			if (!empty($_POST['un']) && !empty($_POST['pw'])) {
				$un=$_POST['un'];
				$pw=$_POST['pw'];	
			}
			else {
				print '<p style="color: red;">please ensure all fields are not empty.</p>';
				$problem=TRUE;
			}
								
			if (!$problem) {
				$query="SELECT * FROM cusreg WHERE cusreg.username='$un' AND cusreg.password='$pw'";
				$result=mysqli_query($dbc, $query);
				$row = mysqli_fetch_assoc($result);
				
				if ($pw == $row['password']) {
					$_SESSION['username']="$un";
					$_SESSION['userlogin']=TRUE;
					echo "<script type='text/javascript'>window.top.location='home.php';</script>"; 
					exit;
				}
				else {
					print '<p>Username or password is incorrect.</p>';
					header("Refresh:0");
					return false;
				}
			}
		}
	?>			
	
	<div class="card bg-dark text-white my-5">
	<img src="img/ban4.png" class="card-img" alt="banner">
	</div>
		
	<div class="login-wrapper py-3 my-5" id="log-wrapper">
		<h1>Sign In</h1>
		<?php
			if ( isset($_GET['success']) && $_GET['success'] == 1 ) 
				print("<p align='center'><font color=green>User account successfully created!</font></p>");
		?>
		
		<div class="col-lg-6 col-12" id="log-col">
			<form action="login.php" method="post">
			<div class="account-form">
				
				<div class="input-box">
					<label>Username/ Email address<span>*</span></label>
					<input type="text" name='un' required>
				</div>
				
				<div class="input-box">
					<label>Password<span>*</span></label>
					<input type="password" name="pw" required>
				</div>
				<div class="form-btn">
					<input type="Submit" value="Login" class="submitBtn">
					<input type='hidden' name='submitted' value='true'>
					<label class="label-for-checkbox">
					<input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
						<span>Remember me</span>
					</label>
				</div>
				<a class="forget-pass" href="#">Forgot password?</a>
			</div>
		</div>
			<a id="register-now" href="register.php">Don't have an account? Register here.</a>
		</form>
	</div>
</body>