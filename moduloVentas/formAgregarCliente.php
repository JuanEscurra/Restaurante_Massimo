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
            <style>
            @media print{
                .parte02,.btn{
                    display: none;
                }

            }
         </style>
            <body>
                <div class="div-header">
                    <img src="../img/logo_header.png" height="100" width="230">
                    <form action="../moduloVentas/getComprobante.php" method="POST">
                                <input  class="volver" type="submit" name="btnEmitirComprobante" value="Atras">
                            </form>
                </div>
                    <h1 class="titulo">Boletas</h1>
                    
                <form action="getComprobante.php" method="POST">
                <label for="">Fecha: </label>
                <?php echo $listacomanda[0]['fecha'] ?><br>s
                <input type="hidden" name="idComanda" value="<?php echo $listacomanda[0]['idcomanda'] ?>">
                <label for="">Tipo de Comprobante:  </label>
                <input type="text"  name="tcomp" value="Boleta"><br>
                <label for="">Serie: </label>
                <input type="text"  name="serie" value="001"><br>
                <?php
                ?>
                <label for="">Numero: </label>
                
                <input type="text" min="7" max="7" name="numero" value="<?php echo substr("000000",0,7-strlen($listacomanda[0]['idcomanda'])) . $listacomanda[0]['idcomanda'];?>"><br>
                <label for="">Moneda: </label>
                <input type="text"  name="moneda" value="Soles"><br>
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
                                        <th scope="col">precio</th>
                                        <th scope="col">cantidad</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                                        $i=0;
                                        foreach ($listarDetalleComanda as $detalle) {
                                        $i++;
                                        
                                        echo " <tr>
                                        <td>" . $i . "</td>";
                                ?>

                                    
                                <?php

                                        $d = $detalle['idproducto'];
                                        $obj = new entidadProducto();
                                        $det = $obj->buscarProductoPorId($d);
                                        foreach ($det as $de) {
                            
                                        echo "  
                                                <td>" . $de['nombre'] . "</td>
                                                <td>" . $de['precio'] . "</td>";
                                            }
                                        
                                        echo "<td>" . $detalle['cantidad'] . "</td>
                                        </tr>";


                                  }  ?>
                                </tbody>
                            </table>
                            <?php
                            }?>
                            Resumen:<br>
                            Total: <input type="text"  name="pago" value="<?php echo $listacomanda[0]['total'] ?>"><br>
                             <input type="submit" value="Procesar" name="btnInsertar" onclick="print()">
                    </form>
                        </body>
                    </html> 
                    <?php
                }

            }    
        ?>
