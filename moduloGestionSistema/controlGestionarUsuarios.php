<?php
    class controlGestionarUsuarios{
        public function obtenerUsuariosPrivilegios($idrol){
            include_once("../modelo/entidadUsuario.php");
            include_once("formGestionarUsuarios.php");
            $usuarios = new entidadUsuario;
            $gestionarUsuario = new formGestionarUsuarios;
            $listaUsuarios = $usuarios -> obtenerUsuarios();
            $gestionarUsuario -> formGestionarUsuariosShow($listaUsuarios,$idrol);
        }
        public function modificarUsuarios($id){
            include_once("../modelo/entidadUsuario.php");
            include_once("formModificarUsuario.php");
            $usuariosModificar = new entidadUsuario;
            $modificarUsuario = new formModificarUsuario;
            $user = $usuariosModificar->obteniendoUsuariosPorId($id);   
            $modificarUsuario->modificarUsuariosShow($user,$id);       
        }
        public function actualizanUsuariosPrivilegios($id,$nombre,$usuario,$dni,$email,$foto,$rol){
            include_once('../modelo/entidadUsuario.php');
            include_once('../shared/formMensajeSistema.php');
            include_once('../modelo/entidadUsuarioPrivilegio.php');
            include_once('formGestionarUsuarios.php');
            $modUsuario = new entidadUsuario;
            $modPrivi = new entidadUsuarioPrivilegio;
            $nuevoMensaje = new formMensajeSistema;
            $privilegios = $modPrivi->obtenerPrivilegios($rol);
            $actualizando = $modUsuario -> actualizandoUsuariosPrivilegios($id,$nombre,$usuario,$dni,$email,$foto,$rol);
            if($actualizando==TRUE){
               $this->obtenerUsuariosPrivilegios($rol);
            }else{
                $nuevoMensaje -> formMensajeSistemaShow("Error al actualizar","<a href='../shared/formBienvenida.php'>Bienvenida</a>");
            }
        }
        public function habilitarInhabilitarUsuario($idusuario,$estado){
            include_once('../modelo/entidadUsuario.php');
            include_once('../shared/formMensajeSistema.php');
            include_once('formGestionarUsuarios.php');
            $modHabilitar = new entidadUsuario;
            $modHabilitar -> habilitarInhabilitarUsuario($idusuario,$estado);
            $nuevoMensaje = new formMensajeSistema;
            $nuevoForm = new formGestionarUsuarios;
            session_start();
            if($modHabilitar==TRUE){
                $this->obtenerUsuariosPrivilegios($_SESSION["rol"]);
            }else{
                $nuevoMensaje -> formMensajeSistemaShow("Error al Inhabilitar","<a href='../shared/formBienvenida.php'>Bienvenida</a>");
            }
        }
        public function mostrarFormAddUsuario(){
            include_once('formRegistrarUsuario.php');
            $formAdd = new registrarUsuario;
            $formAdd->addUsuarioShow();
        }
        public function registrandoUsuario($nombre,$usuario,$dni,$foto,$rol,$estado,$pass,$email,$secreto){
            include_once('../modelo/entidadUsuario.php');
            include_once('../shared/formMensajeSistema.php');
            include_once('formGestionarUsuarios.php');
            $addUsuario = new entidadUsuario;
            $addUsuario-> agregandoUsuario($nombre,$usuario,$dni,$foto,$rol,$estado,$pass,$email,$secreto);
            $nuevoMensaje = new formMensajeSistema;
            $inicio = new formGestionarUsuarios;
            if($addUsuario==TRUE){
                $this->obtenerUsuariosPrivilegios($rol);
            }else{
                $nuevoMensaje -> formMensajeSistemaShow("Error al Registrar","<a href='../shared/formBienvenida.php'>Bienvenida</a>");
            }
        }
    }
?>