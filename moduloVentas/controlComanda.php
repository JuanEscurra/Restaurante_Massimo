<?php
include_once("../modelo/entidadComanda.php");//1
include_once("../modelo/entidadProducto.php");//2
include_once("../modelo/entidadDetalleComanda.php");//3

include_once("../moduloVentas/formEmitirComanda.php");//4
include_once("../moduloVentas/formAgregarComanda.php");//5
include_once("../moduloVentas/formDetalleComanda.php");//6

class controlComanda
{   
    public function listarComandas()
    {
        //1//4
        $entidadComanda = new entidadComanda;
        $formEmitirComandar = new formEmitirComanda;
        $listarComandas = $entidadComanda->listarComandas();
        //se envia un array con todas las comandas que estan por ateneder =>$listarComandas
        $formEmitirComandar->formEmitirComandaShow($listarComandas);
    }

   public function AgregarComanda(){
        //2//5
        $producto= new entidadProducto;
        $formulario = new formAgregarComanda;
        //listo los profuctos activos en un array $listaProductos
        $listaProductos =$producto->listarProductosActivos();
        $formulario->formAgregarComandaShow($listaProductos);
    }
    public function buscarStock($idProducto){
        //2//5
        $producto= new entidadProducto;
        $formulario = new formAgregarComanda;
        $listaProductos =$producto->listarProductosActivos();
        //se guarda los campos del producto seleccionado $Producto
        $Producto = $producto->buscarProductoPorId($idProducto);
        $_SESSION['stock'] =$Producto[0]['stock'];
        $_SESSION['nombre'] =$Producto[0]['nombre'];
        $formulario->formAgregarComandaShow($listaProductos);
    }
    public function buscarStockActualizado($id,$idComanda){   
        //1//2//3//6
        $producto= new entidadProducto;
        $entidadComanda = new entidadComanda;
        $entidadDetalleComanda = new entidadDetalleComanda;
        $formulario = new formDetalleComanda;
        $listaProductos =$producto->listarProductosActivos();
        $listarDetalleComanda = $entidadDetalleComanda -> listarDetalleComanda($idComanda);
        $listaComandas = $entidadComanda->buscarComandaPorid($idComanda);
        $Producto = $producto->buscarProductoPorId($id);
        $_SESSION['stock'] =$Producto[0]['stock'];
        $_SESSION['nombre'] =$Producto[0]['nombre'];
        $formulario->formDetalleComandaShow($listarDetalleComanda, $listaComandas,$listaProductos);
    }
    public function AgregarProductoComanda($nombreProducto,$cantidadProducto){   
        //2//5
        $producto= new entidadProducto;
        $formulario = new formAgregarComanda;
        $listaProducto =$producto->listarProductosActivos();
        $Producto=$producto->listarProductosPorNombre($nombreProducto);     
        $_SESSION['stock'] =$Producto[0]['stock'];
        $_SESSION['nombre'] =$Producto[0]['nombre'];
        $arrayproductos = array("idProducto" => $Producto[0]['idProducto'], "tipo" => $Producto[0]['tipo'], 
                                "nombre" => $Producto[0]['nombre'], "cantidad" => $cantidadProducto,
                                "precio"=> $Producto[0]['precio']);
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
    public function CrearComanda($numeroComanda,$NumeroMesa, $cliente, $arrayProductos = []){
        //1//3
        $comanda = new entidadComanda;
        $detalleComanda = new entidadDetalleComanda;
        $comanda->insertarComanda($numeroComanda,$NumeroMesa, $cliente, $this->calcularTotal($arrayProductos));
        $idMax = $comanda->obtenerIdMaxProforma();
        $detalleComanda->insertarDetalleComanda($idMax[0]["idcomanda"], $arrayProductos);
        unset($_SESSION['listaProductos']);
        $this->listarComandas();
    }
    public function  detalleComanda($idComanda){
        //1//2//3//5//6
        $entidadComanda = new entidadComanda;
        $entidadProducto = new entidadProducto;
        $entidadDetalleComanda = new entidadDetalleComanda;
        $formulario = new formDetalleComanda;
        $listarDetalleComanda = $entidadDetalleComanda -> listarDetalleComanda($idComanda);
        $listaComandas = $entidadComanda->buscarComandaPorid($idComanda);
        $lista =$entidadProducto->listarProductosActivos();
        $formulario->formDetalleComandaShow($listarDetalleComanda, $listaComandas,$lista);
    }
    public function AgregarProductoModificado($nombreProducto,$cantidadProducto,$idComanda)
    {   
        //1//2//3//6
        $producto= new entidadProducto;
        $detalleComanda= new entidadDetalleComanda;
        $entidadComanda=new entidadComanda;
        $formulario = new formDetalleComanda;
        $Prod=$producto->listarProductosPorNombre($nombreProducto);
        $detalleComanda->insertarDetalleComandaA($idComanda,$Prod[0]['idProducto'],$cantidadProducto);
        $listarDetalleComanda=$detalleComanda-> listarDetalleComanda($idComanda);
        $listaComandas = $entidadComanda->buscarComandaPorid($idComanda);
        $listaProducto =$producto->listarProductosActivos();
        $formulario->formDetalleComandaShow($listarDetalleComanda, $listaComandas,$listaProducto);
                
    }
    public function calcularTotal($arrayProductos = []){
        $cantidadTotal = 0;

        foreach ($arrayProductos as $producto) {
            $cantidadTotal = $cantidadTotal + $producto['precio'] * $producto['cantidad'];
        }

        return $cantidadTotal;
    }
    public function  EliminarProductoModificado($idDetalleComanda,$idComanda){
        //1//2//3//6
        $entidadComanda=new entidadComanda;
        $entidadProducto=new entidadProducto;
        $detalleComanda= new entidadDetalleComanda;
        $formulario=new formDetalleComanda;
        $detalleComanda->EliminarDetalleComanda($idDetalleComanda);
        $listarDetalleComanda=$detalleComanda->listarDetalleComanda($idComanda);
        $listaComandas = $entidadComanda->buscarComandaPorid($idComanda);
        $lista =$entidadProducto->listarProductosActivos();
        $formulario->formDetalleComandaShow($listarDetalleComanda, $listaComandas,$lista);
    }
    public function  EliminarComanda($idComanda)
    {
        include_once("../modelo/entidadDetalleComanda.php");
        include_once("../modelo/entidadComanda.php");
       
        $entidadComanda = new entidadComanda;
       
        $EliminarComanda = $entidadComanda -> actualizarComandaestado($idComanda);



        include_once("../modelo/entidadComanda.php");
        $entidadComanda = new entidadComanda;
        $listaComandas = $entidadComanda->listarComandas();
        include_once("../moduloVentas/formEmitirComanda.php");
        $formEmitirComandar = new formEmitirComanda;
        $formEmitirComandar->formEmitirComandaShow($listaComandas);
    }

}