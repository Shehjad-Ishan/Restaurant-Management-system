<?php

			////////////ADD FOOD TO DATABASE///////////////

if(isset($_POST['add'])){


			//connect databse

		 	$user="root";
            $pass="";
            $server="localhost";
            $db="restaurant";

            $con=new mysqli($server,$user,$pass,$db) ;

            if($con->connect_error)
            {
              die("connection failed".$con->error);
            }

            //save input data into variables
            $name=$_POST['fname'];
            $price=$_POST['fprice'];
            $type=$_POST['ftype'];
            $stype=$_POST['fstype'];
            $img="Upload photo";
            $id=$_POST['fid'];

            $sql="INSERT INTO food(Name,ID,Price,Type,Subtype,img)
            				VALUES('$name','$id','$price','$type','$stype','$img')";

            $result=mysqli_query($con,$sql);
            
            if($result)
            {
            	echo ("<script LANGUAGE='JavaScript'>
   				 window.alert('Successfully Updated');
    			window.location.href='manager_page.php';
    			</script>");
            }
            else if (!mysqli_query($con,$sql)) {
                   printf("Errormessage: %s\n", mysqli_error($con)); 
                 }

}
?>			








<!DOCTYPE html>

<html>




	<head>
		<title> Add food</title>
		<link rel="stylesheet" href="managercss.css" />
      	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>

	<body>

	
<?php
			//connect databse

		 	$user="root";
            $pass="";
            $server="localhost";
            $db="restaurant";

            $con=new mysqli($server,$user,$pass,$db) ;

            if($con->connect_error)
            {
              die("connection failed".$con->error);
            }

?>
			<h1> Enter Food details </h1>

			<form method="post" action="addfood.php">
				<input type="text" placeholder="FOOD NAME" name="fname">
  				<input type="text" placeholder="FOOD TYPE" name="ftype">
  				<input type="text" placeholder="FPRICE" name="fprice">
  				<input type="text" placeholder="FSUBTYPE" name="fstype">
  				<input type="text" placeholder="FOOD ID" name="fid">
  				<input type="submit" Name= "add" value="ADD">

			</form>



	</body>
</html>	
