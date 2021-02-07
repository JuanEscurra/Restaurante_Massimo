<?php 
	class formBienvenida{
		public function formBienvenidaShow($Privilegios)
		{
			?>
				<!DOCTYPE html>
				<html>
				<head>
					<title>Formulario Bienvenida</title>
					<link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
                	<link rel="stylesheet" href="../estilos/estilos_generales.css">
                	<link rel="shorcut icon" type="image/x-icon" href="../img/ico   no.ico">
					<link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
				    <link rel="stylesheet" href="../estilos/estilos_generales.css">
				    <link rel="stylesheet" href="../estilos/estilos_formbienvenida.css">
				</head>
				<body>
					<div class="logo">
							<img src="../img/logo_header.png" height="100" width="230">
							<form action="getEntrar.php" method="POST">
								<input class="volver" type="submit" name="btnCerrarSesion" value="Cerrar Sesión">
							</form>
					</div>
				   <div class="div-div">
						<div class="contenedor-privilegios">
							<?php
								for($i=0;$i<count($Privilegios);$i++){?>

								<form class="form-url" method="POST" action="<?php echo $Privilegios[$i]['url'] ?>">
            						<input class="input-campo" type="submit" name="<?php echo $Privilegios[$i]['privilegio'] ?>" value="<?php echo $Privilegios[$i]['nombre'] ?>">
        						</form>
        						<?php
								}
							?>
						</div>
					</div>
				</body>
				</html>
			<?php 
		}
	}
 ?>