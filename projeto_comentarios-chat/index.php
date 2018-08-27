
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