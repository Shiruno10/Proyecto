<?php
session_start();
include 'conexion_be.php';
include 'registrar_accion.php';
$uploadsDir = 'uploads/';

function deleteFiles($dir) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            if (is_dir($dir . $file)) {
                deleteFiles($dir . $file . '/');
                rmdir($dir . $file);
            } else {
                unlink($dir . $file);
            }
        }
    }
}

deleteFiles($uploadsDir);

echo json_encode(['success' => true, 'message' => 'Los archivos respaldados han sido eliminados.']);
?>