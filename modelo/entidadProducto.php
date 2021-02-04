<?php 
    include_once("conexion.php");
    class entidadProducto extends Conexion{
        public function listarProductosPorNombre($nombreProducto){
            $queryProducto = "SELECT * from producto where nombre ='$nombreProducto' AND estado= 1";
            $conexion= new conexion;
            $resultado = mysqli_query($conexion->getConexion(),$queryProducto);
            $conexion->cerrarConexion();
            $producto = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            
             return $producto;
            
        }

        public function buscarProductoPorId($idProducto) {
            $queryProducto = "SELECT * from producto where idProducto =$idProducto";
            $conexion= new conexion;
            $resultado = mysqli_query($conexion->getConexion(),$queryProducto);
            $conexion->cerrarConexion();
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
            $queryProducto = "SELECT * from producto where estado = 1";
            $conexion= new conexion;
            $resultado = mysqli_query($conexion->getConexion(),$queryProducto);
            $conexion->cerrarConexion();
            $producto = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
             return $producto;
        }

        public function cambiarEstado($id,$estado){
            $consulta = "UPDATE producto SET estado=$estado WHERE idProducto = $id";
            $resultado = mysqli_query($this->getConexion(),$consulta);
            $this->cerrarConexion();
        }
        
    }
?>