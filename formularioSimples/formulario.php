

<?php
	if (isset($_POST['email']) && !empty($_POST['email'])) { //isset verifica se a variavel existe (retorna true ou false) e se o email não está vazio
			if (isset($_POST['senha']) && !empty($_POST['senha'])) { //verifica se a variável existe e se a senha não está vazia
				$email = $_POST['email'];
				$senha = $_POST['senha'];

				echo "Dados enviados com sucesso!!! ";
				echo "O email é: ".$email." e a senha é: ".$senha;
			}else{
				echo "Preencha os campos e mail e senha!!!"; 
			}
	}else{
		echo "Preencha os campos email e senha!!!";
	}
?>

<hr>
<form method="POST"> <!-- Método POST envia os dados de forma interna -->
	Email:<br>
	<input type="text" name="email"><br><br>
	Senha:<br>
	<input type="password" name="senha"><br><br>
	<input type="submit" name="Enviar">

</form>