<?php
include_once('../modelo/entidadBoleta.php');
class controladorReporte {

    public function listarBoletas() {

        $entidadBoleta = new entidadBoleta;
        $listaBoletas = $entidadBoleta->listarComandas($fecha = date('Y-m-d'));

        include_once('formEmitirReporte.php');
        $formEmitirReporte = new formEmitirReporte;
        $formEmitirReporte->formEmitirReporteShow($listaBoletas);
    }
}