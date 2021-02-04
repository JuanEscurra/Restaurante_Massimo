<?php
include_once('../modelo/entidadProducto.php');
class actualizarCarta{
    public function listarCarta($idrol){
        include_once('formListarCarta.php');
        $objListarCarta = new entidadProducto;
        $objFormCarta = new formlistarCarta;
        $entradas = $objListarCarta->listarEntradas();
        $sopas = $objListarCarta->listarSopas();
        $segundos = $objListarCarta->listarSegundos();
        $bebidas = $objListarCarta->listarBebidas();
        $gaseosas = $objListarCarta->listarGaseosas();
        $objFormCarta->formListarCartaShow($entradas,$sopas,$segundos,$bebidas,$gaseosas,$idrol);
    }
    public function listarProductos(){
        include_once('formActualizandoCarta.php');
        $objProducto = new entidadProducto;
        $formActualizando = new formActualizarCarta;
        $productos = $objProducto->listarProductos();
        $formActualizando->formActualizandoCartaShow($productos);
    }
    public function actualizandoEstados($id, $estado){
        $entiActualizando = new entidadProducto;
        $entiActualizando->cambiarEstado($id,$estado);
        $this->listarProductos();

    }
    public function listarProductosPorTipo($tipo) {
        include_once('formActualizandoCarta.php');
        $objProducto = new entidadProducto;
        $formActualizando = new formActualizarCarta;

        $productos = $objProducto->listarProductosPorTipo($tipo);
        $formActualizando->formActualizandoCartaShow($productos);           
    }
}
?>