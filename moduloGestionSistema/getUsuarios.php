<?php
    if(isset($_POST['btnGestionarUsuarios']) or isset($_POST['btnRegresarModificar'])) {
        
        include_once("controlGestionarUsuarios.php");
        $control = new controlGestionarUsuarios;
        $control->obtenerUsuariosPrivilegios();
    }
    elseif(isset($_POST['btnModificar'])){
        $id = $_POST['idusuario'];
        include_once("controlGestionarUsuarios.php");
        $controlModificar = new controlGestionarUsuarios;
        $controlModificar->modificarUsuarios($id);
    }
    elseif(isset($_POST['btnActualizando'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $rol = $_POST['rol'];
        if($rol==1){
            $foto = '../img/cajero.png';
        }elseif($rol==2){
            $foto = '../img/recepcionista.png';
        }else{
            $foto = '../img/administrador.png';
        }
        include_once('controlGestionarUsuarios.php');
        $controlModificando = new controlGestionarUsuarios;
        $controlModificando->actualizanUsuariosPrivilegios($id,$nombre,$usuario,$dni,$email,$foto,$rol);
    }
    elseif(isset($_POST['btnInhabilitar'])){
        $idusuario = $_POST['idusuario'];
        $estado = $_POST['estado'];
        include_once('controlGestionarUsuarios.php');
        $inhabilitar = new controlGestionarUsuarios;
        $inhabilitar->habilitarInhabilitarUsuario($idusuario,$estado);
    }
    elseif(isset($_POST['btnRegistrarUsuario'])){
        include_once('controlGestionarUsuarios.php');
        $controlAdd = new controlGestionarUsuarios;
        $controlAdd->mostrarFormAddUsuario();
    }
    elseif(isset($_POST['btnRegistrandoUsuario'])){
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $usuario = substr($nombre,0,3).substr($dni,0,3).substr($email,0,3);
        $rol = $_POST['rol'];
        if($rol==1){
            $foto = '../img/cajero.png';
        }elseif($rol==2){
            $foto = '../img/recepcionista.png';
        }else{
            $foto = '../img/administrador.png';
        }
        $estado = $_POST['estado'];
        $pass = md5($_POST['pass']);
        $secreto = substr($nombre,0,3).substr($dni,0,3);
        include_once('controlGestionarUsuarios.php');
        $controlAdding = new controlGestionarUsuarios;
        $controlAdding -> registrandoUsuario($nombre,$usuario,$dni,$foto,$rol,$estado,$pass,$email,$secreto);
    }
    elseif (isset($_POST['btn'])) {
            $rol = $_POST['idrol'];
                include_once("../modelo/entidadUsuarioPrivilegio.php");
                include_once("../moduloSeguridad/formBienvenida.php");
                include_once("../modelo/entidadUsuario.php");
                $objUsuario2 = new entidadUsuario;
                $objUsuarioPrivilegio = new entidadUsuarioPrivilegio;
                $objformBienvenida = new formBienvenida;
                $Privilegios = $objUsuarioPrivilegio -> obtenerPrivilegios($rol);
                $objformBienvenida -> formBienvenidaShow($Privilegios);
        }
    else{
        include_once('../shared/formMensajeSistema.php');
        $nuevoMensaje = new formMensajeSistema;
        $nuevoMensaje -> formMensajeSistemaShow("Acceso no Permitido","<a href='../index.php'>Iniciar Sesion</a>");
    }
?>