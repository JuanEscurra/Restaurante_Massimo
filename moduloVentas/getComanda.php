<?php
session_start();
if(isset($_POST['accion'])){

}else{
    $_POST['accion'] = "";
}



if (isset($_POST['btnEmitirComanda'])) {
    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    $nuevoControl->listarComandaPorEstado();
} elseif (isset($_POST['btnAgregarComanda'])) {
    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    $nuevoControl->AgregarComanda();
} /////////////bien

elseif (isset($_POST['btnARGProducto'])) {
    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    
    $nuevoControl->ARGProducto($_POST['idProducto'],$_POST['CantidadProducto']);




} 
elseif (isset($_POST['btnARGSProducto'])) {
    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    
    $nuevoControl->ARGSProducto($_POST['idProductoA'],$_POST['CantidadProducto'],$_POST['idComanda']);


}
elseif (isset($_POST['btnCrearComanda'])) {
    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    $nuevoControl->CrearComanda($_POST['NumeroComanda'],$_POST['NumeroMesa'], $_POST['cliente'], $_SESSION['listaProductos']);
    

} elseif (isset($_POST['EliminarProducto'])) {

    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    $nuevoControl->EliminarDetalleComanda($_POST['idDetCom'],$_POST['idComa']);
}   
  elseif (isset($_POST['btnEliminarProducto'])) {
    $filaProductos = $_POST['filaProductos'];
    array_splice($_SESSION['listaProductos'], $filaProductos,1);
    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    $nuevoControl->AgregarComanda();
}elseif (isset($_POST['idProducto'])) {
    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    $nuevoControl->buscarStock($_POST['idProducto']);
}elseif (isset($_POST['idProductoA'])) {
    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    $nuevoControl->buscarStockA($_POST['idProductoA'],$_POST['idComanda']);
}/*
elseif (isset($_POST['btnAgregarProducto'])) {
    $productos = array("idProducto" => $_POST['idProducto'], "cantidad" => $_POST['cantidadProducto'], "precio"=> $_POST['precio']);
    if (empty($_SESSION["listaProductos"])) {
        $i = 0;
        $_SESSION["listaProductos"][$i] = $productos;
    } else {
        $i = count($_SESSION["listaProductos"]);
        $i++;
        $_SESSION["listaProductos"][$i] = $productos;
    }
    include_once("../moduloVentas/formAgregarComanda.php");
    $formulario = new formAgregarComanda;
    $formulario->formAgregarComandaShow();

}*/ elseif (isset($_POST['btnModificarComanda'])) {/////////////////////////////////////////////////////////////////////////////////////////////
    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    $nuevoControl->detalleComanda($_POST['idComanda']);
} 
elseif (isset($_POST['btnEliminarComanda'])) {
    include_once("controlComanda.php");
    $idComanda=$_POST['idComanda'];
    $nuevoControl = new controlComanda;
    $nuevoControl->EliminarComanda($idComanda);
    }

/*elseif (isset($_POST['btnAgregarComandaActualizada'])) {
    $nombreProducto=$_POST[''];
    include_once("controlComanda.php");
    $nuevoControl = new controlComanda;
    $nuevoControl->BuscarProducto($nombreProducto);
    
}*/
 else {
    include_once('../shared/formMensajeSistema.php');
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Se ha detectado un acceso no permitido", "<a href='../index.php'>Iniciar Sesion</a>");
}
