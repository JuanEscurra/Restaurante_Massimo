<?php 
    include_once("../modelo/conexion.php");
    class entidadComprobante extends Conexion{
        
        public function insertarComprobante($idcomanda,$tcomp,$serie,$numero,$moneda,$pago){
            $idComanda = intval($idcomanda);
            $Pago = intval($pago);
            $queryComandas = "INSERT into boleta (tipocomprobante,serie,numero,idcomanda,pago,moneda) values('$tcomp','$serie','$numero',$idComanda,$Pago,'$moneda')";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;
        }
        
    }
?>