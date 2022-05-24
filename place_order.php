<?php

session_start();
include("includes/dbhelper.php");
date_default_timezone_set('Asia/Kolkata');
//add a new to the orders table
//1.generate order id
$order_id = uniqid();
//2.userid
$user_id=$_SESSION['user_id'];
//3.generatet date
$order_date=date("Y/m/d h/i");
//4.status== pending
//5.payment method== null
//6.address== 0

$query1="SELECT * FROM cart c JOIN products p ON c.product_id=p.product_id WHERE c.user_id=$user_id"; 
$result=mysqli_query($conn,$query1);
$amount=0;
while($row=mysqli_fetch_assoc($result)){
	$amount=$amount +$row['price']*$row['quantity'];
}
$query="INSERT INTO orders VALUES('$order_id',$user_id,'$order_date','Pending','None',$amount,0)";
if(mysqli_query($conn,$query)){
	//add to order details
	
	$query3="SELECT * FROM cart c JOIN products p ON c.product_id=p.product_id WHERE c.user_id=$user_id";
	$result1=mysqli_query($conn,$query3);
	while($row1=mysqli_fetch_assoc($result1))
	{
		$product_id=$row1['product_id'];
		$quantity=$row1['quantity'];
		$query2="INSERT INTO order_details values(NULL,'$order_id','$product_id',$quantity)";

		mysqli_query($conn,$query2);
		header('Location:show_address.php?order_id='.$order_id);
	}
}else{
	echo "Failed";
	

}
?>