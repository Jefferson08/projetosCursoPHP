<?php 

	$con = "mysql:dbname=projeto_caixaeletronico;host=localhost";
	$dbuser = "root";
	$dbpass = "";
	
	try {
		$pdo = new PDO($con, $dbuser, $dbpass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
		echo "Erro: ".$e->getMessage();
	}

?>