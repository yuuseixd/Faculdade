<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="advend.php">
		CNPJ: <input type="text" name="cnpjvend" maxlength="20" placeholder="digite o cnpj">
		<br/><br/>
		Nome do Vendedor: <input type="text" name="nomevend" maxlength="50" placeholder="digite o nome do vendedor">		
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("../conecta.php");

	//$nome=$_POST["nome"];
	$nomevend=htmlentities($_POST["nomevend"]);	
	$cnpjvend=htmlentities($_POST["cnpjvend"]);

	// gravando dados
	$mysqli->query("insert into tb_vendedores values('', '$nomevend', '$cnpjvend')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='vendedores.php'> Voltar</a>";
	}

}
?>