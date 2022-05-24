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

<div class="container">
	<div class="row">
		<div class="col-6">
			<h3 class="mt-5 mb-5">Your Address</h3>
			<form action="select_payment_mode.php" method="POST">
			<?php
			include "includes/dbhelper.php";  
			$user_id=$_SESSION['user_id'];
			$query="SELECT * FROM address WHERE user_id=$user_id";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
						echo '<input type="radio" name="X" value="'.$row['address_id'].'"><span>
									'.$row['street_address'].'
									'.$row['landmark'].'<br>
									'.$row['city'].','.$row['state'].'<br>
									'.$row['pin'].'<br>
									'.$row['contact_number'].'</span><br><br>

							';
			}
			?>
			<input type="hidden" name="order_id" value="<?php echo $_GET['order_id'];?>">
			<input type="submit" value="Select Address" name=""style="background-color:#F2CA65;float: right;" class="btn btn-lg">
			</form>
			<hr>
			
			
		</div>
		<div class="col-6">
			<button  data-toggle="modal" data-target="#exampleModal" class="btn btn-lg mt-5" style="background-color:#F2CA65;">Add New Address</button>
		</div>

	</div>

	
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add_address.php" method="POST">
        	<label>Street Address</label><br>
        	<textarea  name="street_address" class="form-control"></textarea><br>
        	<label>Landmark</label><br>
        	<textarea name="landmark" class="form-control"></textarea><br>
        	<label>City</label><br>
        	<input type="text" name="city" class="form-control"><br>
        	<label>State</label><br>
        	<input type="text" name="state" class="form-control"><br>
        	<label>Pincode</label><br>
        	<input type="text" name="pincode" class="form-control"><br>
        	<label>Contact Number</label><br>
        	<input type="text" name="contact" class="form-control" ><br>
        	<input type="submit"  value="Add Address" name="" class="btn btn btn-lg mt-2 form-control" style="background-color:#F2CA65" >


        </form>
      </div>
    </div>
  </div>
</div>
</div>