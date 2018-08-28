


<?php 
	session_start();

	require 'config.php';

	$id = $_SESSION['banco'];

	if (isset($_POST['agencia']) && !empty($_POST['agencia'])) {

		$agencia = addslashes($_POST['agencia']);
		$conta = addslashes($_POST['conta']);
		$valor = str_replace(",",".", $_POST['valor']); //Substitui a vírgula por ponto
		$valor = floatval($valor);

		$sql = "SELECT * FROM contas WHERE agencia = '$agencia' AND conta = '$conta'";
		$sql = $pdo->query($sql);

		if ($sql->rowCount() > 0) {

			$dadosConta = $sql->fetch();
			$id_destinatario = $dadosConta['id'];

			$sql = "SELECT * FROM contas WHERE id = $id";
			$sql = $pdo->query($sql);

			$sql = $sql->fetch();

			if ($valor <= $sql['saldo']) { //Saldo suficiente
				$sql = "UPDATE contas SET saldo = saldo - '$valor' WHERE id = '$id'"; //tirando saldo da conta do remetente
				$pdo->query($sql);

				$sql = "UPDATE contas SET saldo = saldo + '$valor' WHERE id = '$id_destinatario'"; //colocando saldo na conta do destinatário
				$pdo->query($sql);

				$sql = "INSERT INTO historico SET id_conta = '$id', tipo = '1', valor = '$valor', data_operacao = NOW()"; //adicionando movimentação no histórico
				$pdo->query($sql);

				$sql = "INSERT INTO historico SET id_conta = '$id_destinatario', tipo = '0', valor = '$valor', data_operacao = NOW()"; //adicionando movimentação no histórico

				$pdo->query($sql);

				header("Location: index.php");
			} else { //Saldo insuficiente
				echo "Saldo insuficiente!!!";
				echo "<hr>";
			}
		} else {
			echo "Conta / Agencia não encontradas";
			echo "<hr>";
		}

	}

	

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Caixa eletrônico</title>
 </head>
 <body>

 	<form method="POST">
 		Agencia: <br><br>
 		<input type="text" name="agencia"><br><br>
 		Conta: <br><br>
 		<input type="text" name="conta"><br><br>
 		Valor: <br><br>
 		<input type="text" name="valor" pattern="[0-9.,]{1,}"><br><br>
 		<input type="submit" value="Confirmar">
 	</form>
 
 </body>
 </html>