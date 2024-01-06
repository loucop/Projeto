<?php
   
   require_once( './vendor/autoload.php' );  

   require_once('./vendor/PHPGansta/GoogleAuthenticator.php');

   $autenticador = new PHPGangsta_GoogleAuthenticator();

   $codigo_secreto = $_POST["codigosecreto"];

   $codigo_verificador = $_POST["codigo"];

   $resultado = $autenticador->verifyCode( $codigo_secreto, $codigo_verificador, 0  );

   if ( $resultado ){
    echo    "CÓDIGO VALIDO";
      header('location:dashboard.php');
   }else{
    echo    "CÓDIGO INVALIDO";
   }
?>