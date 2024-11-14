<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Cadastro de Vendedores</h2>
	<a href="advend.php"><button>Adicionar</button></a>
	<a href="pesqvend.php"><button>Pesquisar</button></a>
	<br />
	<table border="1" width="400">
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>CNPJ</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("../conecta.php");
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from tb_vendedores");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idvend]</td>
				<td align='center'>$tabela[nomevend]</td>
				<td align='center'>$tabela[cnpjvend]</td>
			

				<td width='120'><a href='excvend.php?excluir=$tabela[idvend]'>[excluir]</a>
				<a href='altvend.php?alterar=$tabela[idvend]'>[alterar]</a></td>
				</tr>
			";}
		?>
	</table>
</body>
<a href ="../cadastro.php"> Voltar </a>

</html>