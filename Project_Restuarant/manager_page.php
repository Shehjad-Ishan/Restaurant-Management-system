
<!------------------------------------User Login information ------------------>

<?php

    //Login
    session_start();

    $userD="";

    if(isset($_SESSION['username']))
    {
    	
        $userD=$_SESSION['username'];
    }

    else
    {
    	echo $_SESSION['username'];
    }
?>
    <h1 style="color:Black;text-align:center;"> <i>WELCOME<i> </h1>
    <h1 style="font-size: 20px;margin-left: 1400px;">Logged in as <?php echo $userD; ?> </h1>
    <a href="logout.php"><button style="margin-left: 1400px;background-color: #80ffaa;">logout </button> </a>
  
<br>


<!-- --------------------------------Login information finishes----------------->


<!DOCTYPE>

<html>
		<head> 
			<title>Manager Page</title>
		 <!--	<link rel="stylesheet" href="managercss.css" /> -->
      		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      		<style>

      		/* For cancle button */

      		/* .open-button {
  			  background-color: #555;
 			  color: black;
			  padding: 4px 12px; 
			  border: none;
			  cursor: pointer;
			  opacity: 1;
			  position: fixed;
			  bottom: 40px;
			  right: 10 px ;
			  width: 0 px;
			} */
			/* The popup form - hidden by default */
				.form-popup {
				  display: none; 
				  position: fixed;
				  bottom: 0;
				  right: 15px;
				  border: 3px solid #f1f1f1;
				  z-index: 9;
				}

			/* Add styles to the form container */
					.form-container {
				  max-width: 200px;
				  padding: 10px;
				  background-color: white;
				}	

			/* Add a red background color to the cancel button */
				.form-container .cancel {
					color: black;
				  background-color: red;
					}	
			/* Color submit button*/
			.btn
			{
				color: black;
				  background-color: green;
			}				


		</style>
		</head>
		
		<body style="background-image: url(images/new.jpg); background-size: 1920px 5000px;"> 

			<!-- SELECT LOCATION --->


			<h3 style="margin-left: 1400px;">Select location:</h3>
			<p1 style="margin-left: 1400px;">Confirm it first</p1>

			<form style="margin-left: 1400px;" method="post" action="Manager_page.php" >
			  <label for="location"></label>
			<select id="location" Name="loc">
			  <option style="background-color: #ffff80;" value="Null" selected> </option>
			  <option style="background-color: #ffff80;" value="Kakrail">Kakrail </option>
			  <option style="background-color: #ffff80;" value="Mogbazar">Mogbazar</option>
			  <option style="background-color: #ffff80;" value="Bashundhara">Bashundhara</option>
			</select>
			<input style="background-color:  #80ffaa;" type="submit" value="SUBMIT" name="Confirm">
			</form>
			<div style="margin-left: 400px;">
				<h1 style="margin-left: 20px;">Food List </h1>

			<!-- -----------------------SELECT LOCATION ENDS ------------------------------------------------ -->	


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

			            ////////////////Bring all Food and show in a list ///////////////

			            $sql="SELECT *FROM FOOD ";
			            $result=mysqli_query($con,$sql);
			            if($result):
                			if(mysqli_num_rows($result)>0):
                				while($food=mysqli_fetch_array($result)):
                    
                  ?>     
                  		<ul>
  						<li> <?php echo "Name:".$food['Name']."<br>"; echo "Price:".$food['Price']; ?> </li>
  						</ul>

  				<?php
  								endwhile;
  							endif;
  						endif;
  				?>

  				  <a href="addfood.php" id="button"><button style="background-color: #80ffaa;">ADD FOOD </button> </a>
  				  <a href="changefoodprice.php" id="button"><button style="background-color: #ffcccc;">Change price </button> </a>

  				<!-- ----------------------------- FOOD Shown Finishes--------------------------- -->

  				<h2>SEAT RESERVE:</h2>

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

			            ////////////////Bring all seat reserve and show in a list ///////////////
			            $loc=$_POST['loc'];
			            $sql="SELECT *FROM reservation WHERE BName='$loc'";
			            $result=mysqli_query($con,$sql);
			            if($result):
                			if(mysqli_num_rows($result)>0):
                				while($seat=mysqli_fetch_array($result)):
                    
                  ?>     
                  		<ul>
  						<li>

  						 <?php 
  								
  								echo "Reservation Name:". $seat['RName']."<br>".
  									 "Reservation Time:".$seat['RTime']."<br>".
  									 "Reservation Date:". $seat['RDate']."<br>".
  									 "Phone:".$seat['Phone']."<br>".
  									 "Seat ID:". $seat['SID']."<br>".
  									 "Username:".$seat['Username']."<br>";

  						?>			 


  						 </li>
  						</ul>
  				<?php
  								endwhile;
  							endif;
  						endif;
  			

  				?>

  				




  					<!------------------------ SEAT RESERVE FINISED --------------------- -->






  					<!---------------------------Model section----------------------------->

  					<button style="background-color: #ff3333;" class="open-button" onclick="openForm()">Cancel Reservation</button>

					 <div class="form-popup" id="myForm">
					  <form style="background-color: #ffbf80;" method ="get" action="canclereservation.php"  class="form-container">
					    <h1 style="font-size: 20px;">Cancel Reservation</h1>

					    <label for="Username"><b>Username</b></label>
					    <input type="text" id= "username" placeholder="Type Username" name="user" required>

					    <br>
					    <button type="submit"  name="canres" class="btn">Confirm</button>

					    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
					  </form>
					</div>

					<script>
						function openForm() {
						  document.getElementById("myForm").style.display = "block";
						}

						function closeForm() {
						  document.getElementById("myForm").style.display = "none";
						}
					</script>

					<!---------------------------Modal Section Finishes---------------->


					<!-------------------------Show Order List---------------------------->

					<h2> Order list </h2>

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

			            ////////////////Bring all seat reserve and show in a list ///////////////
			            $loc=$_POST['loc'];
			            $sql="SELECT *FROM orderlist GROUP BY FID";
			            $result=mysqli_query($con,$sql);
			            if($result):
                			if(mysqli_num_rows($result)>0):
                				while($ol=mysqli_fetch_array($result)):
                    
                  ?>     
                  		<ul>
  						<li>

  						 <?php 
  						 		echo "Quantity:".$ol['Quantity']."<br>";
  								
  								echo "OrderID:". $ol['OrderID']."<br>";
  									 if($ol['isDelivered'])
  									 {
  									 	echo "Delivered:YES";
  									 }
  									 else
  									 {
  									 	echo "Delivered:No";
  									 }
  						?>			 


  						 </li>
  						</ul>
  				<?php
  								endwhile;
  							endif;
  						endif;


  						?>
  				<a href="Deliver.php" id="button"><button style="background-color:  #80ffaa;">Delivered </button> </a>	

  					<br>
  					<br>
  				</div>
  					
  					<div style="text-align: center;" id="footer"> Read Complain <a href="http://www.a restaurent.com">Complain box</a> 




  						



		</body>
</html>