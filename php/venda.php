<?php
session_start();
$erro_quantidade = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {
	$_SESSION["produto1"]  = $_POST["produto1"];
	$_SESSION["quantidade1"] = $_POST["quantidade1"];
	$_SESSION["prod2"]  = $_POST["prod2"];
	$_SESSION["qtd2"] = $_POST["qtd2"];
	$_SESSION["prod3"]  = $_POST["prod3"];
	$_SESSION["qtd3"] = $_POST["qtd3"];

	if ($_SESSION["quantidade1"] < 1) {
		$erro_quantidade = "<span style='color:red'>Preencher Quantidade</span>";
		$erro_validacao ++;
	}
	if ($_SESSION["qtd2"] < 1) {
		$erro_quantidade = "<span style='color:red'>Preencher Quantidade</span>";
		$erro_validacao ++;
	}
	if ($_SESSION["qtd3"] < 1) {
		$erro_quantidade = "<span style='color:red'>Preencher Quantidade</span>";
		$erro_validacao ++;
	}




	if ($erro_validacao == 0) {
		Header("location:processavendas.php");
	}

	
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles3.css">
    <title>Venda de Jogos</title>
</head>
<body>


	<h2> Dados do pedido </h2>
	<form method = "POST" action="processavendas.php">

		<h2>Dados do Cliente</h2>
                <label for="nome">Nome:</label>
                <input type="text"  name="nome" size="50" maxlength="50" required>
                <br><br><label for="cpf">Telefone:&nbsp;&nbsp;&nbsp;</label>
                <input type="text"  name="telefone" maxlength="35" minlength="11" required >
				<br><br><label for="cpf">Email:&nbsp;&nbsp;&nbsp;</label>
                <input type="text"  name="email" maxlength="35" minlength="11" required >
                <br/><br/>
		<h2>Escolha seu Setup:</h2>
		Jogo:<br/> 
		<select name="produto1"> 
			<option value="1" <?php if((isset($_SESSION["produto1"])) AND ($_SESSION["produto1"] == "1")) echo 'selected="true"' ?>> Mouse tx1 - R$ 180,00 </option> 
			<option value="2" <?php if((isset($_SESSION["produto1"])) AND ($_SESSION["produto1"] == "2")) echo 'selected="true"' ?>> Headset v3  -  R$ 140,00 </option> 
			<option value="3" <?php if((isset($_SESSION["produto1"])) AND ($_SESSION["produto1"] == "3")) echo 'selected="true"' ?>> Keyboard gxt10 - R$ 165,00 </option>
			<option value="4" <?php if((isset($_SESSION["produto1"])) AND ($_SESSION["produto1"] == "4")) echo 'selected="true"' ?>> Mousepad Logi - R$ 200,00 </option>
		</select><br/>

		Quantidade: 
		<input type="text" name="quantidade1" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["quantidade1"])) echo $_SESSION["quantidade1"] ?>" />
		<?php echo $erro_quantidade ?><br><br>


        <legend>Escolha o Acessório:</legend>
        <input type="radio" name="prod2" value="1" required/> Controle PS5   -   R$ 350,00  <br/>
        <input type="radio" name="prod2" value="2"/> Mouse Gamer   -   R$ 280,00  <br/>
        <input type="radio" name="prod2" value="3"/> Fone sem fio   -   R$ 500,00  <br/>
        <input type="radio" name="prod2" value="4"/> Mochila   -   R$ 200,00  <br/>

    		Quantidade
            <select name="qtd2"  >
                <option value="1" > 1 </option>
                <option value="2" > 2 </option>
                <option value="3" > 3 </option>
                <option value="4" > 4 </option>             
            </select><br><br>


			Esolha o hardware:<br/> 
		<select name="prod3"> 
			<option value="1" <?php if((isset($_SESSION["prod3"])) AND ($_SESSION["prod3"] == "1")) echo 'selected="true"' ?>> Placa de Video - R$ 2800,00 </option> 
			<option value="2" <?php if((isset($_SESSION["prod3"])) AND ($_SESSION["prod3"] == "2")) echo 'selected="true"' ?>> Processador  -  R$ 600,00 </option> 
			<option value="3" <?php if((isset($_SESSION["prod3"])) AND ($_SESSION["prod3"] == "3")) echo 'selected="true"' ?>> Monitor - R$ 465,00 </option>
			<option value="4" <?php if((isset($_SESSION["prod3"])) AND ($_SESSION["prod3"] == "4")) echo 'selected="true"' ?>> SSD - R$ 300,00 </option>
		</select><br/>
		Quantidade: 
		<input type="text" name="qtd3" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["qtd3"])) echo $_SESSION["qtd3"] ?>" />
		<?php echo $erro_quantidade ?><br><br>


		<h2> Frete </h2>	
		<h2>Escolha o tipo do frete</h2>
		<input type="radio" name="frete" value="1"  >Frete normal - 20 reais <br/>
		<input type="radio" name="frete" value="2"  >Frete Rapido - 40 reais <br/>
		<input type="radio" name="frete" value="3"  >Retirada - Gratis 
		<br/>

		<br/><br/> 
		
		<input type="submit" value="prosseguir" name="botao">
	</form>
	<a href="index.php"><button>Voltar</button></a>
</body>
</html>