<?php
class controlComprobante
{   
    public function listarComandaPorEstado()
    {
        include_once("../modelo/entidadComprobante.php");
        $entidadComprobante = new entidadComprobante;
        $listaComandas= $entidadComprobante->listarComandaPorEstado("Atendido");
        include_once("../moduloVentas/formEmitirComprobante.php");
        $formEmitirComprobant = new formEmitirComprobante;
        $formEmitirComprobant->formEmitirComprobanteShow($listaComandas);

    }
    public function detalleComanda($idcomanda)
    {
        include_once("../modelo/entidadComprobante.php");
        $entidadComprobante = new entidadComprobante;
        var_dump($idcomanda);
        $listaComandas= $entidadComprobante->detalleComanda($idcomanda);
        include_once("../moduloVentas/formAgregarCliente.php");
        $formEmitirComprobant = new formAgregarCliente;
        $formEmitirComprobant->formAgregarClienteShow($listaComandas);

    }

}