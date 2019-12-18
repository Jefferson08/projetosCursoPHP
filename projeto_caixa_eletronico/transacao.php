<?php 
	session_start();

	require 'config.php';


	if (isset($_POST['tipo'])) { //Se for depósito ou saque
		
		$id = $_SESSION['banco'];
		$tipo = intval($_POST['tipo']);
		$valor = str_replace(",",".", $_POST['valor']); //Substitui a vírgula por ponto
		$valor = floatval($valor);
		

		if ($tipo == 0) { //DEPÓSITO
			$sql = "UPDATE contas SET saldo = saldo + '$valor' WHERE id = '$id'";
			$pdo->query($sql);

			$sql = "INSERT INTO historico SET id_conta = '$id', tipo = '$tipo', valor = '$valor', data_operacao = NOW()";
			$pdo->query($sql);

			header("Location: index.php");
		} else if($tipo == 1){ //SAQUE
			
			$sql = "SELECT * FROM contas WHERE id = $id";
			$sql = $pdo->query($sql);

			$sql = $sql->fetch();

			if ($valor <= $sql['saldo']) { //Saldo suficiente
				$sql = "UPDATE contas SET saldo = saldo - '$valor' WHERE id = '$id'";
				$pdo->query($sql);

				$sql = "INSERT INTO historico SET id_conta = '$id', tipo = '$tipo', valor = '$valor', data_operacao = NOW()";
				$pdo->query($sql);

				header("Location: index.php");
			} else { //Saldo insuficiente
				echo "Saldo insuficiente!!!";
				echo "<hr>";
			}
		} 
	} 
 ?>

<!DOCTYPE html> <!--perminte o uso de elementos do html5, permitindo usar o pattern no input-->
<html>
<head>
 	<title>Caixa eletrônico</title>
 	
</head>
 <body>

 	<h1>Depósito / Saque</h1>
 	<hr>

 	<form method="POST">
 		Tipo de transação: <br><br>
 		<select id="cmbOpcao" name="tipo">
 			<option value="0">Depósito</option>
 			<option value="1">Saque</option>
 		</select><br><br>
 		Valor: <br><br>
 		<input type="text" name="valor" pattern="[0-9.,]{1,}"><br><br>

 		<input type="submit" value="Confirmar">
 	</form>

</body>
</html>