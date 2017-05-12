<?php
$link = mysqli_connect('localhost', 'root', '', 'adocao') or die('Não foi possível conectar');

if(isset($_POST['subAnimal'])){
    $idade = $_POST['idadeanimal'];
    $porte = $_POST['porte'];
    $tipo  = $_POST['tipoanimal'];
    $raca  = $_POST['raca'];
    $nome  = $_POST['nomeanimal'];
    $desc  = $_POST['descricao'];

// echo $idade . "<br>";
// echo $porte . "<br>";
// echo $tipo . "<br>";
// echo $raca . "<br>";
// echo $nome . "<br>";
// echo $desc . "<br>";

// $sql = "insert into animais (idade, porte, descricao, nomeanimal, tipoanimal, nomeusuario, raca) values (1, 'medio', 'ooddddooo', 'Murphy', 'cachorro', 'japa', 'Pit bull');";
$sql = "insert into animais (idade, porte, descricao, nomeanimal, tipoanimal, nomeusuario, raca) values ($idade, '$porte', '$desc', '$nome', '$tipo', 'japa', '$raca');";

$res = mysqli_query($link, $sql) or die(mysqli_error($link));

// if(!mysqli_num_rows($res)) echo "Erro ao salvar Dados!";

mysqli_close($link);
}

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
  		<form action="cadastro-animais.php" method="post">
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
                <?php
            	    $sql = "SELECT nome FROM tipoAnimal order by nome;";
                    $res = mysqli_query($link, $sql);
                    while ($resu = mysqli_fetch_assoc($res)){
                        echo '<option value="'.$resu['nome'].'">'.$resu['nome'].'</option>';

                    }
            	   ?>
		              <!-- <option value="gato">Gato</option> -->
		          </select>
            </label>
          </div>
          <div class="small-12 medium-4 large-4 columns">
            <label>Raça <!--Buscar no banco as raças de acordo com o tipo de animal-->
            <select name="raca">
              <option value="Siamês">Siamês</option>
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
  		    <textarea name="descricao" placeholder="descricao"></textarea>
          </label>
        </div>
      </div>

      <div class="row">
        <div class="small-12 medium-3 large-3 large-centered text-center column">
          <input type="submit" name="subAnimal" class="expanded button primary" value="Enviar">
        </div>
      </div>

		 </form>
  	</div>
  </div>


<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/foundation.js"></script>

</body>
</html>
