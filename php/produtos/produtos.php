<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Cadastro de Produtos</h2>
	<a href="adprod.php"><button>Adicionar</button></a>
	<a href="pesqprod.php"><button>Pesquisar</button></a>
	<br />
	<table border="1" width="400">
		<tr>
			<th>Id</th>
			<th>Valor</th>
			<th>Produto</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("../conecta.php");
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from tb_produtos");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idprod]</td>
				<td align='center'>$tabela[precoprod]</td>
				<td align='center'>$tabela[nomeprod]</td>
			

				<td width='120'><a href='excprod.php?excluir=$tabela[idprod]'>[excluir]</a>
				<a href='altprod.php?alterar=$tabela[idprod]'>[alterar]</a></td>
				</tr>
			";}
		?>
	</table>
</body>
<a href ="../cadastro.php"> Voltar </a>

</html>