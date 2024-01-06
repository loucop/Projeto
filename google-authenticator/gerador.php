<?php

    require_once( './vendor/autoload.php' );  

    require_once('./vendor/PHPGansta/GoogleAuthenticator.php');

    $autenticador = new PHPGangsta_GoogleAuthenticator();

    $codigo_secreto = $autenticador->createSecret();

    $website = "http://127.0.0.1/Projeto/google-authenticator";
    $titulo = "GoogleAuthenticador";
    $url_qr_code = $autenticador->getQRCodeGoogleUrl( $titulo, $codigo_secreto, $website);

    echo "<img src ='".$url_qr_code."' /> \n";

?>