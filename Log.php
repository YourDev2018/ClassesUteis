<?php
class Log 
{

    public function connDB(){
        
            $conn = new  mysqli("mysql472.umbler.com:41890","yourdevlocou","YourDev2018","locou");
            //$conn = new  mysqli("mysql472.umbler.com:41890","yourdevlocou","YourDev2018","locou_h");
        
            if ($conn->connect_erro){
            print $conn->connect_erro;
            return $conn->connect_erro;
        }else{
            return $conn;
        }
        
    }

    public function closeDB($db){
        mysqli_close($db);
        return;
    }

    public function insertLog($db,$projeto,$origem,$data,$conteudo)
    {
        $sql = "INSERT INTO YourDevLogs(projeto,origem,dataLog,conteudo) VALUES ('$projeto','$origem','$data','$conteudo')";
        if ($db->query($sql)===true) {
            
            return true;
        }else{
            return false;
        }
    }

}



?>