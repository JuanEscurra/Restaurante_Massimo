<?php

include_once('controladorReporte.php');
if(isset($_POST['btnEmitirReporte'])) {

    $controlador = new controladorReporte;
    $controlador->listarBoletas();
} else{
    include_once("../shared/formMensajeSistema.php");
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje -> formMensajeSistemaShow("Se ha detectado un acceso denegado","<a href='../index.php'>Iniciar Sesion</a>");

}