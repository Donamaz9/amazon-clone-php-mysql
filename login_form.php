<?php

session_start();
if (!empty($_SESSION)) 
{
	header('Location:index.php');
	
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Login</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">



	<script 
	src="https://code.jquery.com/jquery-3.6.0.js" 
	integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	.container{
		max-width: 350px;
	}
</style>
<body>
	<div class="container mt-3">
		<div align="center">
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1200px-Amazon_logo.svg.png" style="width:100px;height: 45px;">
		</div>


	  <div class="card p-3">
		<h3>Sign-In</h3>
		<?php
		if(!empty($_GET)){
			if ($_GET['error']==1) {
				echo'<p style= "color:red">Invalid Email/Password</p>';
				
			}
			
		}


		?>


		<form action="login_validation.php" method="POST">
		<label>Email</label>
		<input type="Email" name="email" class="form-control"><br>
		<label>Password</label>
		<input type="Password" name="password" class="form-control"><br>
		<input type="submit"  class="btn btn-block  text-dark" style="background-color: #F2CA65;  border: 1px solid black;" value="Continue">
		</form>

		<small class="mt-2">By continuing, you agree to Amazon's Conditions of Use and Privacy Notice</small>
	  </div>

	  <div align="center">
	  	<small >New to Amazon</small>
	  	<a href="registration_form.php"><button class="btn btn-block btn-secondary mt-2">Create Your Amazon Account</button></a>
	  </div>
	</div>

	
</body>
</html>