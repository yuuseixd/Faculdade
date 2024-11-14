<?php 
	require("../conecta.php");
	$cnpjvend="";
	$nomevend=""; 
	// GET - leitura - parametro idvend passado pela url
	if(isset($_GET["alterar"])){
		$idvend = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from tb_vendedores where idvend = '$idvend'");
		$tabela=$query->fetch_assoc();
		$cnpjvend=$tabela["cnpjvend"];		
		$nomevend=$tabela["nomevend"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="altvend.php">
		<input type="hidden" name="idvend" value="<?php echo $idvend ?>">
		CNPJ: <input type="text" name="cnpjvend" value="<?php echo $cnpjvend ?>">
		<br/><br/>			
		nome: <input type="text" name="nomevend" value="<?php echo $nomevend ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="vendedores.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idvend   = htmlentities($_POST["idvend"]);
		$cnpjvend  = htmlentities($_POST["cnpjvend"]);
		$nomevend = htmlentities($_POST["nomevend"]);

		$mysqli->query("update tb_vendedores set cnpjvend = '$cnpjvend', nomevend='$nomevend' where idvend = '$idvend'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>