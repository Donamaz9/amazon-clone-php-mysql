<?php 
session_start();
if(empty($_SESSION)){
	header('Location:login_form.php');
}else{
	$is_logged_in=1;
}

?>

<?php 
include("includes/header.php");
?>

<div class="container mt-5">
	<div class="row mt-5">
		<div class="col-12">
			<img src="https://cdn.dribbble.com/users/335541/screenshots/7102045/media/5b7237fe7bbfa31531d6e765576f1bc4.jpg?compress=1&resize=400x300&vertical=top" style=" display: block;margin:auto ;width:300px;height: 250px;">
			<h1 class="text-md-center mt-5"> Order is placed successfully</h1>
			<a href="orders.php" class="btn btn-lg btn-success"style=" display: block;margin:auto ;width:300px;">Go to your orders</a>
		</div>
	</div>
</div>