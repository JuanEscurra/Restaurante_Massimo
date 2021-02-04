<?php
class controlComanda
{   public function AgregarComanda(){
        include_once("../modelo/entidadProducto.php");
        include_once("../moduloVentas/formAgregarComanda.php");
        $producto= new entidadProducto;
        $formulario = new formAgregarComanda;
        $listaProductos =$producto->listarProductos();
        $formulario->formAgregarComandaShow($listaProductos);
    }
    public function listarComandaPorEstado()
    {
        include_once("../modelo/entidadComanda.php");
        $entidadComanda = new entidadComanda;
        $listaComandas = $entidadComanda->listarComandaPorEstado("PorAtender");
        include_once("../moduloVentas/formEmitirComanda.php");
        $formEmitirComandar = new formEmitirComanda;
        $formEmitirComandar->formEmitirComandaShow($listaComandas);
    }public function buscarStock($id)
    {
        include_once("../modelo/entidadProducto.php");
        include_once("../moduloVentas/formAgregarComanda.php");
        $producto= new entidadProducto;
        $formulario = new formAgregarComanda;
        $listaProductos =$producto->listarProductos();
        
        //////////////////
        
        $Prod = $producto->buscarProductoPorId($id);
        
        $_SESSION['stock'] =$Prod[0]['stock'];
       
        $_SESSION['nombre'] =$Prod[0]['nombre'];
        $formulario->formAgregarComandaShow($listaProductos);
    }

    public function ARGProducto($nombreProducto,$cantidadProducto)
    {   
        include_once("../modelo/entidadProducto.php");
        include_once("../moduloVentas/formAgregarComanda.php");
        $producto= new entidadProducto;
        $formulario = new formAgregarComanda;
        $listaProducto =$producto->listarProductos();
        
        $Prod=$producto->listarProductosPorNombre($nombreProducto);
                
        $_SESSION['stock'] =$Prod[0]['stock'];
       
        $_SESSION['nombre'] =$Prod[0]['nombre'];
        
        
        $arrayproductos = array("idProducto" => $Prod[0]['idProducto'], "nombre" => $Prod[0]['nombre'], "cantidad" => $cantidadProducto, "precio"=> $Prod[0]['precio']);
        if (empty($_SESSION["listaProductos"])) {
        $i = 0;
        $_SESSION["listaProductos"][$i] = $arrayproductos;
        } else {
        $i = count($_SESSION["listaProductos"]);
        $i++;
        $_SESSION["listaProductos"][$i] = $arrayproductos;
        }
        $formulario->formAgregarComandaShow($listaProducto);
        
       
       
        
    }
    public function  detalleComanda($idComanda)
    {
        include_once("../modelo/entidadComanda.php");
        include_once("../modelo/entidadProducto.php");
        include_once("../modelo/entidadDetalleComanda.php");
        $entidadComanda = new entidadComanda;
        $entidadDetalleComanda = new entidadDetalleComanda;
        $listarDetalleComanda = $entidadDetalleComanda -> listarDetalleComanda($idComanda);
        $listaComandas = $entidadComanda->buscarComandaPorid($idComanda);

        include_once("../moduloVentas/formAgregarComanda.php");
        $formulario = new formAgregarComanda;
        $formulario->formDetalleComandaShow($listarDetalleComanda, $listaComandas);
    }
    public function CrearComanda($numeroComanda,$NumeroMesa, $cliente, $arrayProductos = [])
    {
        include_once('../modelo/entidadComanda.php');
        include_once('../modelo/entidadDetalleComanda.php');

        $comanda = new entidadComanda;
        $comanda->insertarComanda($numeroComanda,$NumeroMesa, $cliente, $this->calcularTotal($arrayProductos));

        $idMax = $comanda->obtenerIdMaxProforma();

        $detalleComanda = new entidadDetalleComanda;
        $detalleComanda->insertarDetalleComanda($idMax[0]["idcomanda"], $arrayProductos);
        unset($_SESSION['listaProductos']);

        $this->listarComandaPorEstado();
    }
    public function calcularTotal($arrayProductos = [])
    {
        $cantidadTotal = 0;

        foreach ($arrayProductos as $producto) {
            $cantidadTotal = $cantidadTotal + $producto['precio'] * $producto['cantidad'];
        }

        return $cantidadTotal;
    }
    // public function EliminarProducto($filaProducto){
    //     array_splice($entrada, $filaProducto);
    //     $this -> AgregarComanda();
    // }
    /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////////////////////////////////////
    public function  EliminarComanda($idComanda)
    {
        include_once("../modelo/entidadDetalleComanda.php");
        include_once("../modelo/entidadComanda.php");
       
        $entidadComanda = new entidadComanda;
       
        $EliminarComanda = $entidadComanda -> actualizarComandaestado($idComanda);



        include_once("../modelo/entidadComanda.php");
        $entidadComanda = new entidadComanda;
        $listaComandas = $entidadComanda->listarComandaPorEstado("PorAtender");
        include_once("../moduloVentas/formEmitirComanda.php");
        $formEmitirComandar = new formEmitirComanda;
        $formEmitirComandar->formEmitirComandaShow($listaComandas);
    }

}