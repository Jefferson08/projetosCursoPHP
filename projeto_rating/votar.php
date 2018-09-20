<?php
	require 'config.php';

	if (!empty($_GET['id']) && !empty($_GET['voto'])) {
		$id = $_GET['id'];
		$voto = intval($_GET['voto']);

		if ($voto >= 1 && $voto <= 5) {
			
			$sql = "INSERT INTO notas SET id_filme = :id_filme, nota = :voto";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(":id_filme", $id);
			$sql->bindValue(":voto", $voto);
			$sql->execute();

			$sql = "UPDATE filmes SET media = (SELECT (SUM(nota)/COUNT(*)) FROM notas WHERE notas.id_filme = filmes.id) WHERE id = :id_filme";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(":id_filme", $id);
			$sql->execute();

			header("Location: index.php");



		} else {
			echo "Voto inválido!!!";
		}
	}
 ?>