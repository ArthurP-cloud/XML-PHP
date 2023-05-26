<?php
  //URL da API
  $url="http://localhost/xml-php/Aula6/api/index.php";

  //A função curl_init() inicializa uma nova sessão
  $ch = curl_init();

  //Utiliza CURLOPT_RETURNTRANSFER PARA ESPERAR A RESPOSTA DA URL
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, $url);

  //Enviar a requisição
  curl_setopt($ch, CURLOPT_URL, $url);

  //Executar solicitação de curl
  $dados = curl_exec($ch);

  //Fechar a sessão CURL e liberar todos os recursos
  curl_close($ch);

  //echo $dados;

  //Transformar o conteúdo em XML em objeto
  $xml = simplexml_load_string($dados);

  //acessar o IF quando encontrar produto
  if(isset($xml->produto)){
    //Percorrer todos os registros da venda
    foreach ($xml->produto as $produto):
      //imprimir as informações do XML
      echo "Id do produto: ".$produto->id."<br>";
      echo "Produto: ".$produto->nome."<br>";

      echo "<hr>";
    endforeach;

  }if(isset($xml->erro)){
    //imprimir erro
    echo $dados;
  }


?>