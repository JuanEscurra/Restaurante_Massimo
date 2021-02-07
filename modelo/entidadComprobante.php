<?php 
    include_once("../modelo/conexion.php");
    class entidadComprobante extends Conexion{
        
        public function insertarComprobante($idcomanda,$tcomp,$serie,$numero,$moneda,$pago){
            $conexion = new Conexion;
            $idComanda = intval($idcomanda);
            $Pago = intval($pago);
            $queryComandas = "INSERT into boleta (tipocomprobante,serie,numero,idcomanda,pago,moneda,fecha) values('$tcomp','$serie','$numero',$idComanda,$Pago,'$moneda',CURDATE())";
            $resultado = mysqli_query($conexion->getConexion(),$queryComandas);
            $this->cerrarConexion();
            echo $queryComandas;
        }
        
    }
?>