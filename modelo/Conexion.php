<?php
  class Conexion{
      private $conexion;
      function __construct(){
        $this->conexion = mysqli_connect("localhost","root","12345678","oficial_massimo");
      }

      public function getConexion(){
        return $this->conexion;
      }

      public function cerrarConexion(){
        mysqli_close($this->conexion);
      } 
  }
?>