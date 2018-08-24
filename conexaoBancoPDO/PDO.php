<?php 
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

 ?>