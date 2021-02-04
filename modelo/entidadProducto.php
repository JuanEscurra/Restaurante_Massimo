<?php 
    include_once("conexion.php");
    class entidadProducto extends Conexion{
        public function listarProductosPorNombre($nombreProducto){
            $queryProductos = "SELECT * from producto where nombre LIKE '$nombreProducto%' AND estado= 1" ;
            $resultado = mysqli_query($this->getConexion(),$queryProductos);
            $this->cerrarConexion();
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;
        }

        public function buscarProductoPorId($idProducto) {
            $queryProducto = "SELECT * from producto where idproducto=$idProducto";
            $resultado = mysqli_query($this->getConexion(),$queryProducto);
            $this->cerrarConexion();
            $producto = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $producto;
        }
        
        public function listarProductosActivos() {
            $consulta = "SELECT * FROM producto WHERE estado = 1";
            $resultado = mysqli_query($this->getConexion(),$consulta);
            $productos = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $productos;
        } 

        /* ###### AND estado = 1*/
        public function listarProductosPorTipo($tipo){
            $consulta = "SELECT * FROM producto WHERE tipo = '$tipo'";
            var_dump($consulta);
            $resultado = mysqli_query($this->getConexion(),$consulta);
            $entradas = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $entradas;
        }

        /* ###### */
        public function listarProductos(){
            $consulta = "SELECT * FROM producto";
            $resultado = mysqli_query($this->getConexion(),$consulta);
            $productos = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $productos;
        }

        public function cambiarEstado($id,$estado){
            $consulta = "UPDATE producto SET estado=$estado WHERE idProducto = $id";
            $resultado = mysqli_query($this->getConexion(),$consulta);
            $this->cerrarConexion();
        }
        
    }
?>