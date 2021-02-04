<?php
class controladorComprobantePago{

        public function ListarProformas($idrol){ 
            include_once("../modelo/entidadProforma.php");
            include_once("formListarProforma.php");
            $btn="";
            $ListaProforma = new Proforma;
            $objFormListarProforma = new formListarProforma;
            $lista = $ListaProforma ->listarProforma();
            $objFormListarProforma->formListarProformaShow($lista,$btn,$idrol);
        }
        public function ComPago($idProforma){ 
            
            include_once("../modelo/entidadProforma.php");
            include_once("../modelo/entidadProducto.php");
            include_once("../modelo/entidadDetalleProforma.php");
            include_once("formComprobantePago.php");
            $BuscarDetalleProforma = new DetalleProforma;
            $objFormComPago = new formComPago;
            $BuscarProforma = new Proforma;
            $Proforma = $BuscarProforma -> buscarProformaPorId($idProforma);
            $DetalleProforma = $BuscarDetalleProforma ->listarDetalleProforma($idProforma);
            $objFormComPago->formComPagoShow($DetalleProforma,$Proforma);
        }
        public function ListarProformasActualizada($idProforma){ 
            include_once("../modelo/entidadProforma.php");
            
            $UPProforma = new Proforma;
            $UP = $UPProforma ->actualizarProforma($idProforma);
            
            include_once("formListarProforma.php");
            $ListaProforma = new Proforma;
            $objFormListarProforma = new formListarProforma;
            $lista = $ListaProforma ->listarProforma();
            $objFormListarProforma->formListarProformaShow($lista);

    
            
        }

}





























/*
include_once('../modelo/entidadProforma.php');

function ejecutarAccion($accion = null) {
        
    switch($accion) {
        case 'buscarProforma':
            $idProforma = $_GET['idProforma'];
            $proforma = new Proforma;
            $datoProforma = $proforma->buscarProformaPorId($idProforma);

            include_once('generarPago.php');
            break;
        case 'insertarPago':
            
            $Pago = new Proforma;
            $Pago->actualizarProforma($_POST['idProforma']);
            
            include_once('getProforma.php');
            
            break;
    }
}

$accion = "";
if(isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
ejecutarAccion($accion);*/







?>