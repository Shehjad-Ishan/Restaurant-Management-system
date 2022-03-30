<?php

		////////////////////CONNECT DATABASE///////////////

		 	$user="root";
           	$pass="";
            $server="localhost";
            $db="restaurant";

            $con=new mysqli($server,$user,$pass,$db) ;

            if($con->connect_error)
            {
              die("connection failed".$con->error);
            }

          /////////////Process form data of change price//////////
          
          if(isset($_GET['check']))
          {
          	$price=$_GET['fprice'];
          	$name=$_GET['fname'];

          	$sql="Update food SET Price='$price' WHERE name='$name'";

          	$result=mysqli_query($con,$sql);

          	if($result)
          	{
          		echo ("<script LANGUAGE='JavaScript'>
   					 window.alert('Changed successfully');
    				window.location.href='manager_page.php';
    				</script>");
          	}

          } 	



?>



<!DOCTYPE html>

<html>
		<head>



		</head>

		<body>


			<form method="get" action="changefoodprice.php">
				<input type="text" placeholder="Food Name" name="fname">
				<input type="number" placeholder="Price" name="fprice">
				<input type="submit" name="check" value="Done">
			</form>	

		</body>
</html>

			
