<?php

//session_destroy();
session_start();
//connect database


$user="root";
$pass="";
$server="localhost";
$db="restaurant";

$con=new mysqli($server,$user,$pass,$db) ;

if($con->connect_error)
{
	die("connection failed".$con->error);
}

if(isset($_POST['log'])){
	$sel=$_POST['log'];
}

//check the select tag value
if(!empty($sel))
{
	if($sel=="Customer")
	{
		$user=$_POST["username"];
		$pass=$_POST["password"];

		$sql="Select Passcode FROM customer WHERE Username='$user'" or die();
		$result=mysqli_query($con, $sql);

		if (!$result) {
    	trigger_error('Invalid query: ' . $con->error);
		}

		if($result->num_rows>0)
		{
			$row=$result->fetch_assoc();
			//$check=$row["Passcode"];
			if($row["Passcode"]==$pass)

			{
				$_SESSION["username"]=$_POST["username"];
				header("location:customerpage.php");
			}
			else
			{
				echo ("<script LANGUAGE='JavaScript'>
   				 window.alert('Invalid Password');
    			window.location.href='http://localhost/Project_Restuarant/home_page.html';
    			</script>");
			}
			
			
		}
		else
		{
			echo "Username doesn't exist";
		} 
	}
	else if($sel=="Manager")
	{
		$user=$_POST["username"];
		$pass=$_POST["password"];

		$sql="Select Passcode FROM manager WHERE Fname='$user'" or die();
		$result=mysqli_query($con, $sql);

		if (!$result) {
    	trigger_error('Invalid query: ' . $con->error);
		}

		if($result->num_rows>0)
		{
			$row=$result->fetch_assoc();
			//$check=$row["Passcode"];
			if($row["Passcode"]==$pass)
			{
				$_SESSION["username"]=$_POST["username"];
				header("location:manager_page.php");
			}
			else
			{
				echo ("<script LANGUAGE='JavaScript'>
   				 window.alert('Invalid Password');
    			window.location.href='http://localhost/Project_Restuarant/home_page.html';
    			</script>");
			}
			
			
		}
		else
		{
			echo ("<script LANGUAGE='JavaScript'>
   				 window.alert('Username doesn't exist');
    			window.location.href='http://localhost/Project_Restuarant/home_page.html';
    			</script>");
		} 
	}
	else
	{
		echo ("<script LANGUAGE='JavaScript'>
   				 window.alert('Select log in as');
    			window.location.href='http://localhost/Project_Restuarant/home_page.html';
    			</script>");
	}
}
else 
{
	echo '<script>alert("Select login as")</script>';
}



//session_destroy();

?>
