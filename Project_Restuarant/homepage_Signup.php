<?php

session_start();

//create connection with database

$con=new mysqli("localhost","root","","restaurant");

if($con->connect_error)
{
	die("connection error".$con->error);
}

//variables to hold Sign Up data

$user="";
$add="";
$pass="";
$passrep="";

if(isset($_POST))
{
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$passrep=$_POST['password_repeat'];
	$add=$_POST['address'];

	//Check weather Username alreay exist or not

	$qul="SELECT username FROM customer WHERE username='$user'";
	$check=mysqli_query($con,$qul);

	$num=$check->num_rows;
	
	if($num<=0)
	{	
		//check password and repeat password
		if($pass==$passrep)
		{
			$sql="INSERT into customer(Username,Passcode,Address)VALUES('$user','$pass','$add')";

			if($con->query($sql)===TRUE)
			{
				echo "<script LANGUAGE='JavaScript'>
	   				 window.alert('Signed Up successfully.You can now Login with your account');
	    			window.location.href='http://localhost/Project_Restuarant/home_page.html';
	    			</script>";
			}
			else
			{
				echo $con->error;
			}
		}
		else

		{
			echo ("<script LANGUAGE='JavaScript'>
	   				 window.alert('Repeated password doesn't match);
	    			window.location.href='http://localhost/Project_Restuarant/home_page.html';
	    			</script>");
		}	
	}
	else
	{
			echo ("<script LANGUAGE='JavaScript'>
   				 window.alert('Username already exist');
    			window.location.href='http://localhost/Project_Restuarant/home_page.html';
    			</script>");
	}	
}

session_destroy();
?>