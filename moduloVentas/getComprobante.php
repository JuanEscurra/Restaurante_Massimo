<?php
session_start();
if(isset($_POST['accion'])){

}else{
    $_POST['accion'] = "";
}



if (isset($_POST['btnEmitirComprobante'])) {
    include_once("controlComprobante.php");
    $nuevoControl = new controlComprobante;
    $nuevoControl->listarComandaPorEstado();
}elseif (isset($_POST['btnEmitir'])) {
    include_once("controlComprobante.php");
    $nuevoControl = new controlComprobante;
    $nuevoControl->detalleComanda($_POST['idComanda']);
} 
elseif (isset($_POST['btnInsertar'])) {
    
    var_dump($_POST);
    /*$nuevoControl->insertarComprobante($_POST['idComanda'],$_POST['opcComp'],$_POST['sr'],$_POST['nmr'],$_POST['nombre'],$_POST['dni'],$_POST['pago'],$_POST['dsct'],$_POST['vlt']);*/
} 
 else {
    include_once('../shared/formMensajeSistema.php');
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Se ha detectado un acceso no permitido", "<a href='../index.php'>Iniciar Sesion</a>");
}