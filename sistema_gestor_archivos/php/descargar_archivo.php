<?php
include 'conexion_be.php';


if (isset($_GET['archivo'])) {
    $archivo = $_GET['archivo'];
    $ruta = "./uploads" . $archivo; // Cambia "ruta/a/tus/archivos/" por la ruta correcta a tus archivos

    if (file_exists($ruta)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($ruta) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($ruta));
        flush(); // Flush system output buffer
        readfile($ruta);
        exit();
    } else {
        die('El archivo no existe.');
    }
} else {
    die('No se especificó ningún archivo.');
}
?>
