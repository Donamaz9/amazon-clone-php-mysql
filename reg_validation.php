<?php
/*1. connect to the database
2.receiveuser input frm the  registration form
3.run sql query and  add the user to our database
*/

session_start();
$conn=mysqli_connect("localhost","root","","amazon"); //step1

//step-2
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

//step-3
$query="INSERT INTO users VALUES(NULL,'$name','$email','$password')";
//check whether the email alredy exits
$query1="SELECT * FROM users WHERE email LIKE '$email'";
$result=mysqli_query($conn,$query1);
$num_rows=mysqli_num_rows($result);


//check whether the email alredy exits

if($num_rows==0)
//run the query
{
		if(mysqli_query($conn,$query))
		{
			$query2="SELECT * FROM users WHERE email LIKE '$email'";// QUERY TO ADD THE USER

			$result2=mysqli_query($conn,$query2);
			//ran the query
			$result2_arr=mysqli_fetch_assoc($result2);
			//fetch the details of the user using session
			$_SESSION['name']=$result2_arr['name'];
			$_SESSION['user_id']=$result2_arr['user_id'];
			header('Location:index.php');//return back to the home page 




		echo "Registration Successful";
		}
		else
		{
		//echo"Something went wrong";
		header("Location:registration_form.php?error=0");

		}

}
else 
{
	//echo"Email Already Exists";
	header("Location:registration_form.php?error=1");
}

?>