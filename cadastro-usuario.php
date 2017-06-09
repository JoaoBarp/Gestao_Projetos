<?php

$link = mysqli_connect("localhost", "root", "", "adocao");

if(isset($_POST['subUsuario'])){
	$nomeCompleto = $_POST['nomeCompleto'];
    $nomeUsuario = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $data = $_POST['data'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
	$senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $numero  = $_POST['numero'];
    $complemento  = $_POST['complemento'];
    $bairro  = $_POST['bairro'];    
    $cidade  = $_POST['cidade'];
	$estado = $_POST['estado'];
	$cep  = $_POST['cep'];

	$sql = "insert into usuario (nome, nome_completo, rua, numero, complemento, bairro, cidade, estado, cep, telefone, email, data_nascimento, cpf, rg, senha)
		values (\"$nomeUsuario\", \"$nomeCompleto\", \"$endereco\", \"$numero\", \"$complemento\", \"$bairro\", \"$cidade\", \"$estado\", \"$cep\",\"$telefone\", \"$email\", \"$data\", \"$cpf\", \"$rg\", \"$senha\");";
		echo"hue ";
	$res = mysqli_query($link, $sql) or die(mysqli_error($link));

	

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
				<div class="small-12 medium-6 large-6 columns">
					<label>Nome Completo</label>
					<input type="text" placeholder="Nome Completo" name="nomeCompleto" required>
				</div>
				<div class="small-12 medium-6 large-6 columns">
					<label for="nome">Nome de usuário
						<input type="text" name="nome" required>
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-6 large-6 columns">
					<label>CPF</label>
					<input type="text" placeholder="" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required>
				</div>

				<div class="small-12 medium-6 large-6 columns">
					<label for="rg">RG
						<input type="text" name="rg" required>
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-6 large-6 columns">
					<label for="data">Data de nascimento
						<input type="date" name="data" required>
					</label>
				</div>
				<div class="small-12 medium-6 large-6 columns">
					<label>Telefone</label>
					<input type="tel" placeholder="xx-xxxxx-xxxx" OnKeyPress="formatar('##-#####-####', this)" name="telefone" required>
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
				<div class="small-12 medium-8 large-9 columns">
					<label>Endereço</label>
					<input type="text" placeholder="" name="endereco" required>
				</div>

				<div class="small-12 medium-4 large-3 columns">
					<label>Número</label>
					<input type="number" placeholder="" min="0" name="numero" required style="-moz-appearance:textfield;-webkit-appearance: none; margin: 0;">
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-6 large-6 columns">
					<label>Complemento</label>
					<input type="text" placeholder="" name="complemento">
				</div>

				<div class="small-12 medium-6 large-6 columns">
					<label>Bairro</label>
					<input type="text" placeholder="" name="bairro" required>
				</div>

			</div>

			<div class="row">
				<div class="small-12 medium-6 large-6 columns">
					<label>Cidade</label>
					<input type="text" placeholder="" name="cidade" required>
				</div>

				<div class="small-12 medium-6 large-6 columns">
<<<<<<< HEAD
					<label for="estado">Estado
						<select name="estado" required>
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
=======
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
>>>>>>> 481011e87dfb7de5372ea00b52cbb4aa67689272
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-6 large-6 columns">
					<label>CEP</label>
					<input type="text" placeholder="xxxxx-xxx" name="cep" required>
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
