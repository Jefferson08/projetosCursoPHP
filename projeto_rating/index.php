
<?php 

	require 'config.php';

	$sql = "SELECT * FROM filmes";
	$sql = $pdo->query($sql);

	if ($sql->rowCount() > 0) {
		$filmes = $sql->fetchAll();

		foreach ($filmes as $filme): ?>
			<fieldset>
				<strong><?php echo $filme['nome']; ?></strong>
				<br>
				<a href="votar.php?id=<?php echo $filme['id'];?>&voto=1"><img src="star.png" width="30" height="30"></a>
				<a href="votar.php?id=<?php echo $filme['id'];?>&voto=2"><img src="star.png" width="30" height="30"></a>
				<a href="votar.php?id=<?php echo $filme['id'];?>&voto=3"><img src="star.png" width="30" height="30"></a>
				<a href="votar.php?id=<?php echo $filme['id'];?>&voto=4"><img src="star.png" width="30" height="30"></a>
				<a href="votar.php?id=<?php echo $filme['id'];?>&voto=5"><img src="star.png" width="30" height="30"></a>
				
				<br>
				<?php echo "Média : (".$filme['media'].")"; ?>
				
			</fieldset>

			<hr>

		<?php endforeach;
	} else {
		echo "Não há filmes!!!";
	}

 ?>