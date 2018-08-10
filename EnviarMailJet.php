<?php
    
    class EnviarMailJet 
    {

        function __construct(){

            if ($_GET['send_mail_test'] != null || $_GET['send_mail_test'] != '' ) {
                $this->sendEmailTeste();
            }
        }

        public function sendEmailWithAttachments($fromName, $fromEmail,$toName,$toEmail, $subject,$textPart,$htmlPart){
        
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
                                            \"ContentType\": \"application/pdf\",
                                            \"Filename\": \"TermosDeUso.pdf\",
                                            \"Base64Content\": \"VGVybW9zRGVVc28=\"
                                    },
                                    {
                                            \"ContentType\": \"application/pdf\",
                                            \"Filename\": \"FCM-Pacote-EarlyStage.pdf\",
                                            \"Base64Content\": \"RkNNLVBhY290ZS1FYXJseVN0YWdl\"
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
                print $resposta;

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
