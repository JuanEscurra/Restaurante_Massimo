<?php 
    include_once("../modelo/conexion.php");
    class entidadComanda extends Conexion{
        public function listarComandas(){
            $queryComandas = "SELECT* from comanda WHERE fecha = CURDATE() and estado = 'PorAtender'";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;
        }
        public function insertarComanda($numeroComanda,$numMesa, $cliente, $total) {
            $query = "INSERT INTO comanda (`numeroComanda`,`fecha`,`NumeroMesa`, `cliente`, `total`, `estado`) VALUES ('$numeroComanda',CURDATE(),$numMesa,'$cliente',$total,'PorAtender')";
            $resultado = mysqli_query($this->getConexion(),$query);
            $this->cerrarConexion();
            
        }
        public function obtenerIdMaxProforma(){
            $Conexion = new Conexion;
            $queryProforma = "SELECT MAX(idcomanda) AS idcomanda FROM comanda";
            $resultado = mysqli_query($Conexion->getConexion(),$queryProforma);
            $Conexion->cerrarConexion();
            $resultado = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            
            return $resultado;
         }
        public function verificarDatosComanda(){
            $queryComandas = "SELECT* from comanda WHERE fecha = CURDATE() and estado = 'activo'";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;
            
        }
        public function obtenerDatosComanda(){
            $queryComandas = "SELECT* from comanda WHERE fecha = CURDATE() and estado = 'PorAtender'";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;

        }
        public function buscarDetalleporid($idCom) {

            $queryComandas = "SELECT * from detalleComanda where idcomanda = $idCom";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultado = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            
            return $resultado;
        }
        public function buscarComandaPorid($idCom) {

            $queryComandas = "SELECT * from comanda where idcomanda = $idCom";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultado = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            
            return $resultado;
        }
        public function actualizarComanda($idcom,$total){
            $queryComandas = "UPDATE comanda set estado = 'Atendido', total =$total where idcomanda=$idcom";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
        }
        
        public function modificarEstadoComanda($idComanda,$estado) {
            $queryComandas = "UPDATE comanda set estado = '$estado' where idcomanda=$idComanda";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
        }public function actualizarComandaestado($idcom){
            $queryComandas = "UPDATE comanda set estado = 'eliminada' where idcomanda=$idcom";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
        }
    }
?>