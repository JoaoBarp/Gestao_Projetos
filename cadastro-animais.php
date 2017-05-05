<?php


?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/foundation.css">
    <title>Cadastro de um novo animal</title>
</head>
<body>

  <div class="row">
		<div class="small-12 columns small-centered">
			<h1>Cadastro De Animais</h1>
		</div>
	</div>

  <div class="row">
  	<div class="small-12 medium-12 large-12 columns">
  		<form>
		    <div class="row">
          <div class="small-12 medium-4 large-4 columns">
    		    <label>Nome do animal
    		    <input type="text" name="nomeanimal">
            </label>
          </div>
		    	<fieldset class="small-12 medium-8 large-8 columns">
              <legend>Escolha o porte/tamanho do animal</legend>
				    <input type="radio" name="porte" value="pequeno" checked> <label for="pequeno">Pequeno</label>
				    <input type="radio" name="porte" value="medio"> <label for="medio">Médio</label>
				    <input type="radio" name="porte" value="grande"> <label for="grande">Grande</label>
          </fieldset>

        </div>

        <div class="row">
          <div class="small-12 medium-4 large-4 columns">
		         <label>Tipo de animal<!--Buscar no banco-->
		          <select name="tipoanimal">
		              <option value="gato">Gato</option>
		          </select>
            </label>
          </div>
          <div class="small-12 medium-4 large-4 columns">
            <label>Raça <!--Buscar no banco as raças de acordo com o tipo de animal-->
            <select name="raca">
              <option value="siames">Siamês</option>
            </select>
            </label>
          </div>

          <div class="small-12 medium-4 large-4 columns">
		    		<label>Idade:
		   			 <input type="number" name="idadeanimal" min="0" max="200">
            </label>
		    	</div>
        </div>
  		    <!--No momento de inserir no banco, o campo "usuario" deve ser pego da sessão-->
        <div class="row">
        <div class="small-12 medium-12 large-12 columns">
  		    <label>Descrição
  		    <textarea placeholder="Descrições adicionais"></textarea>
          </label>
        </div>
      </div>

      <div class="row">
        <div class="small-12 medium-3 large-3 large-centered text-center column">
          <input type="submit" class="expanded button primary" value="Enviar">
        </div>
      </div>

		 </form>
  	</div>
  </div>


<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/foundation.js"></script>

</body>
</html>
