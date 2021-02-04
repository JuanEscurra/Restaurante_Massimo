<?php
class controlComanda
{
    public function listarComandaPorEstado()
    {
        include_once("../modelo/entidadComanda.php");
        $entidadComanda = new entidadComanda;
        $listaComandas = $entidadComanda->listarComandaPorEstado("PorAtender");
        include_once("../moduloVentas/formEmitirComanda.php");
        $formEmitirComandar = new formEmitirComanda;
        $formEmitirComandar->formEmitirComandaShow($listaComandas);
    }

    public function BuscarProducto($nombreProducto)
    {
        include_once("../modelo/entidadProducto.php");
        $entidadProducto = new entidadProducto;
        $listaProductos = $entidadProducto->listarProductosPorNombre($nombreProducto);
        include_once("../moduloVentas/formAgregarProducto.php");
        $formulario = new formAgregarProducto;
        $formulario->formAgregarProductoShow($listaProductos);
    }

    public function  detalleComanda($idComanda)
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
        $formulario->formDetalleComandaShow($listarDetalleComanda, $listaComandas);
    }
    public function CrearComanda($numeroComanda,$NumeroMesa, $cliente, $arrayProductos = [])
    {
        include_once('../modelo/entidadComanda.php');
        include_once('../modelo/entidadDetalleComanda.php');

        $comanda = new entidadComanda;
        $comanda->insertarComanda($numeroComanda,$NumeroMesa, $cliente, $this->calcularTotal($arrayProductos));

        $idMax = $comanda->obtenerIdMaxProforma();

        $detalleComanda = new entidadDetalleComanda;
        $detalleComanda->insertarDetalleComanda($idMax[0]["idcomanda"], $arrayProductos);
        unset($_SESSION['listaProductos']);

        $this->listarComandaPorEstado();
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
    public function AgregarComanda(){
        include_once("../moduloVentas/formAgregarComanda.php");
        $formulario = new formAgregarComanda;
        $formulario->formAgregarComandaShow();
    }/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////////////////////////////////////
    public function  EliminarComanda($idComanda)
    {
        include_once("../modelo/entidadDetalleComanda.php");
        include_once("../modelo/entidadComanda.php");
       
        $entidadComanda = new entidadComanda;
       
        $EliminarComanda = $entidadComanda -> actualizarComandaestado($idComanda);



        include_once("../modelo/entidadComanda.php");
        $entidadComanda = new entidadComanda;
        $listaComandas = $entidadComanda->listarComandaPorEstado("PorAtender");
        include_once("../moduloVentas/formEmitirComanda.php");
        $formEmitirComandar = new formEmitirComanda;
        $formEmitirComandar->formEmitirComandaShow($listaComandas);
    }

}