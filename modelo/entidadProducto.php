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
        
        public function listarEntradas(){
            $consulta = "SELECT idProducto, nombre FROM producto WHERE tipo = 'entrada' AND estado = 1";
            $resultado = mysqli_query($this->getConexion(),$consulta);
            $entradas = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $entradas;
        }                    
        public function listarSopas(){
            $consulta = "SELECT idProducto, nombre FROM producto WHERE tipo = 'sopa' AND estado = 1";
            $resultado = mysqli_query($this->getConexion(),$consulta);         
            $sopas = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $sopas;
        }      
        public function listarSegundos(){
            $consulta = "SELECT idProducto, nombre FROM producto WHERE tipo = 'segundo' AND estado = 1";
            $resultado = mysqli_query($this->getConexion(),$consulta);         
            $segundos = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $segundos;
        }      
        public function listarBebidas(){
            $consulta = "SELECT idProducto, nombre FROM producto WHERE tipo = 'bebida' AND estado = 1";
            $resultado = mysqli_query($this->getConexion(),$consulta);         
            $bebidas = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $bebidas;
        }      
        public function listarGaseosas(){
            $consulta = "SELECT idProducto, nombre FROM producto WHERE tipo = 'gaseosa' AND estado = 1";
            $resultado = mysqli_query($this->getConexion(),$consulta);         
            $gaseosas = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $gaseosas;
        } 

        /* ###### */
        public function listarProductosPorTipo($tipo){
            $consulta = "SELECT * FROM producto WHERE tipo = '$tipo'";
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