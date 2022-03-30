<?php
	//CONNECT DATABASE
		 	$user="root";
           	$pass="";
            $server="localhost";
            $db="restaurant";

            $con=new mysqli($server,$user,$pass,$db) ;

            if($con->connect_error)
            {
              die("connection failed".$con->error);
            }


            if(isset($_GET['canres'])){

            	echo "entered";

            	$user=$_GET['user'];

            	echo $user;

            	$sql="DELETE FROM reservation WHERE Username='$user'";

            	 $result=mysqli_query($con,$sql);

            	if($result)
            	{
            		echo ("<script LANGUAGE='JavaScript'>
   					 window.alert('Cancled successfully');
    				window.location.href='manager_page.php';
    				</script>");
            	}
            	else if(!mysqli_query($con,$sql)) {
                   printf("Errormessage: %s\n", mysqli_error($con)); 
                 }

            }
            else
            {
            	echo "Not Set";
            }

?>