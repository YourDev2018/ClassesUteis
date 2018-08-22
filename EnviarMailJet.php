<?php
    new EnviarMailJet();
    class EnviarMailJet 
    {

        function __construct(){

      //      echo "Entrou em contrutor";

            if ($_GET['send_mail_test'] != null || $_GET['send_mail_test'] != '' ) {
                $this->sendEmailTeste();
            }
      //      echo "Base 64: ".$_FILES['base64']['size'];
     //       echo " To Email: ".$_REQUEST['to_email'];
     //       print_r(" String base 64: ".$_REQUEST['base64']);
     //       echo '<img src="data:image/jpeg;base64,' . $_REQUEST['base64'] . '" />';
            //if($_POST['send_mail_jet_post'] == "send_wdl"){

                $textPart = $_POST['text_part'];
                $htmlPart = $_POST['html_part'];
                $contentType = $_POST['content_type'];
               
                $textPart = "Teste de envio da logo";
                $htmlPart = $textPart;
                $contentType = "image/jpeg";

              ;
               // echo "Entrou em wdl";

                $this->sendEmailWithAttachments("We Do Logos", "morgado@yourdev.com.br",$_POST['to_email'],$_POST['to_email'], "Seu logo We Do Logos"
                                        ,$textPart,$htmlPart,$contentType,"Sua logo", str_replace("data:image/jpeg;base64,", "", $_POST['base64']));

           // }
        }

        public function sendEmailWithAttachments($fromName, $fromEmail,$toName,$toEmail, $subject,$textPart,$htmlPart,$contentType,$filename,$base64){
        
            $curl = curl_init();
            $url = "https://api.mailjet.com/v3.1/send";

            curl_setopt_array($curl,array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => 

                "{
                    \"Messages\":[
                            {
                                    \"From\": {
                                            \"Email\": \"$fromEmail\",
                                            \"Name\": \"$fromName\"
                                    },
                                    \"To\": [
                                            {
                                                    \"Email\": \"$toEmail\",
                                                    \"Name\": \"$toName\"
                                            }
                                    ],
                                    \"Subject\": \"$subject\",
                                    \"TextPart\": \"$textPart\",
                                    \"HTMLPart\": \"$htmlPart\",
                                    \"Attachments\": [
                                    {
                                            \"ContentType\": \"$contentType\",
                                            \"Filename\": \"SuaLogo.jpeg\",
                                            \"Base64Content\": \"$base64\"
                                    }

                                    ]

                                }
                    ]
                }",
                
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Basic ZjQ1NGZiNTQ5NDk3OGE0NTY5MmM1MGNiZjhhN2EyZGY6MzFiZmYzMDhmNGE1N2QwYzg4M2U5MjJlNTViNTlmYmQ=",
                    "Content-Type: application/json"
                )
                ));

                $resposta = curl_exec($curl);
             //   echo $resposta;
             //   return $resposta;

        }

        
        public function sendEmailTeste(){
            $curl = curl_init();
            $url = "https://api.mailjet.com/v3.1/send";

            curl_setopt_array($curl,array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => 

                '{
                    "Messages":[
                            {
                                    "From": {
                                            "Email": "morgado@yourdev.com.br",
                                            "Name": "Guilherme Morgado"
                                    },
                                    "To": [
                                            {
                                                    "Email": "morgado@yourdev.com.br",
                                                    "Name": "Morgado"
                                            }
                                    ],
                                
                                    "Subject": "Your email flight plan!",
                                    "TextPart": "Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
                                    "HTMLPart": "<h3>Dear passenger 1, welcome to Mailjet!</h3><br />May the delivery force be with you!",
                                    
                                    "Attachments": [
                                        {
                                                "ContentType": "application/pdf",
                                                "Filename": "TermosDeUso.pdf",
                                                "Base64Content": "VGVybW9zRGVVc28ucGRm"
                                        },
                                        {
                                                "ContentType": "application/pdf",
                                                "Filename": "FCM-Pacote-EarlyStage.pdf",
                                                "Base64Content": "RkNNLVBhY290ZS1FYXJseVN0YWdlLnBkZg=="
                                        }

                                    ]

                            }
                    ]
                }'
                ,
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Basic ZjQ1NGZiNTQ5NDk3OGE0NTY5MmM1MGNiZjhhN2EyZGY6MzFiZmYzMDhmNGE1N2QwYzg4M2U5MjJlNTViNTlmYmQ=",
                    "Content-Type: application/json"
                )
                ));

                $resposta = curl_exec($curl);
                print $resposta;
        }

        public function sendEmail($fromName, $fromEmail,$toName,$toEmail, $subject,$textPart,$htmlPart){
            
            $curl = curl_init();
            $url = "https://api.mailjet.com/v3.1/send";

            curl_setopt_array($curl,array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => 

                "{
                    \"Messages\":[
                            {
                                    \"From\": {
                                            \"Email\": \"$fromEmail\",
                                            \"Name\": \"$fromName\"
                                    },
                                    \"To\": [
                                            {
                                                    \"Email\": \"$toEmail\",
                                                    \"Name\": \"$toName\"
                                            }
                                    ],
                                    \"Subject\": \"$subject\",
                                    \"TextPart\": \"$textPart\",
                                    \"HTMLPart\": \"$htmlPart\"


                                }
                    ]
                }",
                
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Basic ZjQ1NGZiNTQ5NDk3OGE0NTY5MmM1MGNiZjhhN2EyZGY6MzFiZmYzMDhmNGE1N2QwYzg4M2U5MjJlNTViNTlmYmQ=",
                    "Content-Type: application/json"
                )
                ));

                $resposta = curl_exec($curl);
                return;
        }



        /*
    
       
/*
require 'C:\Users\MoorG\vendor\autoload.php/vendor/autoload.php';
use \Mailjet\Resources;
$mj = new Mailjet\Client(getenv('f454fb5494978a45692c50cbf8a7a2df'), getenv('31bff308f4a57d0c883e922e55b59fbd'),true,['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "morgado@yourdev.com.br",
                'Name' => "Morgado"
            ],
            'To' => [
                [
                    'Email' => "morg.guilherme@gmail.com",
                    'Name' => "Guilherme"
                ]
            ],
            'Subject' => "Your email flight plan!",
            'TextPart' => "Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
            'HTMLPart' => "<h3>Dear passenger 1, welcome to Mailjet!</h3><br />May the delivery force be with you!"
        ]
    ]
];
$response = $mj->post('morgado@yourdev.com.br', ['body' => $body]);
$response->success() && var_dump($response->getData());
         
*/
}
?>
