<?php
include 'conexion_be.php';
include 'registrar_accion.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Eliminar el registro de la base de datos
    $query = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        registrarAccion($_SESSION['nombre_completo'], 'eliminar usuario', 'Un usuario se ha sido borrado del sistema.');
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error al eliminar el Usuario: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Solicitud no válida.";
}

$conexion->close();
?>
