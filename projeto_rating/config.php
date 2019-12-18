<?php 
	
	$con = "mysql:dbname=projeto_rating;host=localhost";
	$user = "root";
	$pass = "";

	try {
		$pdo = new PDO($con, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
		echo "Erro: ".$e->getMessage();
	}

 ?>