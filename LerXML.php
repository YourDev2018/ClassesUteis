
<?php


    //pegue o arquivo
    $xml = simplexml_load_file('18587-nfe.xml');
    //coloque o caminho
    $xml = $xml -> NFe -> infNFe;

    // coloque o ultimo nó no foreach, para pegar o conteudo dele

     foreach($xml -> ide as $item){ 
         //faz o loop nas tag com o nome "item"
        //exibe o valor das tags que estão dentro da tag "item"
        var_dump($item -> cUF);
     }

?>
