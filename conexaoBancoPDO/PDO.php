<?php 

	consulta(); //chamando a função consulta

	inserir(); //chamando a função inserir

	function consulta(){ //Função que conecta com o banco e consulta um usuario na tabela

		$dsn = "mysql:dbname=teste;host=localhost"; 
		$dbuser = "root";
		$dbpass = "";


		try {
			$pdo = new PDO($dsn, $dbuser, $dbpass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//PDO won't throw exceptions unless you tell it to.

			$sql = "SELECT * FROM usuarios";
			$sql = $pdo->query($sql); //A consulta retorna dados, por isso tem que armazenar numa variável

			if ($sql->rowCount() > 0) { //Se a contagem de linhas for maior que 0 (se houver registros);
				
				foreach ($sql->fetchAll() as $usuario) { 

					echo "Usuário: ". $usuario["nome"]."<br>";
					
				}
				
			} else {
				echo "Não foram encontrados registros!!!";
			}


		} catch (PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}
	}

	function inserir(){ //Função que insere usuarios no banco teste

		$dsn = "mysql:dbname=teste;host=localhost";
		$dbuser = "root";
		$dbpass = "";

		try {
		$pdo = new PDO($dsn, $dbuser, $dbpass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$nome = "Fulano";
		$email = "Fulano@hotmail.com";
		$senha = md5("123456");

		$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
		$pdo->query($sql); //Inserção, atualização etc não retornam dados, então é só fazer a query

		echo "Usuario inserido com sucesso!!! Id número: ".$pdo->lastInsertId(); //lastInsertId retorna o último id inserido na tabela
		
		} catch (PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}
}


 ?>