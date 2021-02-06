<?php 
    include_once("../modelo/conexion.php");
    class entidadComprobante extends Conexion{
        public function listarComandaPorEstado($estado){
            $queryComandas = "SELECT * from comanda where estado = '$estado'";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;
        }
        public function detalleComanda($id){
            $queryComandas = "SELECT d.cantidad, p.nombre,p.precio,(p.precio*d.cantidad) AS valor from detallecomanda d,producto p where d.idcomanda = $id and d.idProducto = p.idproducto";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;
        }

    }
?>