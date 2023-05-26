<?php
include_once "./conexao.php";
  //carregar arquivos XML

  $xml = simplexml_load_file("arquivo.xml");

  foreach($xml->usuario as $registro):
    echo "Nome: ".$registro->nome."<br>";
    echo "E-mail: ".$registro->nome."<br>";

    $query = "SELECT id FROM usuarios WHERE email =:email LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $registro->email);
    $stmt->execute();

    if(($stmt) && ($stmt->rowCount() !=0)){
      echo "<p style='color: red;'>Erro: Usuario já cadastrado.</p>";
    }else{
      $query = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":nome", $registro->nome);
    $stmt->bindParam(":email", $registro->email);
    $stmt->execute();

    if($stmt->rowCount()){
      echo "<p style='color: green;'>Cadastrado com sucesso.</p>";
    }else{
      echo "<p style='color: red;'>Erro: Não cadastrado.</p>";
    }


    echo "<hr>";
    }    
  endforeach;
?>