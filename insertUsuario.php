<?php

$nome;
$endereco;
$numero;
$complemento;
$bairro;
$cep;
$cidade;
$estado;
$telefone;
$ong;
$email;
$senha;

if( isset( $_POST['nome'] ) ) {
  $nome = $_POST['nome'];
}

if( isset( $_POST['endereco'] ) ) {
  $endereco = $_POST['endereco'];
}

if( isset( $_POST['numero'] ) ) {
  $numero = $_POST['numero'];
}

if( isset( $_POST['complemento'] ) ) {
  $complemento = $_POST['complemento'];
}

if( isset( $_POST['bairro'] ) ) {
  $bairro = $_POST['bairro'];
}

if( isset( $_POST['cep'] ) ) {
  $cep = $_POST['cep'];
}

if( isset( $_POST['cidade'] ) ) {
  $cidade = $_POST['cidade'];
}

if( isset( $_POST['estado'] ) ) {
  $estado = $_POST['estado'];
}

if( isset( $_POST['telefone'] ) ) {
  $telefone = $_POST['telefone'];
}

if( isset( $_POST['ong'] ) ) {
  $ong = $_POST['ong'];
}

if( isset( $_POST['email'] ) ) {
  $email = $_POST['email'];
}

if( isset( $_POST['senha'] ) ) {
  $senha = $_POST['senha'];
}

$servername = "localhost";
$username = "tom";
$password = "1234";
$dbname = "adocao";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if( $conn->connect_error ) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO usuario( nome, rua, numero, complemento, bairro, cidade, estado, cep, telefone, ong, email, senha )
VALUES ( '$nome', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$ong', '$email', '$senha' )";

if ($conn->query($sql) === TRUE) {
    echo "Sucesso!!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


?>
