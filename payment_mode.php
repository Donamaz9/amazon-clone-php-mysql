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
	<h1>Select Payment Mode</h1>
	<div class="row mt-5">
		<div class="col-6">
			<form action="payment_confirmation.php" method="POST">
				<input type="radio" name="x" value="Credit Card">Credit Card<br><hr>
				<input type="radio" name="x" value="Debit Card">Debit Card<br><hr>
				<input type="radio" name="x" value="UPI">UPI<br><hr>
				<input type="radio" name="x" value="Net Banking">Net Banking<br><hr>
				<input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>">
				<input type="submit" name=""value="Pay Now" class="btn btn-lg" style="background-color:#F2CA65;float: right;">

			</form>
		</div>
	</div>
</div>