<?php
include_once "./conexao.php";
//carregar arquivo xml em um OBJETO
$xml = simplexml_load_file("arquivo.xml");

foreach($xml->usuario as $registro):
  echo "Nome: ".$registro->nome."<br>";
  echo "E-mail: ".$registro->email."<br>";

  //recomendado usar link no lugar dos valores a serem adicionados.
  $sql = "INSERT INTO usuarios(nome,email) VALUES (:nome,:email)";
  $cad_usuario = $conn-> prepare($sql);
  $cad_usuario->bindParam(':nome', $registro->nome);
  $cad_usuario->bindParam(':email', $registro->email);
  $cad_usuario->execute();
  
  if($cad_usuario->rowCount()){
    echo "<p style='color: green'>Cadastrado com sucesso.</p>";
  }else{
      echo "<p style='color: red'>Cadastrado não realizado.</p>";
  }

  echo "<hr>";
endforeach;

?>