<?php
include 'conexion_be.php';
include 'registrar_accion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nuevoNombre = $_POST['nombre_archivo'];

    // Actualizar el nombre del archivo en la base de datos
    $query = "UPDATE archivos SET nombre_archivo = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("si", $nuevoNombre, $id);
    if ($stmt->execute()) {
        registrarAccion($_SESSION['nombre_completo'], 'editar archivo', 'Un archivo se ha editado en el sistema.');
        echo "Nombre del archivo actualizado con éxito.";
    } else {
        echo "Error al actualizar el nombre del archivo: " . $stmt->error;
    }
    $stmt->close();
}

$conexion->close();
?>
