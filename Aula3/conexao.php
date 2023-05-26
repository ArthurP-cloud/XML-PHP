<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "xml";

try {
  $conn = new PDO("mysql:host=$hostname;dbname=".$database, $user, $password);
  //echo "Conexão realizada com sucesso.";
} catch (PDOException $erro) {
  echo "Erro: Conexão com o banco de dados falhou.".$erro->getMessage();
  
}

?>