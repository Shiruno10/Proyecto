<?php
// Función para obtener el tamaño de una carpeta
function getFolderSize($dir) {
    $size = 0;
    foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : getFolderSize($each);
    }
    return $size;
}

$uploadsDir = 'uploads/';
$maxSize = 5 * 1024 * 1024 *1024; // 5GB en bytes
$alertSize = 4 * 1024 * 1024 *1024; // 4GB en bytes

$folderSize = getFolderSize($uploadsDir);

$buttonDisabled = false;
$message = '';

if ($folderSize >= $maxSize) {
    $message = 'El almacenamiento está lleno. No puedes subir más archivos.';
    $buttonDisabled = true;
} elseif ($folderSize >= $alertSize) {
    $message = 'El almacenamiento está casi lleno. Debes hacer un respaldo antes de que se llene.';
}
?>
