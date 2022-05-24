<?php
session_start(); //starting the sessiion
$conn=mysqli_connect("localhost","root","","amazon"); //connecting to the databse

$product_id=$_GET['product_id']; //sent through ajax(url) recevwing the product id
$user_id= $_SESSION['user_id']; //setting the userid
//delete from the db
$query="DELETE FROM cart  WHERE user_id=$user_id AND product_id=$product_id";//1 is the default value of quantity

if(mysqli_query($conn,$query)){
	echo 1;
}
else{
	echo 0;
}


?>