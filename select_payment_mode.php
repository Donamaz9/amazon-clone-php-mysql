<?php
//print_r($_POST);
session_start();
include "includes/dbhelper.php";
//1.update the address in order table
$address_id=$_POST['X'];
$order_id=$_POST['order_id'];
$query="UPDATE orders SET address=$address_id WHERE order_id='$order_id'";
if(mysqli_query($conn,$query)){
	header('Location:payment_mode.php?order_id='.$order_id);
}else{
	header('Location:show_address.php?order_id='.$order_id);
}
//2.redirect  to the payment page



?>