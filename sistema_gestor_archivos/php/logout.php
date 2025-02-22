<?php
session_start();
include 'conexion_be.php';
include 'registrar_accion.php';

// Registrar la acción de cierre de sesión
if (isset($_SESSION['nombre_completo'])) {
    registrarAccion($_SESSION['nombre_completo'], 'cierre de sesión', 'El usuario ha cerrado sesión en el sistema.');
}

// Verificar si el usuario está logueado
if (isset($_SESSION['usuario_id'])) {
    // Establecer la sesión como inactiva en la base de datos
    $usuario_id = $_SESSION['usuario_id'];
    mysqli_query($conexion, "UPDATE usuarios SET session_active=0 WHERE id=" . $usuario_id);
}

// Destruir la sesión y las cookies
session_unset();
session_destroy();
setcookie('PHPSESSID', '', time() - 3600, '/');
echo '
<script>
alert("Sesión cerrada exitosamente.");
window.location = "../index.php";
</script>
';
exit();
?>
