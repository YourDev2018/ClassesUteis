<?php

class Archive 
{

    public function write($conteudo,$arquivo){

        $conteudo = "$conteudo";
        if (!$abrir = fopen($arquivo, "w")) { 
            echo "Erro abrindo arquivo ($arquivo)"; 
            exit; 
        }else {
        //ESCREVE NO ARQUIVO TXT 
            if (!fwrite($abrir, $conteudo)) { 
                print "Erro escrevendo no arquivo ($arquivo)"; 
                exit; 
            }else{
              //  echo "Arquivo gravado com Sucesso !!<p></p>";
                fclose($abrir);  
            } 
        }
    }
    
    public function read($arquivo){

        if (!$abrir = fopen($arquivo, "r")) { 
            echo "Erro abrindo arquivo ($arquivo)"; 
            exit; 
        }else{
            $result = "";
            while(!feof($abrir)){
                $linha = fgets($abrir,1024);
                $result = $result."$linha";
                echo $linha.'<br />';
            }
            
            fclose($abrir);
            return $result;
        }
    }

    public function readOld($arquivo){

        if (!$abrir = fopen($arquivo, "r")) { 
            echo "Erro abrindo arquivo ($arquivo)"; 
            exit; 
        }else{
            $result = "";
            while(!feof($abrir)){
                $linha = fgets($abrir,1024);
                $result = $result."$linha";
               // echo $linha.'<br />';
            }
            
            fclose($abrir);
            return $result;
        }
    }


    public function readAndWrite($conteudo,$arquivo){

        print $conteudoOld = $this->readOld($arquivo);
        $aux = date("Y/m/d H:i:s");
        $novo = "$conteudoOld \r\n $aux $conteudo";
        $this->write($novo,$arquivo);

    }
}


?>