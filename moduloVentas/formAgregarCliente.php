<?php
class formAgregarCliente{
    public function formAgregarClienteShow($listarDetalleComanda,$listacomanda){
?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
                <link rel="stylesheet" href="../estilos/estilos_generales.css">
                <link rel="shorcut icon" type="image/x-icon" href="../img/ico   no.ico">
                <title>Emitir Comprobantes</title>
            </head>
            <body>
                <div class="div-header">
                    <img src="../img/logo_header.png" height="100" width="230">
                    <form action="../moduloVentas/getComprobante.php" method="POST">
                                <input  class="volver" type="submit" name="btnEmitirComprobante" value="Atras">
                            </form>
                </div>
                    <h1 class="titulo">Boletas</h1>
                <form action="getComprobante.php" method="POST">
                <input type="hidden" name="idComanda" value="<?php echo $listacomanda[0]['idcomanda'] ?>">
                Tipo de Comprobante: <select name="opcComp">
                <option value="Boleta">Boleta</option>
                <option value="Factura">Factura</option>
                </select><br>
                <label for="">Serie: </label>
                <input type="text" name="sr" ><br>
                <label for="">Numero: </label>
                <input type="text" name="nmr"><br>
                <label for="">Nombre de Cliente: </label>
                <input type="text" name="nombre"><br>
                <label for="">DNI: </label>
                <input type="text" name="dni"><br>
                <label for="">Fecha: </label>
                <?php echo $listacomanda[0]['fecha'] ?><br>
                <label for="">Numero de Mesa: </label>
                <?php echo $listacomanda[0]['numeroMesa'] ?><br>
                    <?php
                        if ($listarDetalleComanda==null) {
                                echo 'no se encontro datos';
                            } else {
                        ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">nombre</th>
                                        <th scope="col">precion</th>
                                        <th scope="col">cantidad</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
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
                                                <td>" . $de['precio'] . "</td>";
                                            }
                                        }
                                        echo "<td>" . $detalle['cantidad'] . "</td>
                                        
                                        </tr>";


                                    ?>
                                </tbody>
                            </table>
                            <?php
                            }?>
                            Resumen:<br>
                            Total: <input type="text" name="pago"><br>
                            Descuento: <input type="text"  name="dsct" value="0"><br>
                            Vuelto: <input type="text"  name="vlt" value="0"><br>
                            
                            <input type="submit" value="Procesar" name="btnInsertar">
                    </form>
                        </body>
                    </html> 
                    <?php
                }

            }    
        ?>
