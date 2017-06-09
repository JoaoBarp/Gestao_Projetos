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
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	/*
	$sql = "insert into usuario (nome, rua, numero, complemento, bairro, cidade, estado, cep, telefone, ong, email, senha)
		values ('$nome', '$endereco', $numero, '$complemento', '$bairro', '$cidade', '$estado', '$cep','$telefone', '$ong','$email','$senha');";
	*/

	// Colocar variavel cpf no campo certo
	$sql = "insert into usuario (nome, rua, numero, complemento, bairro, cidade, estado, cep, telefone, email, senha)
		values ('$nome', '$endereco', $numero, '$complemento', '$bairro', '$cidade', '$estado', '$cep','$telefone', '$email','$senha');";

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

	<div style="margin-top:1%" class="row small-12 medium-5 large-5 column">

		<div class="row">
			<div class="small-12 medium-12 large-12 columns small-centered text-center">
				<h3 style="color:#767676">Cadastro de Usuário</h3>
			</div>
		</div>


		<form style="margin-top:3%" action="cadastro-usuario.php" method="POST">

			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<label>Nome Completo</label>
					<input type="text" placeholder="Nome Completo" name="nome" required>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-6 large-6 columns">
					<label>CPF</label>
					<input type="text" placeholder="" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required>
				</div>

				<div class="small-12 medium-6 large-6 columns">
					<label>Telefone</label>
					<input type="tel" placeholder="(xx)xxxxx-xxxx" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" name="telefone">
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-6 large-6 columns">
					<label>Email</label>
					<input type="email" placeholder="exemplo@email.com" name="email" required>
				</div>

				<div class="small-12 medium-6 large-6 columns">
					<label>Senha</label>
					<input type="password" placeholder="Digite sua senha" name="senha" required>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-12 large-9 columns">
					<label>Endereço</label>
					<input type="text" placeholder="" name="endereco">
				</div>

				<div class="small-3 medium-4 large-3 columns">
					<label>Número</label>
					<input type="number" placeholder="" min="0" name="numero" style="-moz-appearance:textfield;-webkit-appearance: none; margin: 0;">
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-6 large-6 columns">
					<label>Complemento</label>
					<input type="text" placeholder="" name="complemento">
				</div>

				<div class="small-9 medium-8 large-6 columns">
					<label>Bairro</label>
					<input type="text" placeholder="" name="bairro">
				</div>

			</div>

			<div class="row">
				<div class="small-12 medium-6 large-6 columns">
					<label>Cidade</label>
					<input type="text" placeholder="" name="cidade">
				</div>

				<div class="small-12 medium-6 large-6 columns">
          <label for="estado">Estado
            <select name="estado">
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="DF">Distrito Federal</option>
              <option value="ES">Espírito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MT">Mato Grosso</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MG">Minas Gerais</option>
              <option value="PA">Pará</option>
              <option value="PB">Paraíba</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
            </select>
          </label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-6 large-6 columns">
					<label>CEP</label>
					<input type="text" placeholder="xxxxx-xxx" name="cep">
				</div>
			</div>


			<div style="margin-top:2%" class="row">
				<div class="small-12 columns">
					<input type="submit" name = "subUsuario" class="button primary" value="Enviar">
				</div>
			</div>

		</form>

	</div>

	<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/foundation.js"></script>
</body>
</html>
