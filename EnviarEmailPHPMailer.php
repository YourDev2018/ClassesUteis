<?php
require_once ("PHPMailer/src/PHPMailer.php"); 

// https://www.devmedia.com.br/php-envio-de-e-mail-autenticado-utilizando-o-phpmailer/38380

$Email = new PHPMailer\PHPMailer\PHPMailer(); 
$Email->SetLanguage("br");
$Email->IsMail();
$Email->IsHTML(true);
$Email->CharSet = "UTF-8";  
$Email->From = "morgado@yourdev.com.br";
$Email->FromName = "YourDev";
$Email->AddAddress("morg.guilherme@gmail.com", "Guilherme Morgado");
$Email->Subject = "Resposta not-reply recrutamentos";
$Email->Body = "<html><head><meta charset=UTF-8></head><body> Olá Gabriel, Boa tarde. Estamos enviando para informar que vc foi aprovado no processo seletivo </body></html>";           
$Email->addAttachment('18587-nfe.xml','Nota fiscal');


if(!$Email->Send()) {
  return false;
} else {
  return true;
}

?>