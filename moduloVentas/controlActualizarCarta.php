<?php
include_once('../modelo/entidadProducto.php');
class actualizarCarta{
    public function listarCarta(){
        include_once('formListarCarta.php');
        $objProducto = new entidadProducto;
        $objFormCarta = new formlistarCarta;

        $productos = $objProducto->listarProductosActivos();
        $objFormCarta->formListarCartaShow($productos);
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

    public function insertarProducto($nombre, $tipo, $precio) {
        $objProducto = new entidadProducto;
        $objProducto->insertarProducto($nombre,$tipo,$precio);
        
        $this->listarProductos();
    }
}
?>