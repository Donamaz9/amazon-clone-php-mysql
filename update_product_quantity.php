<?php
session_start(); //starting the sessiion
$conn=mysqli_connect("localhost","root","","amazon"); //connecting to the databse

$product_id=$_GET['product_id']; //sent through ajax(url) recevwing the product id
$quantity=$_GET['quantity'];//getting the quantity
$user_id= $_SESSION['user_id']; //setting the userid
$sign=$_GET['sign'];
if($sign=='-'){
	$quantity=$quantity -1;
}else{
	$quantity=$quantity +1;
}
//insert into db
$query="UPDATE cart  SET quantity=$quantity WHERE user_id=$user_id AND product_id=$product_id";


if(mysqli_query($conn,$query)){
	echo 1;
}
else{
	echo 0;
}


?>