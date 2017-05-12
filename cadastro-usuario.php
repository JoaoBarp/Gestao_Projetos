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




$sql = "insert into usuario (nome, rua, numero, complemento, bairro, cidade, estado, cep, telefone, ong, email, senha) values ('$nome', '$endereco', $numero, '$complemento', '$bairro', '$cep', '$cidade','$estado','$telefone','FALSE','$email','$senha');";

$res = mysqli_query($link, $sql) or die(mysqli_error($link));

// if(!mysqli_num_rows($res)) echo "Erro ao salvar Dados!";

mysqli_close($link);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de Usuário</title>
	<link rel="stylesheet" href="css/foundation.css">
</head>
<body>

	<div class="row">
		<div class="small-12 columns small-centered">
			<h1>Cadastro De Usuários</h1>
		</div>
	</div>


	<form action="cadastro-usuario.php" method="POST">

		<div class="row">
			<div class="small-12 medium-12 large-12 columns">
				<input type="text" placeholder="Nome:" name="nome">
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
				<input type="text" placeholder="Endereço" name="endereco">
			</div>

			<div class="small-12 medium-2 large-2 columns">
				<input type="number" placeholder="Número" min="0" name="numero">
			</div>

			<div class="small-12 medium-4 large-4 columns">
				<input type="text" placeholder="Complemento" name="complemento">
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
				<input type="text" placeholder="Bairro" name="bairro">
			</div>

			<div class="small-12 medium-6 large-6 columns">
				<input type="text" placeholder="CEP" name="cep">
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
				<input type="text" placeholder="Cidade" name="cidade">
			</div>

			<div class="small-12 medium-6 large-6 columns">
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
				<input type="tel" placeholder="Telefone" name="telefone">
			</div>

			<div class="small-12 medium-6 large-6 columns">
				<fieldset class="small-12 medium-8 large-8 columns">
					<legend>Escolha o porte/tamanho do animal</legend>
				<input type="radio" name="ong" value="ONG" checked> <label for="ONG">ONG</label>
				<input type="radio" name="ong" value="usuario"> <label for="Usuário">Usuário</label>
				</fieldset>
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
				<input type="email" placeholder="Email" name="email">
			</div>

			<div class="small-12 medium-6 large-6 columns">
				<input type="text" placeholder="Senha" name="senha">
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns">
				<input type="submit" name = "subUsuario" class="button success" value="Enviar Dados">
			</div>
		</div>

	</form>

	<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/foundation.js"></script>
</body>
</html>
