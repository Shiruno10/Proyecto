<?php
session_start();
include 'conexion_be.php';

if (isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $timestamp = time();
    mysqli_query($conexion, "UPDATE usuarios SET last_activity=$timestamp WHERE id=$usuario_id");
}
?>
