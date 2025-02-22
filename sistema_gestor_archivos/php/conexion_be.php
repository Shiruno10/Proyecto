<?php
$conexion = mysqli_connect("localhost", "root", "", "gestor_archivos");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Comprobar la conexión
//if ($conexion) {
   // echo 'Conectado Exitosamente a la Base de Datos';
//} else {
  ///  echo 'No se ha podido conectar a la Base de Datos';

?>
