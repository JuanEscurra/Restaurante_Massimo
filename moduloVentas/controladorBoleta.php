<?php
include_once('../modelo/entidadComanda.php');
include_once('../modelo/entidadCuenta.php');
include_once('../modelo/entidadBoleta.php');

class controladorBoleta {

    public function listarComandas($idrol) {
        $comandas = new entidadComanda;
        $listaComandas = $comandas->listarComandaPorEstado("Atendido");

        require_once('listaCuentas.php');
        $vistaListaCuentas = new listaCuentas;
        $vistaListaCuentas->listaCuentasShow($listaComandas,$idrol);
    }

    public function generarBoleta($idComanda,$importe) {
        include_once('generarBoleta.php');
        $vistaGenerarBoleta = new generarBoleta;
        $vistaGenerarBoleta->generarBoletaShow($idComanda,$importe);
    }

    public function insertarBoleta($idComanda,$importe,$pago,$vuelto) {
        $boleta = new Boleta;
        $boleta->insertarBoleta($idComanda,$importe,$pago,$vuelto);
        session_start();
        $this->listarComandas($_SESSION["rol"]);
    }
}