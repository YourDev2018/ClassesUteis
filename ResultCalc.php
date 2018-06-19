<?php
    require_once 'Seguranca.php';
    new ResultCalc();
    

    class ResultCalc {

        const HOST = 'mysql427.umbler.com:41890';
        const DATA_BASE = 'yourdev';
        const USER = 'yourdev';
        const SENHA = 'YourDev2018';
        const URL = '';

        function __construct(){

             $seg = new Seguranca();  
             $idade = $seg->filtro($_REQUEST['idade']);
             $valor = $seg->filtro($_REQUEST['valor']);

             if ($idade < 30 && $idade > 64) {
                 return false;
             }else{

                $this->select($idade,$valor);

             }

             

        }

        public function connDB(){
             
            $conn = new  mysqli(ResultCalc::HOST,ResultCalc::USER,ResultCalc::SENHA,ResultCalc::DATA_BASE);

           
            if ($conn->connect_error){
                print $conn->connect_error;
                return $conn->connect_error;
            }else{
            
                return $conn;
            }
        }

        function closeDB($db){
            mysqli_close($db);
            return;
        }

        public function select($idade, $valor){

            
            $query = "SELECT * FROM planilha1 WHERE idade = $idade ";

            $db = $this->connDB();
            $result = $db->query($query);
            $cont =  mysqli_num_rows($result);

            if ($cont <=0 ) {

                return false;
            }else{
                if ($cont == 1) {

                    while ($row=$result->fetch_assoc()) {

                        $this->closeDB($db);
                        print $row[$valor];
                        //header('localtion: '.ResultCalc::URL);

                    }
                }
            }
        }
        
    }

?>