<?php 
	session_start();

	if (!empty($_SESSION['banco'])) {
		unset($_SESSION['banco']);
		header("Location: login.php");
		exit;
	}
 ?>