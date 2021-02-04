<?php

include_once("conexion.php");
include_once("entidadComanda.php");
class Boleta extends Conexion{

    public function insertarBoleta($idComanda,$importe,$pago,$vuelto) {
        $query = "INSERT INTO boleta (`idcomanda`,`importe`, `pago`,`vuelto`) VALUES ($idComanda,$importe,$pago,$vuelto)";
        $resultado = mysqli_query($this->getConexion(),$query);
        
        $entidadComanda = new entidadComanda;
        $entidadComanda->modificarEstadoComanda($idComanda,'Pagado');
        $this->cerrarConexion();
    }

}