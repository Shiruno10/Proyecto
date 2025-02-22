<?php
// Conectar a la base de datos
include "conexion_be.php";
include 'registrar_accion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $new_password = $_POST["new_password"];
    
    // Verificar el token
    $sql = "SELECT correo, id, nombre, apellido FROM usuarios WHERE codigo_acceso='$token' LIMIT 1";
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row["correo"];
        $usuario_id = $row["id"];
        $nombre_completo = $row['nombre'] . " " . $row['apellido'];

        // Hashear la nueva contraseña
        $new_password_hashed = hash('sha512', $new_password);

        // Actualizar la contraseña del usuario
        $sql = "UPDATE usuarios SET clave='$new_password_hashed', codigo_acceso=NULL, modificado_clave=NOW() WHERE correo='$email'";
        if (mysqli_query($conexion, $sql)) {
            echo "Contraseña actualizada exitosamente.";
            
            // Registrar la acción en la bitácora
            $accion = "Restablecimiento de contraseña";
            $descripcion = "El usuario con correo $email ha restablecido su contraseña.";
            registrarAccion($nombre_completo, $accion, $descripcion);
        } else {
            echo "Error al actualizar la contraseña.";
        }
    } else {
        echo "Token inválido.";
    }
}
?>
