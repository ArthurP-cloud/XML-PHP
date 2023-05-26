<?php

//incluir arquivo de conexao

use function PHPSTORM_META\type;

include_once"./conexao.php";

//buscar no banco de dados os produtos
$sql = "SELECT id, nome FROM produtos";

//prepara a query
$result = $conn->prepare($sql);

//executa a query com PDO
$result ->execute();

//acessa IF quando encontrou produto no banco de dados
if(($result) && ($result->rowCount()!=0)){
  //criar cabeçalho para indicar tipo XML
  header('content-type: text/xml');

  //SimpleXMLElement função do PHP que retorna string XML
  $produtosXML = new SimpleXMLElement("<produtos></produtos>");

  //Ler os registros retornado do banco de dados
  while($row_produto = $result->fetch(PDO::FETCH_ASSOC)){

    //#extrair array de dados
    extract($row_produto);
  
    //Acrescentar nova tag no XML para colocar os dados do produto
    $produtoXML = $produtosXML->addChild("produto");

    //ADD tag no XML com os dados do produto
    /*sem extrair o array da variavel
    $produtoXML->addChild("id", $row_produto["id"]);
    */
    //#extraindo o array da variavel 
    $produtoXML->addChild("id", $id);
    $produtoXML->addChild("nome", $nome);

    //limpar o buffer de saida
    ob_clean();

    //imprimir XML
    echo $produtosXML->asXML();
  }

}else{
  echo "Nenhum produto encontrado.";
}
?>