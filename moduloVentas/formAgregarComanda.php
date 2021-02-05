<?php

class formAgregarComanda
{
    public function formAgregarComandaShow($lista)
    {
?>
    <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
            <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
            <link rel="stylesheet" href="../estilos/estilos_generales.css">
            <link rel="stylesheet" href="../estilos/estilos_agregarComanda.css">
            <title>Proforma</title>
        </head>

        <body>

            <div class="div-header">
            <img src="../img/logo_header.png" height="100" width="230">
                <form action="getComanda.php" method="POST">
            <input  class="volver" type="submit" name="btnEmitirComanda" value="Atras">
        </form>
            </div>
                            
            </body>
            <h1 class="titulo">Numero de mesa</h1>
            <div class="form-div">
                
                
                <form action="../moduloVentas/getComanda.php" method="post">
                        <select class="input"  name="idProducto" onchange="this.form.submit()">
                            <option requered><?php echo $_SESSION['nombre'] ?></option>
                            <?php  
                            foreach ($lista as $value) { ?>
                            <option  value="<?php echo $value['idProducto'] ?>"><?php echo $value['nombre'] ?></option> 
                            <?php } ?>
                        </select> 
                        <select class="input"  name="CantidadProducto" >
                            <?php  $i=1;
                            for($i;$i<=$_SESSION['stock'];$i++) { ?>
                                <option  value="<?php echo $i?>"><?php echo $i ?></option> 
                            <?php } ?>
                        </select>

                    <input  class="agregar" type="submit" name="btnARGProducto" value="Agregar">
                    
                </form>

                
                <form class="form-f" action="../moduloVentas/getComanda.php" method="post">
                    <input class="input" type="text" name="NumeroComanda" placeholder="Numero de Comanda" required>
                    <input class="input" type="text" name="NumeroMesa" placeholder="Numero de mesa" required>
                    <input class="input" type="text" name="cliente" placeholder="Cliente">
                    <input class="agregar" type="submit" name="btnCrearComanda" value="Crear Comanda">
                </form>
            </div>
        
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["listaProductos"])) {
        ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nombre</th>
                        <th scope="col">tipo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $j=0;
                    foreach ($_SESSION['listaProductos'] as $productos) {
                            $j++;
                        echo "<tr>
                                                    <form action=../moduloVentas/getComanda.php?idProducto=$productos[idProducto] method=post>
                                                    <input type=text value=$productos[idProducto] readonly hidden name=idProducto>
                                                    <td>" . $j . "</td>
                                                    <td>" . $productos['nombre'] . "</td>
                                                    <td>" . $productos['tipo'] . "</td>
                                                    <td>" . $productos['cantidad'] . "</td>
                                                    <td>" . $productos['precio'] . "</td>
                                                    <td><input class='buscar' type=submit name=btnEliminarProducto value=Eliminar></td>
                                                    <input type=hidden name=filaProductos value=$i>
                                                    </form>
                                                </tr>";
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table><form action="../moduloVentas/getComanda.php" method="post">
                        <input class='agregar' type="submit" name="btnEmitirComanda" value="Agregar">
                </form>
            
        <?php
        }
        ?>
        
        
    <?php
    }/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function formDetalleComandaShow($listarDetalleComanda, $listaComandas,$lista)
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
            <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
            <link rel="stylesheet" href="../estilos/estilos_generales.css">
            <link rel="stylesheet" href="../estilos/estilos_agregarComanda.css">
            <title>Proforma</title>
        </head>
                
        <body>
            <div class="div-header">
                <img src="../img/logo_header.png" height="100" width="230">
                <form action="../moduloVentas/getComanda.php" method="post">
                            <input  class="volver" type="submit" name="btnEmitirComanda" value="Atras">
                        </form>

            </div>
            
                <h1 class="titulo">Modificar Comanda</h1>
            

            <div class="actualizaCarta">
                <center>
                    <div><form action='getComanda.php' method='POST'>
                                    <input type='hidden' name='idComanda' value="<?php echo $listaComandas[0]['idcomanda'] ?>">
                                    <input class='modificar' type='submit' value='Eliminar' name='btnEliminarComanda'>
                                    </form>
                        <h2 class="text">
                            <label for="">Numero de Comanda: </label>
                            <?php echo $listaComandas[0]['numeroComanda'] ?><br>
                            <label for="">Fecha: </label>
                            <?php echo $listaComandas[0]['fecha'] ?><br>
                            <label for="">Numero de Mesa: </label>
                            <?php echo $listaComandas[0]['numeroMesa'] ?><br>
                            <label for="">Cliente: </label>
                            <?php echo $listaComandas[0]['cliente'] ?><br>
                        </h2>
                    </div>
                </center>
                <form action="../moduloVentas/getComanda.php" method="post">
                        <input type="hidden" name="idComanda" value="<?php echo $listaComandas[0]['idcomanda'] ?>">
                        <select class="input"  name="idProductoA" onchange="this.form.submit()">

                            <option requered><?php echo $_SESSION['nombre'] ?></option>
                            <?php  
                            foreach ($lista as $values) { ?>
                            <option  value="<?php echo $values['idProducto'] ?>"><?php echo $values['nombre'] ?></option> 
                            <?php } ?>
                        </select> 
                        <select class="input"  name="CantidadProducto" >
                            <?php  $i=1;
                            for($i;$i<=$_SESSION['stock'];$i++) { ?>
                                <option  value="<?php echo $i?>"><?php echo $i ?></option> 
                            <?php } ?>
                        </select>

                    <input  class="agregar" type="submit" name="btnARGSProducto" value="Agregar">
                    
                    </form>
                <table class="carta">
                    <thead>
                        <tr class="encabezado">
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Accion</th>
                            

                        </tr>
                    </thead>
                    
                    <br><br>

                    <?php
                    $idcomanda = $listaComandas[0]['idcomanda'];
                    $i=0;
                    foreach ($listarDetalleComanda as $detalle) {
                        $i++;
                        
                    ?>
                        <tr>
                        <?php
                        
                        $d = $detalle['idproducto'];
                        $obj = new entidadProducto();
                        $det = $obj->buscarProductoPorId($d);
                        foreach ($det as $de) {
                            
                            echo "  <td>" . $i . "</td>
                                    <td>" . $de['nombre'] . "</td>
                                    <td>" . $de['tipo'] . "</td>
                                    <td>" . $de['precio'] . "</td>";
                        }
                            echo "<td>" . $detalle['cantidad'] . "</td>
                                <td>
                                <form action='../moduloVentas/getComanda.php' method=post>
                                <input type='hidden' name='idDetCom' value=$detalle[idDetalleComanda]>
                                <input type='hidden' name='idComa' value=$idcomanda>
                                <input class='buscar' type=submit name=EliminarProducto value=Eliminar>
                                </form>
                                </td>
                    	</tr>";
                    }

                        ?>

                                    
                        


                
                        </body>

                <?php

            }
        }
                ?>
