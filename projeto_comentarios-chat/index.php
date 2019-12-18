
<?php 
	require 'config.php';

	if (isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = $_POST['nome'];
		$mensagem = $_POST['mensagem'];

		$sql = "INSERT INTO mensagens SET data_msg = NOW(), nome = '$nome', msg = '$mensagem'";
		$pdo->query($sql);
	}
?>

<fieldset>
	<form method="POST">
		Nome: <br>
		<input type="text" name="nome"><br><br>
		Mensagem: <br>
		<textarea name="mensagem" style="width: 200px; height: 100px;" maxlength="156"></textarea><br><br>
		<input type="submit" value="Enviar">
	</form>
</fieldset>

<br><br>

<?php 
	$sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
	$sql = $pdo->query($sql);

	//echo "Data: ".$mensagem['data_msg'];

	if ($sql->rowCount() > 0) {
		foreach($sql->fetchAll() as $mensagem):
			$data = date("d/m/y \à\s H:i:s", strtotime($mensagem['data_msg'])); //Formatando a data e a hora

			?>
				<strong><?php echo $mensagem['nome']; ?></strong> - <?php echo $data; ?><br><br>
				<?php echo $mensagem['msg']; ?>
				<hr>
			<?php
		endforeach;
	} else {
		echo "Não há mensagens!!!";
	}

?>