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
		<h3>Create Account</h3>

		<?php
		if(!empty($_GET)){
			if ($_GET['error']==1) {
				echo'<p style= "color:red"> Email already exsits</p>';
				
			}
			else
			{
			echo'<p style= "color:red"> Some Error Occured.Try Again</p>';
			}
		}


		?>
		
		<form action="reg_validation.php" method="POST">
		<label>Name</label>
		<input type="text" name="name" class="form-control"><br>
		<label>Email</label>
		<input type="Email" name="email" class="form-control"><br>
		<label>Password</label>
		<input type="Password" name="password" class="form-control"><br>
		<input type="submit" value="Continue" class="btn btn-block  text-dark" style="background-color: #F2CA65;  border: 1px solid black;"></input>
		</form>

		<small class="mt-2">By continuing, you agree to Amazon's Conditions of Use and Privacy Notice</small>
	  </div>

	  <div align="center">
	  	<small >Already have an account?<a href="login_form.php">Sign in</a></small>
	  	<button class="btn btn-block btn-secondary mt-2">Create Your Amazon Account</button>
	  </div>
	</div>

	
</body>
</html>