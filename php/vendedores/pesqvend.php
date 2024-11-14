<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesqvend.php">
		Nome do Vendedor: <input type="text" name="nomevend" maxlength="40" placeholder="digite o vendedor">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("../conecta.php");
		$nomevend=htmlentities($_POST["nomevend"]);

			// pesquisando dados
		$query = $mysqli->query("select * from tb_vendedores where nomevend like '%$nomevend%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
		<th>ID</th>
		<th>CNPJ</th>
		<th>Nome do Vendedor</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idvend]</td>
			<td align='center'>$tabela[cnpjvend]</td>
			<td align='center'>$tabela[nomevend]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='vendedores.php'> Voltar</a>
</body>
</html>