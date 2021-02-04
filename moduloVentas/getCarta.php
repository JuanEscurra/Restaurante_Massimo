<?php
include_once('controlActualizarCarta.php');

if(isset($_POST['bntActualizar']) or isset($_POST['btnRegresarEstado'])){
    $objCarta = new actualizarCarta;
    session_start();
    $objCarta->listarCarta($_SESSION["rol"]);
} elseif(isset($_POST['btnAActualizar'])){
    $objActualizar = new actualizarCarta;
    $objActualizar->listarProductos();
} elseif(isset($_POST['btnModificarProducto'])){
    $objActualizando = new actualizarCarta;
    $objActualizando->actualizandoEstados($_POST['idProducto'],$_POST['estado']);
} elseif(isset($_GET['tipoProducto'])) {
    $objActualizando = new actualizarCarta;
    $objActualizando->listarProductosPorTipo($_GET['tipoProducto']);
} else{
    include_once('../shared/formMensajeSistema.php');
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje -> formMensajeSistemaShow("Acceso no Permitido","<a href='../index.php'>Iniciar Sesion</a>");
}
?>