<?php

  //Incluir o arquivo de conexão a pagina
  include_once"./conexao.php";

  //buscar no banco de dados os produtos
  $sql = "SELECT id,nome FROM produtos";
  //prepara a QUERY
  $result = $conn->prepare($sql);
  //Executa a QUERY com PDO
  $result->execute();
  //acessa o IF quando encontrar produto no banco de dados
  if(($result) && ($result->rowCount()!=0)){
    //Criar cabeçalho para indicar tipo XML
    header("content-type: text/xml charset=utf-8");

    //SimpleXMLElemtn função do PHP que retorna string XML
    $produtosXML = new SimpleXMLElement("<produtos></produtos>");

    //ler registros retornados do banco de dados
    while($row_produto = $result->fetch(PDO::FETCH_ASSOC)){
      //var_dump($row_produto); 
      extract($row_produto);

      //Acrescentar a TAG filha para imprimir os dados dos produtos e as tags com os valores
      $produtoXML = $produtosXML->addChild('produto');
      $produtoXML->addChild('id', $id);
      $produtoXML->addChild('nome', $nome);

      
    }
      //imprimir o XML
      echo $produtosXML->asXML();
      
      //Pausar o processamento
      exit();
  }else{
    //criar a TAG filha de <erro></erro> com msg de erro
    $produtosXML->addChild('erro',"Erro: Nenhum produto encontrado");

    //Imprimir o XML
    echo $produtosXML->asXML();

    //Pausar o processamento
    exit();
    
  }


?>