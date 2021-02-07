<?php

include_once("conexion.php");
include_once("entidadComanda.php");
class entidadBoleta extends Conexion{

    public function insertarBoleta($idComanda,$importe,$pago,$vuelto) {
        $query = "INSERT INTO boleta (`idcomanda`,`importe`, `pago`,`vuelto`) VALUES ($idComanda,$importe,$pago,$vuelto)";
        $resultado = mysqli_query($this->getConexion(),$query);
        
        $entidadComanda = new entidadComanda;
        $entidadComanda->modificarEstadoComanda($idComanda,'Pagado');
        $this->cerrarConexion();
    }

    public function listarComandas($fecha){
        $queryComandas = "SELECT* from boleta WHERE fecha = $fecha";
        $resultado = mysqli_query($this->getConexion(),$queryComandas);
        $this->cerrarConexion();
        $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        var_dump($queryComandas);
        return $resultados;
    }

}