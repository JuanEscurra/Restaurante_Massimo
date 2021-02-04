<?php
    class controlReembolso{
        public function listarDisponibles($idrol){
            include_once("../modelo/entidadCPago.php");
            $entidadCPago = new CPago;
            $listacPago = $entidadCPago -> listarComprobantes();
            include_once("../moduloVentas/listarComprobantes.php");
            $formComprobantes = new listarComprobantes;
            $formComprobantes -> listarComprobantesShow($listacPago,$idrol);
        }
        public function listarDetallesComprobante($id){
            include_once("../modelo/entidadCPago.php");
            $entidadCPago = new CPago;
            $listacPago = $entidadCPago->buscarDetalleporid($id);
            include_once("../moduloVentas/listaDetalleComprobante.php");
            $formComprobantes = new listaDetalleComprobante;
            $formComprobantes -> listaDetalleComprobanteShow($listacPago);
        }  

        public function AnularComprobante($id){
            include_once("../modelo/entidadCPago.php");
            $entidadCPago = new CPago;
            $resultado = $entidadCPago->cambiarEstadoporid($id);
            $this->listarDisponibles();
        }
        
        public function regresarDisponibles(){
           $this->listarDisponibles();
            
        }
        
        public function listarPorDNI($dni){
            include_once("../modelo/entidadCPago.php");
            $entidadCPago = new CPago;
            $listacPago = $entidadCPago -> buscarComprobanteDNI($dni);
            include_once("../moduloVentas/listarComprobantes.php");
            $formComprobantes = new listarComprobantes;
            $formComprobantes -> listarComprobantesShow($listacPago);
        }
    }
?>