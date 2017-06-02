<?php
$link = mysqli_connect('localhost', 'root', '', 'adocao') or die('Não foi possível conectar');

if(isset($_POST['subUsuario'])){
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $numero  = $_POST['numero'];
    $complemento  = $_POST['complemento'];
    $bairro  = $_POST['bairro'];
    $cep  = $_POST['cep'];
    $cidade  = $_POST['cidade'];
	$estado = $_POST['estado'];
	$telefone = $_POST['telefone'];
	$ong = $_POST['ong'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];


	$sql = "insert into usuario (nome, rua, numero, complemento, bairro, cidade, estado, cep, telefone, ong, email, senha)
		values ('$nome', '$endereco', $numero, '$complemento', '$bairro', '$cidade', '$estado', '$cep','$telefone', '$ong','$email','$senha');";


	$res = mysqli_query($link, $sql) or die(mysqli_error($link));

	// if(!mysqli_num_rows($res)) echo "Erro ao salvar Dados!";

	mysqli_close($link);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de ONG</title>
	<link rel="stylesheet" href="css/foundation.css">
</head>
<body>

	<script>
		function formatar(mascara, documento){
			var i = documento.value.length;
			var saida = mascara.substring(0,1);
			var texto = mascara.substring(i)

			if (texto.substring(0,1) != saida){
						documento.value += texto.substring(0,1);
			}

		}
	</script>


	<div class="row">
		<div class="small-12 columns small-centered">
			<h1 style="color:#767676">Cadastro de ONG</h1>
		</div>
	</div>


	<form action="cadastro-ong.php" method="POST">

		<div class="row">
			<div class="small-12 medium-12 large-12 columns">
                <label>Nome</label>
                <input type="text" placeholder="Nome da ONG" name="nome">
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-12 large-12 columns">
                <label>CNPJ</label>
				<input type="text" placeholder=":" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)">
			</div>
		</div>

        <div class="row">
			<div class="small-12 medium-6 large-6 columns">
                <label>Email</label>
				<input type="email" placeholder="email@exemplo.com" name="email">
			</div>

			<div class="small-12 medium-6 large-6 columns">
                <label>Senha</label>
				<input type="password" placeholder="" name="senha">
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
                <label>Endereço</label>
				<input type="text" placeholder="" name="endereco">
			</div>

			<div class="small-12 medium-2 large-2 columns">
                <label>Número</label>
				<input type="number" placeholder="" min="0" name="numero">

			</div>

			<div class="small-12 medium-4 large-4 columns">
                <label>Complemento</label>
				<input type="text" placeholder="" name="complemento">
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
                <label>Bairro</label>
				<input type="text" placeholder="" name="bairro">
			</div>

			<div class="small-12 medium-6 large-6 columns">
                <label>CEP</label>
				<input type="text" placeholder="" name="cep">
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
                <label>Cidade</label>
				<input type="text" placeholder="" name="cidade">
			</div>

			<div class="small-12 medium-6 large-6 columns">
                <label>Estado</label>
				<select name="estado" id="estado">
					<?php
						$sql = "SELECT nome FROM estados order by nome;";
							$res = mysqli_query($link, $sql);
							while ($resu = mysqli_fetch_assoc($res)){
									echo '<option value="'.$resu['nome'].'">'.$resu['nome'].'</option>';

							}
					 ?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
                <label>Telefone</label>
				<input type="tel" placeholder="(xx)xxxxx-xxxx" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" name="telefone">
			</div>

		</div>

		<div class="row">
			<div class="small-12 columns">
				<input type="submit" name = "subUsuario" class="button primary" value="Enviar Dados">
			</div>
		</div>

	</form>



	<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/foundation.js"></script>
</body>
</html>
