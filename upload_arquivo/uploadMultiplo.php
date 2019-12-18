
<pre>
<?php 
	

	if (isset($_FILES['arquivo'])) { //Verifica se $_FILE está setado, se houve envio de arquivo
		
		if (count($_FILES['arquivo']['tmp_name']) > 0) { //Se o contagem do array tmp_name que está dentro do array arquivo for maior que 0
			
			for ($i=0; $i < count($_FILES['arquivo']['tmp_name']) ; $i++) { 
				echo "Nome: ".$_FILES['arquivo']['name'][$i]."<br>";
				echo "Tipo: ".$_FILES['arquivo']['type'][$i]."<br>";

				$nome = md5($_FILES['arquivo']['name'][$i].time().rand(0, 99)).".png"; //Cria um numero sempre aleatório pro arquivo, concatenando com a extensão (PNG)

				move_uploaded_file($_FILES['arquivo']['tmp_name'][$i], "arquivos/".$_FILES['arquivo']['name'][$i]); //Primeiro parâmentro é o nome do arquivo (na verdade o endereço temporario onde ele está, que está salvo em tmp_name, e o segundo é o destino
			}

		}

	}
?>
</pre>

<form method="POST" enctype="multipart/form-data">
	<input type="file" name="arquivo[]" multiple><br><br>
	<input type="submit" value="Enviar">
</form>