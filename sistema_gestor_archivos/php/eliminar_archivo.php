<?php
include 'conexion_be.php';
include 'registrar_accion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Eliminar el archivo de la carpeta 'uploads'
    $query = "SELECT ruta_archivo FROM archivos WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($result) {
        $ruta_archivo = $result['ruta_archivo'];
        if (file_exists($ruta_archivo)) {
            unlink($ruta_archivo);
        }

        // Eliminar el registro de la base de datos
        $query = "DELETE FROM archivos WHERE id = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            registrarAccion($_SESSION['nombre_completo'], 'eliminar archivo', 'Un archivo se ha eliminado del sistema.');
            echo "Archivo eliminado con éxito.";
        } else {
            echo "Error al eliminar el archivo: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Archivo no encontrado.";
    }
}

$conexion->close();
?>
