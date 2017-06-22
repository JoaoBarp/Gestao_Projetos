<?php
$link = mysqli_connect('localhost', 'root', '', 'adocao') or die('Não foi possível conectar');

if(isset($_POST['subAnimal'])){
    $idade = $_POST['idadeanimal'];
    $porte = $_POST['porte'];
    $tipo  = $_POST['tipoanimal'];
    $raca  = $_POST['raca'];
    $nome  = $_POST['nomeanimal'];
    $desc  = $_POST['descricao'];
    $v8v10 = $_POST['v8v10'];
    $raiva = $_POST['Vraiva'];
    $castrado = $_POST['castrado'];
    $amigavel  = $_POST['amigavel'];

    $imagem = $_FILES["imagem"];
    if($imagem != NULL) {
          $tamanhoImg = filesize($nomeFinal);
          $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

   }


// echo $idade . "<br>";
// echo $porte . "<br>";
// echo $tipo . "<br>";
// echo $raca . "<br>";
// echo $nome . "<br>";
// echo $desc . "<br>";

// $sql = "insert into animais (idade, porte, descricao, nomeanimal, tipoanimal, nomeusuario, raca) values (1, 'medio', 'ooddddooo', 'Murphy', 'cachorro', 'japa', 'Pit bull');";
$sql = "insert into animais (imagem,raiva, castrado, amigavel,v8v10,idade, porte, descricao, nomeanimal, tipoanimal, nomeusuario, raca) values ('$mysqlImg','$raiva','$castrado','$amigavel','$v8v10',$idade, '$porte', '$desc', '$nome', '$tipo', 'japa', '$raca');";

$res = mysqli_query($link, $sql) or die(mysqli_error($link));
header('location:cadastro-animais.php');
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
    		    <input placeholder="Digite apenas letras" required pattern="[a-z\s]+$" type="text" name="nomeanimal">
            </label>
          </div>
		    	<fieldset class="small-12 medium-4 large-4 columns">
              <legend>Escolha o porte/tamanho do animal</legend>
				    <input type="radio" name="porte" value="pequeno" checked> <label for="pequeno">Pequeno</label>
				    <input type="radio" name="porte" value="medio"> <label for="medio">Médio</label>
				    <input type="radio" name="porte" value="grande"> <label for="grande">Grande</label>
          </fieldset>
          <div class="small-12 medium-4 large-4 columns">
            <label>Imagem do animal
            <input type="file" name="foto">
            </label>
          </div>
        </div>

        <div class="row">
          <div class="small-12 medium-3 large-3 columns">
		         <label>Tipo de animal<!--Buscar no banco-->
		          <select required name="tipoanimal">
                      <option value="">Selecione</option>
                      <?php
                    	  $sql = "SELECT id, nome FROM tipoAnimal order by nome;";
                          $res = mysqli_query($link, $sql);
                          while ($resu = mysqli_fetch_assoc( $res ) ){
                              echo '<option value="'.$resu['id'].'">'.$resu['nome'].'</option>';
                              //echo $resu;
                          }

        	          ?>
		          </select>
            </label>
          </div>
          <div class="small-12 medium-3 large-3 columns">
            <label>Raça <!--Buscar no banco as raças de acordo com o tipo de animal-->
            <select required name="raca"></select>
            </label>
          </div>

          <div class="small-12 medium-3 large-3 columns">
		    		<label>Idade:
		   			 <input required type="number" name="idadeanimal" min="0" max="200">
            </label>
		    	</div>

                  <div class="small-12 medium-3 large-3 columns">
                        <fieldset>
                              <legend>Amigavel ?</legend>
                              <input type="radio" name="amigavel" value="pequeno" checked> <label for="TRUE">Sim</label>
                              <input type="radio" name="amigavel" value="medio"> <label for="NULL">Não</label>
                        </fieldset>
                  </div>
        </div>
  		    <!--No momento de inserir no banco, o campo "usuario" deve ser pego da sessão-->
        <div class="row">
        <div class="small-12 medium-12 large-12 columns">
  		    <label>Descrição
  		    <textarea name="descricao" placeholder="Informe mais detalhes sobre o animal (idade, histórico de saúde, preferência de que tipo de lar, etc...)"></textarea>
          </label>
        </div>
      </div>

      <div class="row">
      <div class="small-12 medium-12 large-12 columns">
            <input name="Vraiva" id="Vraiva" type="checkbox"><label for="checkbox2">Tem vacina para raiva ?</label>
      </div>
      </div>
      <div class="row">
      <div class="small-12 medium-12 large-12 columns">
            <input name="v8v10" id="v8v10" type="checkbox"><label for="checkbox2">Tem vacina v8v10 ?</label>
      </div>
      </div>
      <div class="row">
      <div class="small-12 medium-12 large-12 columns">
      <input name="castrado" id="castrado" type="checkbox"><label for="checkbox2">Castrado ?</label>
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

    <script>
        $( "select[name='tipoanimal']" ).on( 'change', function() {
            var tipoAnimal = $( "select[name='tipoanimal']" ).val();

            $.ajax({
                url: 'racas.php',
                data: { 'tipoAnimal': tipoAnimal },
                type: 'POST',
                success: function( result ) {
                    console.log(result);
                    result = JSON.parse( result );
                    console.log( result );
                    var raca = $( "select[name='raca']" );
                    // limpa os valores se existir
                    raca.html("");
                    // roda todos os resultados retornados
                    $.each( result, function( i, value ) {
                        // pega a posição do json e inclui no select
                        raca.html( "<option value="+ value.id +">"+ value.nome +"<option>" );
                    })
                },
                error: function(ret,a) {
                    console.log(ret, a);
                }
            });
        })
    </script>

</body>
</html>
