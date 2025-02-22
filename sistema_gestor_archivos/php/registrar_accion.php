<?php
include 'conexion_be.php';

function registrarAccion($nombreCompleto, $accion, $descripcion) {
    global $conexion;
    $stmt = $conexion->prepare("INSERT INTO bitacora (usuario_id, accion, descripcion) VALUES (?, ?, ?)");
    
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $bind = $stmt->bind_param("sss", $nombreCompleto, $accion, $descripcion);
    
    if ($bind === false) {
        die("Error al vincular los parámetros: " . $stmt->error);
    }

    $exec = $stmt->execute();
    
    if ($exec === false) {
        die("Error al ejecutar la consulta: " . $stmt->error);
    }

    $stmt->close();
}
?>
