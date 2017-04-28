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


	<form action="#" method="#">
		<div class="row">
			<div class="small-12 medium-12 large-12 columns">
				<input type="text" placeholder="Nome:">
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
				<input type="text" placeholder="Endereço">
			</div>
			<div class="small-12 medium-2 large-2 columns">
				<input type="number" placeholder="Número">
			</div>
			<div class="small-12 medium-4 large-4 columns">
				<input type="text" placeholder="Complemento">
			</div>
		</div>
		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
				<input type="text" placeholder="Bairro">
			</div>
			<div class="small-12 medium-6 large-6 columns">
				<input type="text" placeholder="CEP">
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
				<input type="text" placeholder="Cidade">
			</div>
			<div class="small-12 medium-6 large-6 columns">
				<select name="estado" id="estado">
					<option value="#"  disabled selected = "selected">Estado</option>
					<option value="SC">Santa Catarina</option>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-6 large-6 columns">
				<input type="tel" placeholder="Telefone">
			</div>
			<div class="small-12 medium-6 large-6 columns">
				<input type="text" placeholder="Nome da ONG">
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns">
				<input type="submit" class="button success" value="Enviar Dados">
			</div>
		</div>

	</form>

	<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/foundation.js"></script>
</body>
</html>