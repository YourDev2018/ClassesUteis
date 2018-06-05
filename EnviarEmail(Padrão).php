<?php
require_once 'Seguranca.php';

$seg = new Seguranca();

$nome = $seg->filtro($_POST['nome']);
$tel =  $seg->filtro($_POST['telefone']);
$email =  $seg->filtro($_POST['email']);
$assunto =  $seg->filtro($_POST['assunto']);
$src =  $seg->filtro($_POST['texto']);

$seg->contTime('contato.html');

if ($nome == '' || $tel == '' || $email == '' || $assunto == '' || $src == '' ) {
  header('Location: contato.html');
  exit();
}


$assuntoE = "Contato pela Pagina YourDev";
$destino = "contato@yourdev.com.br";
$subject  = $assunto;
$from     = "contato@yourdev.com.br";
$to       = $destino;
$corpo = "<html><head><meta charset=UTF-8></head><body>Um novo formulário foi preenchido na página de Contato do Site <br> <br> Nome: $nome <br> Email: $email <br> Telefone: $tel <br> Assunto: $assunto <br><br> Mensagem: $src</body></html>";
$bcc      = null; // Esconder endereços de e-mails.
$cc       = null; // Qualquer destinatário pode ver os endereços de e-mail especificados nos camp


$headers  = sprintf( 'Date: %s%s', date( "D, d M Y H:i:s O" ), PHP_EOL );
$headers .= sprintf( 'Return-Path: %s%s', $from, PHP_EOL );
$headers .= sprintf( 'To: %s%s', $to, PHP_EOL );
$headers .= sprintf( 'Cc: %s%s', $cc, PHP_EOL );
$headers .= sprintf( 'Bcc: %s%s', $bcc, PHP_EOL );
$headers .= sprintf( 'From: %s%s', $from, PHP_EOL );
$headers .= sprintf( 'Reply-To: %s%s', $from, PHP_EOL );
$headers .= sprintf( 'Message-ID: <%s@%s>%s', md5( uniqid( rand( ), true ) ), $_SERVER[ 'HTTP_HOST' ], PHP_EOL );
$headers .= sprintf( 'X-Priority: %d%s', 3, PHP_EOL );
$headers .= sprintf( 'X-Mailer: PHP/%s%s', phpversion( ), PHP_EOL );
$headers .= sprintf( 'Disposition-Notification-To: %s%s', $from, PHP_EOL );
$headers .= sprintf( 'MIME-Version: 1.0%s', PHP_EOL );
$headers .= sprintf( 'Content-Transfer-Encoding: 8bit%s', PHP_EOL );
$headers .= sprintf( 'Content-Type: text/html; charset=UTF-8', PHP_EOL );


$enviaremail = mail($destino, $assuntoE, $corpo, $headers );

if($enviaremail)
{
  //echo $corpo;
  header('Location: contato.html');

} else {

  //  header('location: anuncio.php?id='.$idAnuncio.'&emailEnviado=true');
  header('Location: contato.html');
}
?>
