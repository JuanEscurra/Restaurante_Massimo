<?php
class registrarUsuario{
    public function addUsuarioShow(){
        ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Registrar Usuario</title>
                <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
                <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
                <link rel="stylesheet" href="../estilos/estilos_generales.css">
                    
            </head>
            <body>
                 <div class="div-header">
                         <img src="../img/logo_header.png" height="100" width="230">
                </div>
                <h1 class="titulo">Agregar Usuario</h1>
                <div class="div-input">
                    <form class="form-r" action="getUsuarios.php" method="POST" enctype="multipart/form-data">
                        <label for="nombre">Nombre y Apellido</label>
                        <input class="input" type="text" name="nombre" placeholder="Ingrese Nombre" required>
                        <!-- <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" placeholder="Ingrese Usuario"> -->
                        <label for="dni">DNI</label>
                        <input class="input" type="number" max=99999999 name="dni" placeholder="Ingrese DNI" required>

                        <label for="email">Email</label>
                        <input  class="input" type="email" name="email" placeholder="Ingrese Email" required>

                        <label for="rol">Cargo</label>
                        <select name="rol">
                            <option value="3">Administrador</option>
                            <option value="2">Recepcionista</option>
                            <option value="1">Cajero</option>
                        </select>
                        <label for="pass">Contraseña</label>
                        <input class="input" type="password" name="pass" placeholder="Ingrese contraseña">

                        <label for="imgPerfil">Foto: </label>
                        <input type="file" name="imgPerfil">

                        <input class="agregar" type="submit" value="Registrar usuario" name="btnRegistrandoUsuario">
                    </form>
                    <form action="getUsuarios.php" method="POST">
                        <input class="volver" type="submit" value="Regresar" name="btnRegresarModificar">
                    </form>
                </div>
            </body>
            </html>
        <?php
    }
}
?>