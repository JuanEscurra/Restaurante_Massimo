<?php
    class formListarCarta{
        public function formListarCartaShow($productos){
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Carta</title>
                <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
                <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
                <link rel="stylesheet" href="../estilos/estilos_generales.css">
                <link rel="stylesheet" href="../estilos/estilos_carta.css">
            </head>
            <body>
                <div class="div-header">
                    <img src="../img/logo_header.png" height="100" width="230">
                </div>
                <h1 class="titulo">Carta</h1>
                <p>Dia: 
                    <script>
                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                        var f=new Date();
                        document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>
                </p>
                <div class="div-col">
                    <?php
                        var_dump($productos);
                    ?>
                </div>
                <form action="getCarta.php" method="POST">
                    <input class="agregar" type="submit" value="Actualizar" name="btnAActualizar">
                </form>
                <form action="../moduloSeguridad/getUsuario.php" method="POST">
                    <input  class="volver" type="submit" name="btnInicio" value="Atras">
                </form>
                
            </body>
            </html>
            <?php
        }
    }
?>