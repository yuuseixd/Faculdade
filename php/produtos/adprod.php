<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adprod.php">
		Preco: <input type="text" name="precoprod" maxlength="20" placeholder="digite o Valor">
		<br/><br/>
		Nome do Produto: <input type="text" name="nomeprod" maxlength="50" placeholder="digite o Produto">		
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("../conecta.php");

	//$nome=$_POST["nome"];
	$precoprod=htmlentities($_POST["precoprod"]);	
	$nomeprod=htmlentities($_POST["nomeprod"]);

	// gravando dados
	$mysqli->query("insert into tb_produtos values('', '$precoprod', '$nomeprod')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='produtos.php'> Voltar</a>";
	}

}
?>