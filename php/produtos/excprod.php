<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	// GET - leitura - parametro idprod passado pela url
	if(isset($_GET["excluir"])){

		$idprod = htmlentities($_GET["excluir"]);
		require("../conecta.php");
		$mysqli->query("delete from tb_produtos where idprod = '$idprod'");
		echo $mysqli->error;
		if ($mysqli->error==""){
			echo "Excluido com Sucesso<br />";
			echo "<a href='produtos.php'>Voltar</a>";
		}
	}
	?>
</body>
</html>