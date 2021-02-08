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
                    <form class="form-r" id="FormAgregarUsuario" action="getUsuarios.php" method="POST">
                        <label for="nombre">Nombre y Apellido</label>
                        <input class="input" type="text" name="nombre" placeholder="Ingrese Nombre" required>
                        <!-- <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" placeholder="Ingrese Usuario"> -->
                        <label for="dni">DNI</label>
                        <input class="input" type="text" minlength="8" maxlength="8" id="dni" name="dni" placeholder="Ingrese DNI" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required>

                        <label for="email">Email</label>
                        <input  class="input" type="email" name="email" placeholder="Ingrese Email" required>

                        <label for="rol">Cargo</label>
                        <select name="rol">
                            <option value="3">Administrador</option>
                            <option value="2">Recepcionista</option>
                            <option value="1">Cajero</option>
                        </select>
                        <label for="pass">Contraseña</label>
                        <input class="input" minlength="6" type="password" name="pass" placeholder="Ingrese contraseña">

                        <!-- <label for="imgPerfil">Foto: </label>
                        <input type="file" name="imgPerfil" required> -->
                        <p id="mensajeFormulario" style="color:red"></p>
                        <input hidden class="agregar" type="text" id="btnRegistrandoUsuario" value="Registrar usuario" name="btnRegistrandoUsuario">
                        <input class="agregar" type="submit" id="btnRegistrandoUsuario" value="Registrar usuario" name="btnRegistrandoUsuario">
                    </form>
                    <form action="getUsuarios.php" method="POST">
                        <input class="volver" type="submit" value="Regresar" name="btnRegresarModificar">
                    </form>

                    <script>
                        const formAgregarUsuario = document.querySelector('#FormAgregarUsuario');
                        const mensajeFormulario = document.querySelector('#mensajeFormulario');
                        console.log(formAgregarUsuario);
                        formAgregarUsuario.addEventListener("submit", (form)=> {
                            form.preventDefault();
                            var datos = new FormData(formAgregarUsuario);
                            console.log(datos.get('dni'));
                            fetch("getUsuarios.php?validarDni="+datos.get('dni'))
                                .then(response => response.text())
                                .then(data => {
                                    if(data==0) {
                                        console.log("se procesa");
                                        mensajeFormulario.innerHTML = "";
                                        const btnSubmit = document.querySelector('#btnRegistrandoUsuario');
                                        btnSubmit.value = "presionado";
                                        formAgregarUsuario.submit();
                                    } else {
                                        console.log("no se procesa");
                                        mensajeFormulario.innerHTML="El dni ya está registrado";
                                    }
                                });
                            // console.log(respuesta);
                            // console.log(respuesta.then(res => res));
                        });

                        // function getData(dni) {
                        //     var resultado;
                        //     fetch("getUsuarios.php?validarDni="+dni)
                        //         .then(response => response.text())
                        //         .then(data => {
                        //             if(data==0) {
                        //                 console.log("se procesa");
                        //                 mensajeFormulario.innerHTML = "";
                        //                 resultado = 0;
                        //             } else {
                        //                 console.log("no se procesa");
                        //                 mensajeFormulario.innerHTML="El dni ya está registrado";
                        //                 resultado = 1;
                        //             }
                        //         });
                        //     return resultado;
                        // }
                    </script>
                </div>
            </body>
            </html>
        <?php
    }
}
?>