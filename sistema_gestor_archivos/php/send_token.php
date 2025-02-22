<?php
// Conectar a la base de datos
include "conexion_be.php";
include 'registrar_accion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    // Verificar si el correo está registrado en la tabla de usuarios
    $sql = "SELECT * FROM usuarios WHERE correo='$email' LIMIT 1";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $usuario_id = $row["id"];
        $nombre_completo = $row['nombre'] . " " . $row['apellido'];

        $token = bin2hex(random_bytes(50)); // Generar un código temporal
        
        // Almacenar el código temporal en la tabla de usuarios
        $sql = "UPDATE usuarios SET codigo_acceso='$token' WHERE correo='$email'";
        if (mysqli_query($conexion, $sql)) {
            // Enviar el código temporal por correo electrónico
            $to = $email;
            $subject = "Recuperación de contraseña";
            $message = "Para restablecer tu contraseña, haz clic en el siguiente enlace: ";
            $message .= "http://127.0.0.1/sistema_gestor_archivos/reset_password.php?token=$token";
            $headers = "From: UPTAG: Gestion Comunicacional";

            if (mail($to, $subject, $message, $headers)) {
                echo "Correo de recuperación enviado.";
                
                // Registrar la acción en la bitácora
                $accion = "Solicitud de recuperación de contraseña";
                $descripcion = "El usuario con correo $email ha solicitado la recuperación de su contraseña.";
                registrarAccion($nombre_completo, $accion, $descripcion);
            } else {
                echo "Error al enviar el correo.";
            }
        } else {
            echo "Error al almacenar el código temporal: " . mysqli_error($conexion);
        }
    } else {
        echo "Correo no registrado.";
    }
}
?>
