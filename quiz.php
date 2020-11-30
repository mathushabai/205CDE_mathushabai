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
			document.getElementById("quizNav").className = "nav-item disabled";
		}
	</script>
		
	
	<?php
		if ($dbc=mysqli_connect("localhost", "root", "")) {
			if (@mysqli_select_db($dbc, 'tt')) {
				
				$query = "SELECT * FROM quiz";
				$run_query = mysqli_query($dbc, $query);
				
				$qs = array();
				$ans1 = array();
				$ans2 = array();
				$ans3 = array();
				$ans4 = array();
		
				if (mysqli_num_rows($run_query) > 0) {
					while ($row = mysqli_fetch_assoc($run_query)) {
						array_push($qs,$row['qs']);
						array_push($ans1,$row['ans1']);
						array_push($ans2,$row['ans2']);
						array_push($ans3,$row['ans3']);
						array_push($ans4,$row['ans4']);
					}
				}
			}
		}
	?>
	
	<div class="cards bg-dark text-white my-5">
		<img src="img/ban8.jpeg" class="cards-img" alt="banner">
	</div>
	
	<!--Quiz Qs 1-->
	<div class="col-lg-5" id="quiz-col">
	<form action="quiz.php" method="post">
	<div class="jumbotron" id="page1" style="background-color:white;">
	
	<?php
		if (isset($_POST['submitted'])) {
			
			if ($dbc2=mysqli_connect("localhost", "root", "",)) {
				if (@mysqli_select_db($dbc2, 'tt'))
					$problem=FALSE;
				else 
					print '<p style="color: red;">Could not select the database because: <br />' . mysqli_error($dbc2) . '.</p>';
			}
			else {
				print '<p style="color: red;">Could not conenct to MySQL:' . mysqli_error($dbc2) . '.</p>';
			}
			$problem=FALSE;

			if (!empty($_POST['qs1']) && !empty($_POST['qs2']) && !empty($_POST['qs3']) && !empty($_POST['qs4']) && !empty($_POST['qs5']) && !empty($_POST['qs6']) && !empty($_POST['qs7']) && !empty($_POST['qs8']) && !empty($_POST['qs9']) && !empty($_POST['qs10'])) {
				$qs1=$_POST['qs1'];
				$qs2=$_POST['qs2'];	
				$qs3=$_POST['qs3'];
				$qs4=$_POST['qs4'];	
				$qs5=$_POST['qs5'];
				$qs6=$_POST['qs6'];		
				$qs7=$_POST['qs7'];
				$qs8=$_POST['qs8'];		
				$qs9=$_POST['qs9'];
				$qs10=$_POST['qs10'];		
			}
			else {
				print '<p style="color: red; font-size:14px;">Please ensure all fields are not empty.</p>';
				$problem=TRUE;
			}
								
			if (!$problem) {
				$query="INSERT INTO quiz-entry(qs1, qs2, qs3, qs4, qs5, qs6, qs7, qs8, qs9, qs10) 
						VALUES ('$qs1', '$qs2', '$qs3', '$qs4', '$qs5', '$qs6', '$qs7', '$qs8', '$qs9', '$qs10')";
					
					if (@mysqli_query($dbc2, $query)) {
						header("Location: /x/home.php");
					}
					else {
						print '<p style="color: red;">Could not submit entry because: <br />' . mysqli_error($dbc2) . '.</p>';
					}
				mysqli_close($dbc2);
			}
		}
	?>
	<h3>Please choose the options you could relate to most within the past month.</p>
		<div class="quiz-wrapper">
		<label class="question" style="margin-top:20px;"><?php echo $qs[0]; ?></label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs1">
				</div>
				<label class="ans1"><?php echo $ans1[0]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs1">
				</div>
				<label class="ans2"><?php echo $ans2[0]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs1">
				</div>
				<label class="ans3"><?php echo $ans3[0]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs1">
				</div>
				<label class="ans4"><?php echo $ans4[0]; ?></label>
			  </div>
			</div>
		</div>
		
		<div class="progress" style="margin-top:80px;">
			<div class="progress-bar progress-bar-striped active" role="progressbar" id="quiz-bar"
				aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">
				0%
			</div>
		</div>
	</div>
	
	<!--Quiz Qs 2-->
	<div class="jumbotron page" id="page2" style="background-color:white;">
		<div class="quiz-wrapper">
		<label class="question" style="margin-top:20px;"><?php echo $qs[1]; ?></label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs2">
				</div>
				<label class="ans1"><?php echo $ans1[1]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs2">
				</div>
				<label class="ans2"><?php echo $ans2[1]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs2">
				</div>
				<label class="ans3"><?php echo $ans3[1]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs2">
				</div>
				<label class="ans4"><?php echo $ans4[1]; ?></label>
			  </div>
			</div>
		</div>
		<div class="progress" style="margin-top:80px;">
			<div class="progress-bar progress-bar-striped active" role="progressbar" id="quiz-bar"
				aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
				20%
			</div>
		</div>
	</div>
	
	<!--Quiz Qs 3-->
	<div class="jumbotron page" id="page3" style="background-color:white;">
		<div class="quiz-wrapper">
		<label class="question" style="margin-top:20px;"><?php echo $qs[2]; ?></label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs3">
				</div>
				<label class="ans1"><?php echo $ans1[2]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs3">
				</div>
				<label class="ans2"><?php echo $ans2[2]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs3">
				</div>
				<label class="ans3"><?php echo $ans3[2]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs3">
				</div>
				<label class="ans4"><?php echo $ans4[2]; ?></label>
			  </div>
			</div>
		</div>
		<div class="progress" style="margin-top:80px;">
			<div class="progress-bar progress-bar-striped active" role="progressbar" id="quiz-bar"
				aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%">
				30%
			</div>
		</div>
	</div>
	
	<!--Quiz Qs 4-->
	<div class="jumbotron page" id="page4" style="background-color:white;">
		<div class="quiz-wrapper">
		<label class="question" style="margin-top:20px;"><?php echo $qs[3]; ?></label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs4">
				</div>
				<label class="ans1"><?php echo $ans1[3]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs4">
				</div>
				<label class="ans2"><?php echo $ans2[3]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs4">
				</div>
				<label class="ans3"><?php echo $ans3[3]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs4">
				</div>
				<label class="ans4"><?php echo $ans4[3]; ?></label>
			  </div>
			</div>
		</div>
		<div class="progress" style="margin-top:80px;">
			<div class="progress-bar progress-bar-striped active" role="progressbar" id="quiz-bar"
				aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
				40%
			</div>
		</div>
	</div>
	
	<!--Quiz Qs 5-->
	<div class="jumbotron page" id="page5" style="background-color:white;">
		<div class="quiz-wrapper">
		<label class="question" style="margin-top:20px;"><?php echo $qs[4]; ?></label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs5">
				</div>
				<label class="ans1"><?php echo $ans1[4]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs5">
				</div>
				<label class="ans2"><?php echo $ans2[4]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs5">
				</div>
				<label class="ans3"><?php echo $ans3[4]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs5">
				</div>
				<label class="ans4"><?php echo $ans4[4]; ?></label>
			  </div>
			</div>
		</div>
		<div class="progress" style="margin-top:80px;">
			<div class="progress-bar progress-bar-striped active" role="progressbar" id="quiz-bar"
				aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
				50%
			</div>
		</div>
	</div>
	
	<!--Quiz Qs 6-->
	<div class="jumbotron page" id="page6" style="background-color:white;">
		<div class="quiz-wrapper">
		<label class="question" style="margin-top:20px;"><?php echo $qs[5]; ?></label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs6">
				</div>
				<label class="ans1"><?php echo $ans1[5]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs6">
				</div>
				<label class="ans2"><?php echo $ans2[5]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs6">
				</div>
				<label class="ans3"><?php echo $ans3[5]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs6">
				</div>
				<label class="ans4"><?php echo $ans4[5]; ?></label>
			  </div>
			</div>
		</div>
		<div class="progress" style="margin-top:80px;">
			<div class="progress-bar progress-bar-striped active" role="progressbar" id="quiz-bar"
				aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
				60%
			</div>
		</div>
	</div>
	
	<!--Quiz Qs 7-->
	<div class="jumbotron page" id="page7" style="background-color:white;">
		<div class="quiz-wrapper">
		<label class="question" style="margin-top:20px;"><?php echo $qs[6]; ?></label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs7">
				</div>
				<label class="ans1"><?php echo $ans1[6]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs7">
				</div>
				<label class="ans2"><?php echo $ans2[6]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs7">
				</div>
				<label class="ans3"><?php echo $ans3[6]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs7">
				</div>
				<label class="ans4"><?php echo $ans4[6]; ?></label>
			  </div>
			</div>
		</div>
		<div class="progress" style="margin-top:80px;">
			<div class="progress-bar progress-bar-striped active" role="progressbar" id="quiz-bar"
				aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
				70%
			</div>
		</div>
	</div>
	
	<!--Quiz Qs 8-->
	<div class="jumbotron page" id="page8" style="background-color:white;">
		<div class="quiz-wrapper">
		<label class="question" style="margin-top:20px;"><?php echo $qs[7]; ?></label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs8">
				</div>
				<label class="ans1"><?php echo $ans1[7]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs8">
				</div>
				<label class="ans2"><?php echo $ans2[7]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs8">
				</div>
				<label class="ans3"><?php echo $ans3[7]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs8">
				</div>
				<label class="ans4"><?php echo $ans4[7]; ?></label>
			  </div>
			</div>
		</div>
		<div class="progress" style="margin-top:80px;">
			<div class="progress-bar progress-bar-striped active" role="progressbar" id="quiz-bar"
				aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
				80%
			</div>
		</div>
	</div>
	
	<!--Quiz Qs 9-->
	<div class="jumbotron page" id="page9" style="background-color:white;">
		<div class="quiz-wrapper">
		<label class="question" style="margin-top:20px;"><?php echo $qs[8]; ?></label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs9">
				</div>
				<label class="ans1"><?php echo $ans1[8]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs9">
				</div>
				<label class="ans2"><?php echo $ans2[8]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs9">
				</div>
				<label class="ans3"><?php echo $ans3[8]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs9">
				</div>
				<label class="ans4"><?php echo $ans4[8]; ?></label>
			  </div>
			</div>
		</div>
		<div class="progress" style="margin-top:80px;">
			<div class="progress-bar progress-bar-striped active" role="progressbar" id="quiz-bar"
				aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
				90%
			</div>
		</div>
	</div>
	
	<!--Quiz Qs 10-->
	<div class="jumbotron page" id="page10" style="background-color:white;">
		<div class="quiz-wrapper">
		<label class="question" style="margin-top:20px;"><?php echo $qs[9]; ?></label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs10">
				</div>
				<label class="ans1"><?php echo $ans1[9]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs10">
				</div>
				<label class="ans2"><?php echo $ans2[9]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs10">
				</div>
				<label class="ans3"><?php echo $ans3[9]; ?></label>
			  </div>
			</div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<div class="input-group-text">
				  <input type="radio" name="qs10">
				</div>
				<label class="ans4"><?php echo $ans4[9]; ?></label>
			  </div>
			</div>
		</div>
		<div class="progress" style="margin-top:80px;">
			<div class="progress-bar progress-bar-striped active" role="progressbar" id="quiz-bar"
				aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
				100%
			</div>
		</div>
		
		<input type="submit" value="Submit" id="submitQuiz">
		<input type='hidden' name='submitted' value='true'>
	</div>
	
	</div>
	
</body>
</html>