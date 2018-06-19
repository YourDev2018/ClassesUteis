<?php
require_once ("PHPMailer/src/PHPMailer.php"); 
class EnviarEmail 
{
    
    public function enviar($nameFrom,$emailFrom,$assunto,$destino,$nameDestino,$textoCorpo,$anexo,$nameAnexo){

    // https://www.devmedia.com.br/php-envio-de-e-mail-autenticado-utilizando-o-phpmailer/38380

        $Email = new PHPMailer\PHPMailer\PHPMailer(); 
        $Email->SetLanguage("br");
        $Email->IsMail();
        $Email->IsHTML(true);
        $Email->CharSet = "UTF-8";  
        $Email->From = $emailFrom;
        $Email->FromName = $nameFrom;
        $Email->AddAddress($destino,$nameDestino);
        $Email->Subject = $assunto;
        $Email->Body = "<html><head><meta charset=UTF-8></head><body> $textoCorpo </body></html>";
        
        if ($anexo != '') {
            $Email->addAttachment($anexo,$nameAnexo);
        }
        
        if(!$Email->Send()) {
            return false;
        } else {
            return true;
        }

        
    }

}


?>