<?php
date_default_timezone_set('America/Caracas');
session_start();
include 'conexion_be.php';
include 'registrar_accion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nombre del archivo de respaldo de la base de datos
    $backupFile = 'respaldo_db_' . date('Y-m-d_H-i') . '.sql';

    // Comando para crear el respaldo de la base de datos
    $command = "mysqldump --host=localhost --user=root --password='' gestor_archivos > {$backupFile}";
    system($command);

    // Directorio donde se encuentran los archivos subidos
    $uploadsDir = 'uploads/';

    // Nombre del archivo ZIP
    $zipFile = 'respaldo_completo_' . date('Y-m-d_H-i') . '.zip';

    // Crear una nueva instancia de ZipArchive
    $zip = new ZipArchive();
    if ($zip->open($zipFile, ZipArchive::CREATE) !== TRUE) {
        $_SESSION['message'] = "No se puede abrir el archivo ZIP.";
        echo '<script>
            alert("No se puede abrir el archivo ZIP.");
            window.location.href = "principal.php";
        </script>';
        exit();
    }

    // Añadir el archivo de respaldo de la base de datos al ZIP
    $zip->addFile($backupFile);

    // Función para añadir archivos a un archivo ZIP
    function addFilesToZip($dir, $zip, $pathInZip) {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                if (is_dir($dir . $file)) {
                    addFilesToZip($dir . $file . '/', $zip, $pathInZip . $file . '/');
                } else {
                    $zip->addFile($dir . $file, $pathInZip . $file);
                }
            }
        }
    }

    // Añadir archivos subidos al ZIP
    addFilesToZip($uploadsDir, $zip, 'uploads/');

    // Cerrar el archivo ZIP
    $zip->close();

    // Eliminar el archivo de respaldo de la base de datos temporal
    unlink($backupFile);

    // Enviar el archivo ZIP al navegador para descarga
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($zipFile) . '"');
    header('Content-Length: ' . filesize($zipFile));
    readfile($zipFile);

    // Eliminar el archivo ZIP del servidor después de enviarlo al cliente
    unlink($zipFile);

    $_SESSION['message'] = "Respaldo completo creado con éxito.";

    // Registrar la acción de respaldo
    if (isset($_SESSION['nombre_completo'])) {
        registrarAccion($_SESSION['nombre_completo'], 'respaldo de archivos', 'El usuario ha hecho un Backup de los archivos del sistema.');
    }

    echo '<script>
        alert("Respaldo completo creado con éxito.");
        window.location.href = "principal.php";
    </script>';
    exit();

} else {
    // Mostrar el formulario de confirmación
    echo '
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div class="container mt-5">
        <form method="post" action="">
            <div class="form-group">
                <p>¿Deseas vaciar la carpeta de archivos subidos antes de hacer el backup?</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="si" name="vaciar_uploads" value="1" required>
                    <label class="form-check-label" for="si">Sí</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="no" name="vaciar_uploads" value="0" required>
                    <label class="form-check-label" for="no">No</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Hacer Backup</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $("form").on("submit", function() {
            setTimeout(function() {
                window.location.href = "principal.php";
            }, 1000);
        });
    });
    </script>';
}
?>
