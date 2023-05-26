<?php
  echo"<h1>Ler XML com PHP</h1>";
  //carregando o arquivo XML
  //$xml = simplexml_load_file("arquivo.xml");
 
  //carregar conteúdo XML por Variável
  $string = "<?xml version='1.0' encoding='UTF-8'?>
<venda>
  <id>1</id>
  <nome>Arthur</nome>
  <email>arthur@teste.com</email>
  <celular>(55) 9999-9999</celular>
</venda>
";
$xml = simplexml_load_string($string);

 //Apresentar as informções XML
  echo 'ID: '.$xml->id.'<br>';
  echo 'Nome: '.$xml->nome.'<br>';
  echo 'E-mail: '.$xml->email.'<br>';
  echo 'Celular: '.$xml->celular.'<br>';
?>