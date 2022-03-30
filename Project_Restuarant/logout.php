<?php
		session_start();
		session_destroy();
		unset($_SESSION['username']);
		echo ($_SESSION['username']);
		header("location:home_page.html",true,301);
?>		