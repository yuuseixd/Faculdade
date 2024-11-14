<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Venda de Jogos</title>
</head>
<body>
	<?php
	$nome=$_POST["nome"];     
	$email=$_POST["email"]; 
	$telefone=$_POST["telefone"]; 

	$produto1=$_POST["produto1"];
	$quantidade1=$_POST["quantidade1"];
	$prod2=$_POST["prod2"];
	$qtd2=$_POST["qtd2"];
	$prod3=$_POST["prod3"];
	$qtd3=$_POST["qtd3"];

    

	if ($produto1==1) {
		$produto1 = "Mouse tx1";
		$price01 = 180;
	} elseif ($produto1==2) {
		$produto1 = "Headset v3";
		$price01 = 140;
	} elseif ($produto1==3) {
		$produto1 = "Keyboard gxt10";
		$price01 = 165;	
	} else {
		$produto1 = "Mousepad Logi";
		$price01 = 200;	
	}
	
	
	if ($prod2==1) {
		$prod2 = "Controle PS5";
		$preco2 = 350;
	} elseif ($prod2==2) {
		$prod2 = "Mouse Gamer";
		$preco2 = 280;
	} elseif ($prod2==3) {
		$prod2 = "Fone sem fio";
		$preco2 = 500;	
	} else {
		$prod2 = "Mochila";
		$preco2 = 200;	
	}
	

	if ($prod3==1) {
		$prod3 = "Placa de Video";
		$preco3 = 2800;
	} elseif ($prod3==2) {
		$prod3 = "Processador";
		$preco3 = 600;
	} elseif ($prod3==3) {
		$prod3 = "Monitor";
		$preco3 = 465;	
	} else {
		$prod3 = "SSD";
		$preco3 = 300;	
	}

	$frete=$_POST["frete"];
	$total = ($price01*$quantidade1) + ($preco2*$qtd2) + ($preco3*$qtd3);

	if ($frete==1) {
		$frete = 20;
		$tipofrete = "Frete Normal";
	} elseif ($frete==2) {
		$frete = 40;
		$tipofrete = "Frete Rapido";
	} else {
		$frete = 0;
		$tipofrete = "Retirada";
	}

	$valorfrete = $frete;
	$valorpg = $price01 + $preco2 + $preco3;

    // recebendo dados - etapa 4

	$totalfinal = $valorpg + $frete;

    //Confirmando dados//
	echo "<h2> Confirmando Pedido</h2>";
	echo "<h3> Dados do Cliente<br /></h3>";
	echo "Nome do Cliente: $nome <br/>";
    echo "Telefone: $telefone <br/>";	
	echo "E-mail: $email <br/>";

    //Confirmando dados do pedido//
	echo "<h3> Dados do Pedido</h3>";
	echo "<h4> Produto 1:</h4>";
	echo "Produto 1: $produto1 <br/>";
	echo "Quantidade: $quantidade1 <br/>";
	echo "Preço 1: $price01 <br/><br/>";

	echo "<h4> Produto 2:</h4>";
	echo "Produto 2: $prod2 <br/>";
	echo "Quantidade: $qtd2 <br/>";
	echo "Preço 2: $preco2 <br/><br/>";

	echo "<h4> Produto 3:</h4>";
	echo "Produto 3: $prod3 <br/>";
	echo "Quantidade: $qtd3 <br/>";
	echo "Preço 3: $preco3 <br/><br/>";

	echo "Preço do Frete: $frete <br/>";
	echo "Tipo do Frete: $tipofrete <br/>";
	echo "Valor Total da Compra: $totalfinal <br/><br/>";

    //Confirmando Forma de Pagamento//
	echo "<h3> Forma de Pagamento e Frete<br/></h3>";
	echo "Valor a Pagar:$totalfinal <br/>";

	// INSERINDO OS DADOS NO BANCO
	require("conecta.php");
	// Certifique-se de que as variáveis sejam tratadas adequadamente para evitar injeção de SQL.
	$nome = mysqli_real_escape_string($mysqli, $nome);
	$email = mysqli_real_escape_string($mysqli, $email);
	$telefone = mysqli_real_escape_string($mysqli, $telefone);

	$produto1 = mysqli_real_escape_string($mysqli, $produto1);
	$quantidade1 = mysqli_real_escape_string($mysqli, $quantidade1);
	$price01 = mysqli_real_escape_string($mysqli, $price01);
	$prod2 = mysqli_real_escape_string($mysqli, $prod2);
	$qtd2 = mysqli_real_escape_string($mysqli, $qtd2);
	$preco2 = mysqli_real_escape_string($mysqli, $preco2);
	$prod3 = mysqli_real_escape_string($mysqli, $prod3);
	$qtd3 = mysqli_real_escape_string($mysqli, $qtd3);
	$preco3 = mysqli_real_escape_string($mysqli, $preco3);
    $frete = mysqli_real_escape_string($mysqli, $frete);
    $tipofrete = mysqli_real_escape_string($mysqli, $valorfrete);

    $total = mysqli_real_escape_string($mysqli, $total);

	$mysqli->query("INSERT INTO tb_vendas VALUES 
    ('','$nome','$email','$telefone','$produto1','$quantidade1','$price01',
    '$prod2','$qtd2','$preco2','$prod3','$qtd3','$preco3',
    '$frete','$tipofrete','$total',$totalfinal)");

	echo $mysqli->error;
	?>
</form>
<br/><br/>
<a href="../index.php"><button>Nova Venda</button></a>
</body>
</html>