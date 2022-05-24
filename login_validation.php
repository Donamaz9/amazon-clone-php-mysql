<?php

/*1.connect to the database
2.fetch the input from the html
3.run query
*/
session_start();

//connect to the database
$conn=mysqli_connect("localhost","root","","amazon");

//fect the input from the html
$email=$_POST['email'];
$password=$_POST['password'];

//run query
$query="SELECT * FROM  users WHERE email LIKE '$email' AND password LIKE'$password'";
$result=mysqli_query($conn,$query);
$result_arr=mysqli_fetch_assoc($result);
$num_row=mysqli_num_rows($result);
if($num_row==1){
	$_SESSION['name']=$result_arr['name'];
	$_SESSION['user_id']=$result_arr['user_id'];

	header('Location:index.php');
}else{
	//echo"Incorrect email/password";
	header("Location:login_form.php?error=1");

}

?>