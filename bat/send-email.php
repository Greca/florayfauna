<?php

$from_add = "redes@florafaunaycultura.org"; 

$to_add = "redes@florafaunaycultura.org";

if (isset($_POST['form-type'])) {
	switch ($_POST['form-type']){
		case 'contact':
			$subject = 'Nuevo mensaje desde FFCM';
			break;
		case 'subscribe':
			$subject = 'Suscribci&oacute;n para Newsletter FFCM';
			break;
		default:
			$subject = 'Nuevo mensaje desde FFCM';
			break;
	}
}else{
	die('MF004');
}

$headers = "From: $from_add \r\n";
$headers .= "Reply-To: $from_add \r\n";
$headers .= "Return-Path: $from_add\r\n";
$headers .= "BCC: raul@wheretogo.com.mx\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


$message    = ' '
            . ' Nombre: <strong>'.$_POST['name']. '</strong> <br />'
            . ' Telefono: <strong>'.$_POST['phone'] . '</strong> <br />'
            . ' Email: <strong>'.$_POST['email'] . '</strong> <br />'
            . ' Message: <strong>'.$_POST['message']. '</strong> '
        ;

//$message    = 'test ';
if (isset($_POST)) {
	if(mail($to_add,$subject,$message,$headers)) {
	    // echo 'Message could not be sent.';
	    // echo 'Mailer Error: ';
	    echo 'success';
	} else {
	    echo 'fail';
}
}