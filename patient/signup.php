<?php

if(isset($_POST['submit'])){
	include '../connection.php';

	$firstname = $_POST['name'];
	$lastname = $_POST['lname'];
	$password = $_POST['pass'];
	$dob = $_POST['dob'];
	$gender = $_POST['sex'];
	$genotype = $_POST['geno'];
	$bloodgroup = $_POST['blood'];
	$number = $_POST['number'];
	$email = $_POST['email'];

	$INSERT = "INSERT INTO patient VALUES('$firstname','$lastname', '$password','$dob','$gender','$genotype','$bloodgroup','$number','$email')";

	$sql=mysqli_query($connection, $INSERT);

	if($sql){
		echo '
		<script>alert("New account created successfully")</script>
		';
	}

	else{
		echo '
		<script>alert("error: try again")</script>
		';
	}

	
}

?>
<html>
	<head>

	<script>

		function check(){
		// Create two text boxes and an error message.
var textbox1 = document.getElementById("password");
var textbox2 = document.getElementById("cpassword");
var error = document.getElementById("error");

// When the value of textbox1 changes, compare it to the value of textbox2.
  if (textbox1.value != textbox2.value) {
    error.innerHTML = "Passwords do not match.";
	textbox2.value="";


  } else {
    error.innerHTML = "";
  }

}
	</script>
			<title>Breast cancer diagnosis</title>

		 <!-- bootstrap core css -->
		 <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

		 <!-- fonts style -->
		 <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
	   
		 <!--owl slider stylesheet -->
		 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
	   
		 <!-- font awesome style -->
		 <link href="../css/font-awesome.min.css" rel="stylesheet" />
		 <!-- nice select -->
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
		 <!-- datepicker -->
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
		 <!-- Custom styles for this template -->
		 <link href="../css/style.css" rel="stylesheet" />
		 <!-- responsive style -->
		 <link href="../css/responsive.css" rel="stylesheet" />
		
</head>
<style type="text/css">
	body{
		
		background: -webkit-linear-gradient(rgba(253, 253, 253, 0.802),rgba(254, 254, 254, 0.85)), url("./images/slider-img.jpg");
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
	}
</style>
<body>
	<div class='cover'>
	<div class='row'>
		<div class='col-md-4'>

		</div>		
		<div class='col-md-4'>
			
			<form action='signup.php' method='post'>
				<h3>Sign Up</h3>
				
				
	
				
				<div class='form-group'>
				<label> First Name</label>
				<input type="text" name="name"  required >	
				</div>
				<div class='form-group'>
				<label> Last Name</label>
				<input type="text" class='form-control col-xs-6'name='lname'  required>	
				</div>

				<div class='form-group'>
				<label> Email</label>
				<input type="email" class='form-control col-xs-6'name='email'  required>	
				</div>

				<div class='form-group'>
				<label> Tel.</label>
				<input type="number" class='form-control col-xs-6'name='number'  required>	
				</div>

				<div class='form-group'>
				<label> Password</label>
				<input class='form-control col-xs-6'type='password' name='pass' id="password" required >	
				</div>
				<p id="error" style="color:red"></p>
				<div class='form-group'>
				<label> Re-Enter Password</label>
				<input type='password'class='form-control col-xs-6'name='c_pass' id="cpassword" required onchange="check()">	
				</div>
				
				<div class='form-group'>
				<label> D.O.B (DD-MM-YYYY)</label>
				<input type='date' class='form-control col-xs-6' id='dr' name='dob'  required>	
				  <script>
  
  </script>
				</div>
				<div class='form-group'>
				<label> Sex</label>
				<select class='' name='sex'>
					<option>---Select Option---</option>
					<option>Male</option>
					<option>Female</option>
				</select>
				</div>
				<div class='form-group'>
				<label> Genotype</label>
				<select class='' name='geno'>
					<option>---Select Option---</option>
					<option>AA</option>
					<option>AB</option>
					<option>AC</option>
					<option>AS</option>
					<option>SS</option>
				</select>
				</div>
				<div class='form-group'>
				<label> Blood Group</label>
				<select class='' name='blood' required>
					<option>---Select Option---</option>
					<option>O+</option>
					<option>O-</option>
					<option>A+</option>
					<option>A-</option>
					<option>B+</option>
					<option>B-</option>
				</select>
				</div>
				
				
				<button class='col-md-3 btn btn-success pull-center' name='submit'> Submit</button>
				
			</form>		
	
		</div>

	</div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
	</body>
	 
</html>