<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "restaurant");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	//$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "UPDATE food SET img='$image' WHERE ID='323344'";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>

<!DOCTYPE html>

<html>
<head>
	<title>Upload Image</title>
</head>

<body>
	<div id="content">
	<form method="post" action="fileupload.php" enctype="multipart/form-data">
	<input type="hidden" name="size" value="100000">
	<div>
		<input type="file" name="image">
	</div>
	
	<div>
		<input type="submit" name="upload">
	</div>
	
	</form>
	
	</div>
</body>
</html>