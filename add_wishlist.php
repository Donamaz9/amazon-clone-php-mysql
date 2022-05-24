<?php
session_start();
$conn=mysqli_connect("localhost","root","","amazon");

$product_id=$_GET['product_id']; //sent through ajax(url)
$user_id= $_SESSION['user_id'];
//insert in db
$query="INSERT INTO wishlist  VALUES(NULL,$user_id,$product_id)";

if(mysqli_query($conn,$query)){
	echo 1;
}
else{
	echo 0;
}


?>