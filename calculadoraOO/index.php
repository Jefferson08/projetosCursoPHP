
<?php 
	require 'calculadora.class.php';

	if (isset($_POST['tipo'])) {
		$calc = new Calculadora();

		if ($_POST['tipo'] == 0) {
			$resultado = $calc->somar($_POST['numero1'], $_POST['numero2']);
			echo "Resultado: ".$resultado;
		} elseif ($_POST['tipo'] == 1) {
			$resultado = $calc->subtrair($_POST['numero1'], $_POST['numero2']);
			echo "Resultado: ".$resultado;
		} elseif ($_POST['tipo'] == 2) {
			$resultado = $calc->dividir($_POST['numero1'], $_POST['numero2']);
			echo "Resultado: ".$resultado;
		} elseif ($_POST['tipo'] == 3) {
			$resultado = $calc->multiplicar($_POST['numero1'], $_POST['numero2']);
			echo "Resultado: ".$resultado;
		}
	}
?>




<!DOCTYPE html>
<html>
<head>
	<title>Calculadora</title>
</head>
<body>
	<h3>Calculadora</h3>
	<hr>
	<form method="POST">
		Selecione o tipo de operação:<br><br>
		<select name="tipo">
			<option value="0">Soma</option>
			<option value="1">Subtração</option>
			<option value="2">Divisão</option>
			<option value="3">Multiplicação</option>
		</select><br><br>

		<input type="text" name="numero1" style="width: 50px;"> - 
		<input type="text" name="numero2" style="width: 50px;"><br><br>
		<input type="submit" value="Resolver">
	</form>
</body>
</html>
