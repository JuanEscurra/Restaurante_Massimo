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
            </head>
            <body>
                <div class="div-header">
                     <img src="../img/logo_header.png" height="100" width="230">
                </div>
                <h1 class="titulo">Actualizando Carta del dia</h1>
                <form action="getCarta.php">
                    Buscar por tipo de producto: 
                    <select name="tipoProducto" onchange="this.form.submit()">
                        <option value="entrada">Entrada</option>
                        <option value="segundo">Segundo</option>
                        <option value="sopa">Sopa</option>
                        <option value="bebida">Bebida</option>
                        <option value="gaseosa">Gaseosa</option>
                    </select>
                </form>
                <table  class="table table-hover">
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


                <form action="getCarta.php" method="POST">
                    <input class="volver" type="submit" value="Regresar" name="btnRegresarEstado">
                </form>    
            </body>
            </html>
            <?php
        }
    }
?>