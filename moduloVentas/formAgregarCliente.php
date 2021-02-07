<?php
class formAgregarCliente{
    public function formAgregarClienteShow($listaComandas,$idcomanda){
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
                    <form action="../moduloSeguridad/getUsuario.php" method="POST">
                                <input  class="volver" type="submit" name="btnInicio" value="Atras">
                            </form>
                </div>
                    <h1 class="titulo">Boletas</h1>
                <form action="getComprobante.php" method="POST">
                
                Tipo de Comprobante: <select name="opcComp">
                <option value="Boleta">Boleta</option>
                <option value="Factura">Factura</option>
                </select><br><br>
                Serie:  <input type="text" name="sr"><br><br>
                Numero: <input type="text" name="nmr"><br><br>
                Nombre de Cliente:  <input type="text" name="nombre"><br><br>
                DNI: <input type="text" name="dni">
                    <?php
                        if ($listaComandas==null) {
                                echo 'no se encontro datos';
                            } else {
                        ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $i=0;
                                        foreach ($listaComandas as $comanda) {
                                        $i++;
                                        echo "
                                            <tr>
                                                <td>" . $i . "</td>
                                                <td>" . $comanda['cantidad'] . "</td>
                                                <td>" . $comanda['nombre'] . "</td>
                                                <td>" . $comanda['precio'] . "</td>
                                                <td>" . $comanda['valor'] . "</td>
                                            </tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            }?>
                            Resumen:<br>
                            Total: <input type="text" name="pago"><br>
                            Descuento: <input type="text"  name="dsct" value="0"><br>
                            Vuelto: <input type="text"  name="vlt" value="0"><br>
                            <input type=number name="idComanda" value= readonly required hidden>
                            <input type="submit" value="Procesar" name="btnInsertar">
                    </form>
                        </body>
                    </html> 
                    <?php
                }

            }    
        ?>
