<?php 
include_once("../modelo/entidadComprobante.php");
include_once("../modelo/entidadComanda.php");
include_once("../modelo/entidadDetalleComanda.php");
include_once("../modelo/entidadProducto.php");//1
class controlComprobante
{   
    public function listarComandaPorEstado()
    {
        //1
        $entidadComprobante = new entidadComanda;
        $listaComandas= $entidadComprobante->listarComandaPorEstado();
        include_once("../moduloVentas/formEmitirComprobante.php");
        $formEmitirComprobant = new formEmitirComprobante;
        $formEmitirComprobant->formEmitirComprobanteShow($listaComandas);

    }
    public function detalleComanda($idcomanda)
    {
        
        $entidadComanda = new entidadComanda;
        $entidadDetalleComanda = new entidadDetalleComanda;
        $listarDetalleComanda = $entidadDetalleComanda -> listarDetalleComanda($idcomanda);
        $listacomanda = $entidadComanda->buscarComandaPorid($idcomanda);
        include_once("../moduloVentas/formAgregarCliente.php");
        $formEmitirComprobant = new formAgregarCliente;
        $formEmitirComprobant->formAgregarClienteShow($listarDetalleComanda,$listacomanda);

    }   
    public function insertarComprobante($idcomanda,$tcomp,$serie,$numero,$moneda,$pago)
    {   
        include_once("../modelo/entidadComprobante.php");
        include_once("../modelo/entidadComanda.php");
        $entidadComprobante = new entidadComprobante;
        $entidadComanda = new entidadComanda;
        $datoModificado = $entidadComanda->actualizarComandaPagado($idcomanda);
        $listaComandas= $entidadComprobante->insertarComprobante($idcomanda,$tcomp,$serie,$numero,$moneda,$pago);
        $this->listarComandaPorEstado();

    }

}