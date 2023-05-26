<?php

//carregar arquivo XML

$xml = simplexml_load_file("arquivo.xml");

//exibir as informações do XML

echo "Título: ".$xml->titulo."<br>";
echo "Relatório: ".$xml->relatorio."<br><br><br>";

//laço de repetição para exibir todos os registros
foreach($xml->venda as $registro):
  echo "Id da venda: ".$registro->id."<br>";
  echo "Nome: ".$registro->nome."<br>";
  echo "Email: ".$registro->email."<br>";
  echo "Celular: ".$registro->celular."<br><br>";
 
    foreach($registro->produtos->produto as $produto):
      echo "ID do produto: ".$produto->id."<br>";
      echo "Nome do produto: ".$produto->nome."<br>";
      echo "Quantidade: ".$produto->quantidade."<br><hr>";
    endforeach;
  echo "<hr color='red'>";
endforeach;



?>