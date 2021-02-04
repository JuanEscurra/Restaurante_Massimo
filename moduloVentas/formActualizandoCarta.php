<?php
    class formActualizarCarta{
        public function formActualizandoCartaShow($productos){
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Actualizando Carta</title>
                <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
                <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
                <link rel="stylesheet" href="../estilos/estilos_generales.css">
                <link rel="stylesheet" href="../estilos/actualizando_carta.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            </head>
            <body>
                <div class="div-header">
                     <img src="../img/logo_header.png" height="100" width="230">
                </div>
                <h1 class="titulo">Actualizando Carta del dia</h1>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Registrar producto
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="post">
                            <div class="modal-body">
                                <input type="text" name="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <form action="getCarta.php">
                    Buscar por tipo de producto: 
                    <select name="tipoProducto" onchange="this.form.submit()">
                        <option value="entrada" selected>Todo</option>
                        <option value="entrada">Entrada</option>
                        <option value="segundo">Segundo</option>
                        <option value="sopa">Sopa</option>
                        <option value="bebida">Bebida</option>
                        <option value="gaseosa">Gaseosa</option>
                    </select>
                </form>
                <form action="getCarta.php" method="post">
                    <input type="submit" name="btnRegistrarProducto" value="Registrar nuevo producto">
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($productos as $producto) {
                            echo "<form action='getCarta.php' method='POST'>
                            <tr>";
                                echo "<input name='idProducto' value='$producto[idProducto]' hidden>";
                                echo"<td> $producto[idProducto]</td>";
                                echo "<td>" . $producto['nombre'] . "</td>";
                                echo "<td>" . $producto['tipo'] . "</td>";
                                echo "<td>" . $producto['precio'] . "</td>";
                                echo "<td><select name='estado'>";
                                if($producto['estado'] == '1') {
                                    echo "<option value='1' selected>Habilitado</option>
                                    <option value='0'>Deshabilitado</option>"; 
                                } else {
                                    echo "<option value='1'>Habilitado</option>
                                    <option value='0' selected>Deshabilitado</option>"; 
                                }
                                echo "</select></td>";
                                echo "<td><input type='submit' name='btnModificarProducto' value='Modificar'></td>";
                            echo "</tr></form>";
                        }

                        ?>
                    </tbody>
                </table>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            </body>
            </html>
            <?php
        }
    }
?>