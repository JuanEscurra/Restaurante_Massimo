<?php
class controlEmitirProforma
{
    public function listarProformaPorEstado($btn)
    {
        include_once("../modelo/entidadProforma.php");
        $entidadProforma = new Proforma;
        $listarProforma = $entidadProforma->listarProforma();
        include_once("../moduloVentas/formListarProforma.php");
        $formListarProforma = new formListarProforma;
        $formListarProforma->formListarProformaShow($listarProforma,$btn);
    }

    public function BuscarProducto($nombreProducto)
    {
        include_once("../modelo/entidadProducto.php");
        $entidadProducto = new entidadProducto;
        $listaProductos = $entidadProducto->listarProductosPorNombre($nombreProducto);
        include_once("../moduloVentas/formAgregarProductoProforma.php");
        $formulario = new formAgregarProducto;
        $formulario->formAgregarProductoProformaShow($listaProductos);
    }

    public function  ModificarComanda($idComanda)
    {
        include_once("../modelo/entidadComanda.php");
        include_once("../modelo/entidadProducto.php");
        include_once("../modelo/entidadDetalleComanda.php");
        $entidadComanda = new entidadComanda;
        $entidadDetalleComanda = new entidadDetalleComanda;
        $listarDetalleComanda = $entidadDetalleComanda -> listarDetalleComanda($idComanda);
        $listaComandas = $entidadComanda->buscarComandaPorid($idComanda);

        include_once("../moduloVentas/formAgregarComanda.php");
        $formulario = new formAgregarComanda;
        $formulario->formModificarComandaShow($listarDetalleComanda, $listaComandas);
    }
    public function CrearProforma($fechaEmision,$fechaEntrega, $nombre,$apellido,$dni, $arrayProductos = [])
    {
        include_once('../modelo/entidadProforma.php');
        include_once('../modelo/entidadDetalleProforma.php');

     
        $cantidadTotal = 0;

        foreach ($arrayProductos as $producto) {
            $cantidadTotal = $cantidadTotal + $producto['precio'] * $producto['cantidad'];
        }

        return $cantidadTotal;
        $Proforma = new Proforma;

        $comanda->insertarProforma($fechaEmision,$fechaEntrega, $nombre,$apellido,$dni, $cantidadTotal);

        

        $detalleProforma = new entidadDetalleProfoma;
        $detalleproforma->insertarDetalleProforma(1, $arrayProductos);
        unset($_SESSION['listaProductos']);
        $btn="Emitir Proforma";
        $this->listarProformaPorEstado($btn);
    }
    public function calcularTotal($arrayProductos = [])
    {
        $cantidadTotal = 0;

        foreach ($arrayProductos as $producto) {
            $cantidadTotal = $cantidadTotal + $producto['precio'] * $producto['cantidad'];
        }

        return $cantidadTotal;
    }
    // public function EliminarProducto($filaProducto){
    //     array_splice($entrada, $filaProducto);
    //     $this -> AgregarComanda();
    // }
    public function AgregarProforma(){
        include_once("../moduloVentas/formAgregarProforma.php");
        date_default_timezone_set('America/Lima');
        $fechaEmision=date("Y-m-d");
        $formulario = new formAgregarProforma;
        $formulario->formAgregarProformaShow($fechaEmision);

    }
}
