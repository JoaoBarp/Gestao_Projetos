<?php
$conn = mysqli_connect('localhost', 'root', '', 'adocao') or die('Não foi possível conectar');

if(isset($_POST['subUsuario'])){
    $nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$cnpj = $_POST['cnpj'];
	$razaoSocial = $_POST['razaoSocial'];
	$fundacao = $_POST['fundacao'];
	$imagem = $_POST['imagem'];
	$link = $_POST['link'];
	$descricao = $_POST['descricao'];
	$cep  = $_POST['cep'];
	$telefone = $_POST['telefone'];
    $endereco = $_POST['rua'];
    $numero  = $_POST['numero'];
    $complemento  = $_POST['complemento'];
    $bairro  = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cidade  = $_POST['cidade'];
	$nomeRepresentante = $_POST['nomeRepresentante'];
	$cargo = $_POST['cargo'];

	$sql = "insert into ong(id, nome, razao_social, cnpj, link, rua, numero, complemento, bairro, cidade, estado, cep, telefone, email, nome_representante, cargo, descricao, imagem, fundacao, senha)
		values (NULL, '$nome', '$razaoSocial', '$cnpj', '$link', '$endereco', '$numero', '$complemento', '$bairro','$cidade', '$estado','$cep','$telefone','$email','$nomeRepresentante','$cargo','$descricao','$imagem', '$fundacao','$senha');";


	$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	// if(!mysqli_num_rows($res)) echo "Erro ao salvar Dados!";

	mysqli_close($conn);
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

	<div style="margin-top:1%; margin-bottom:10%" class="row small-12 medium-5 large-5 column">

		<div class="row">
			<div class="small-12 medium-12 large-12 columns small-centered text-center">
				<h3 style="color:#767676">Cadastro de ONG</h3>
			</div>
		</div>

		<form style="margin-top:3%" action="cadastro-ong.php" method="POST">

			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<label for="nome">Nome
						<input type="text" name="nome" placeholder="Insira o nome da ONG que você representa">
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-12 large-6 columns">
					<label for="email">Email
						<input type="email" placeholder="email@exemplo.com" name="email">
					</label>
				</div>

				<div class="small-12 medium-12 large-6 columns">
					<label for="senha">Senha
						<input type="password" name="senha">
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-12 large-6 columns">
					<label for="cnpj">CNPJ
						<input type="text" placeholder="00.000.000/0000-00" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)">
					</label>
				</div>
				<div class="small-12 medium-12 large-6 columns">
					<label for="razaoSocial">Razão Social
						<input type="text" name="razaoSocial">
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<label for="fundacao">Fundação da ONG
						<input type="date" name="fundacao" placeholder="A que fundação a ONG pertence?">
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-12 large-6 columns">
					<label for="imagem">Logo da ONG</label>
					<input type="file" name="imagem">
				</div>
			</div>

			<div class="row">
				<div class="samll-12 columns">
					<label for="descricao">Descrição da ONG
						<textarea name="descricao" id="descricao" placeholder="Informações adicionais" rows="10"></textarea>
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 columns">
					<label for="link">Link externo da ONG
						<input type="url" name="link">
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-12 large-6 columns">
					<label for="cep">CEP
						<input type="text" placeholder="" name="cep">
					</label>
				</div>

				<div class="small-12 medium-12 large-6 columns">
					<label for="telefone">Telefone
						<input type="tel" placeholder="(xx)xxxxx-xxxx" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" name="telefone">
					</label>
				</div>

			</div>

			<div class="row">
				<div class="small-12 medium-8 large-9 columns">
					<label for="rua">Endereço
						<input type="text" name="rua">
					</label>
				</div>

				<div class="small-12 medium-4 large-3 columns">
					<label for="numero">Número
						<input type="number" min="0" name="numero" style="-moz-appearance:textfield;-webkit-appearance: none; margin: 0;">
					</label>
				</div>
			</div>

			<div class="row">

				<div class="small-12 medium-12 large-5 columns">
					<label for="complemento">Complemento
						<input type="text" name="complemento">
					</label>
				</div>

				<div class="small-12 medium-12 large-7 columns">
					<label for="bairro">Bairro
						<input type="text"  name="bairro">
					</label>
				</div>

			</div>

			<div class="row">
				<div class="small-12 medium-12 large-5 columns">
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

				<div class="small-12 medium-12 large-7 columns">
					<label for="cidade">Cidade
						<input type="text"  name="cidade">
					</label>
				</div>

			</div>


			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<label for="nomeRepresentante">Nome do Representante
						<input type="text" name="nomeRepresentante">
					</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<label for="cargo">Cargo
						<input type="text" placeholder="Cargo do representante" name="cargo">
					</label>
				</div>
			</div>

			<div style="margin-top:1%" class="row">
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
