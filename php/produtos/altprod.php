<?php 
	require("../conecta.php");
	$precoprod="";
	$nomeprod=""; 
	// GET - leitura - parametro idprod passado pela url
	if(isset($_GET["alterar"])){
		$idprod = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from tb_produtos where idprod = '$idprod'");
		$tabela=$query->fetch_assoc();
		$precoprod=$tabela["precoprod"];		
		$nomeprod=$tabela["nomeprod"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="altprod.php">
		<input type="hidden" name="idprod" value="<?php echo $idprod ?>">
		Preco: <input type="text" name="precoprod" value="<?php echo $precoprod ?>">
		<br/><br/>			
		Produto: <input type="text" name="nomeprod" value="<?php echo $nomeprod ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="produtos.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idprod   = htmlentities($_POST["idprod"]);
		$precoprod  = htmlentities($_POST["precoprod"]);
		$nomeprod = htmlentities($_POST["nomeprod"]);

		$mysqli->query("update tb_produtos set precoprod = '$precoprod', nomeprod='$nomeprod' where idprod = '$idprod'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>