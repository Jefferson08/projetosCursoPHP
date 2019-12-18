<?php 
	session_start();

	require 'config.php';

	if (isset($_SESSION['banco']) && !empty($_SESSION['banco'])) { //verifica se há uma sessão ativa, se o usuario está logado
		
		$id = $_SESSION['banco'];

		$sql = "SELECT * FROM contas WHERE id = '$id'";
		$sql = $pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$info = $sql->fetch();


		} else {
			header("Location: login.php"); //se não, redireciona para a página de login
			exit;
		}

	} else {
		header("Location: login.php");//se não, redireciona para a página d login
		exit;
	}


 ?>


<html>
<head>
	<title>Caixa eletrônico</title>
</head>
<body>
	<h1>Banco 24 horas</h1>
	Titular: <?php echo $info['titular'] ?><br>
	Agencia: <?php echo $info['agencia'] ?><br>
	Conta: <?php echo $info['conta'] ?> <br>
	Saldo: <?php echo $info['saldo'] ?><br>
	<a href="sair.php">Sair</a>
	<hr>
	<a href="transacao.php">Depósito/Saque</a><br><br>
	<a href="transferencia.php">Transferência</a>
	<h3>Movimentação/Extrato</h3>
	<table border="1" width="400" style="text-align: center">
		<tr>
			<th>Data</th>
			<th>Valor</th>
		</tr>

		<?php 
			$sql = "SELECT * FROM historico WHERE id_conta = '$id'"; //seleciona no banco na tabela historico as movimentações com o id da conta
			$sql = $pdo->query($sql);

			if ($sql->rowCount() > 0) { //se houver registro
				foreach ($sql->fetchAll() as $item) { //percorre os registros e adiciona as linhas e colunas na tabela
					?>
						<tr>
							<td><?php echo date("d/m/y H:i:s", strtotime($item['data_operacao'])) ?></td>
							<td><?php if($item['tipo'] == 0): ?>
							<font color="green">R$ <?php echo $item['valor'] ?></font> <!-- Se for um depósito, imprime em verde-->
							<?php else: ?>
							<font color="red">R$ -<?php echo $item['valor'] ?></font> <!-- Se for saque / transferencia, imprime em vermelho-->
							<?php endif; ?>	
							</td>
						</tr>
					<?php
				}
			}
		?>
	</table>
</body>
</html>