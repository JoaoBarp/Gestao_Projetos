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
                <label for="nome">Nome
                	<input type="text" name="nome">
                </label>
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
                <label for="cnpj">CNPJ
					<input type="text" placeholder=":" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)">
				</label>
			</div>
			<div class="small-12 medium-6 large-6 columns">
				<label for="razaoSocial">Razão Social
					<input type="text" name="razaoSocial">
				</label>
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
				<label for="fundacao">Fundação da ONG
					<input type="date" name="fundacao">
				</label>
			</div>
			<div class="small-12 medium-6 large-6 columns">
				<label for="imagem">Imagem
					<input type="file" name="imagem">
				</label>
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns">
				<label for="link">Link externo da ONG
					<input type="text" name="link">
				</label>
			</div>
		</div>

		<div class="row">
			<div class="samll-12 columns">
				<label for="descricao">Descrição da ONG
					<textarea name="descricao" id="descricao" rows="10"></textarea>
				</label>
			</div>
		</div>
		
		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
                <label for="rua">Endereço
					<input type="text" name="rua">
				</label>
			</div>

			<div class="small-12 medium-2 large-2 columns">
                <label for="numero">Número
					<input type="number" min="0" name="numero">
				</label>
			</div>

			<div class="small-12 medium-4 large-4 columns">
                <label for="complemento">Complemento
					<input type="text" name="complemento">
				</label>
			</div>
		</div>        

		<div class="row">		
			<div class="small-12 medium-2 large-2 columns">
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

			<div class="small-12 medium-5 large-5 columns">
                <label for="bairro">Bairro
					<input type="text"  name="bairro">
				</label>
			</div>

			<div class="small-12 medium-5 large-5 columns">
                <label for="cidade">Cidade
					<input type="text"  name="cidade">
				</label>
			</div>
			
		</div>

		<div class="row">
			<div class="small-12 medium-4 large-4 columns">
                <label for="cep">CEP
					<input type="text" placeholder="" name="cep">
				</label>
			</div>

			<div class="small-12 medium-4 large-4 columns">
                <label for="telefone">Telefone
					<input type="tel" placeholder="(xx)xxxxx-xxxx" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" name="telefone">
				</label>
			</div>

			<div class="small-12 medium-4 large-4 columns">
                <label for="email">Email
					<input type="email" placeholder="email@exemplo.com" name="email">
				</label>
			</div>
		
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
				<label for="nomeRepresentante">Nome do Representante
					<input type="text" name="nomeRepresentante">
				</label>
			</div>
			<div class="small-12 medium-6 large-6 columns">
				<label for="cargo">Cargo
					<input type="text" name="cargo">
				</label>
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns">				
                <label for="senha">Senha
					<input type="password" name="senha">
				</label>
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
