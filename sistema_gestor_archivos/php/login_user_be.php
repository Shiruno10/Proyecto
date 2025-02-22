<?php
session_start();
include 'conexion_be.php';
include 'registrar_accion.php';

$correo  = $_POST['correo'];
$clave = $_POST['clave'];
//$clave = hash('sha512', $clave);


// Verificar si el usuario tiene una sesión activa en la base de datos
$validar_sesion = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' AND session_active=1");

if (mysqli_num_rows($validar_sesion) > 0) {
    echo '
    <script>
        alert("El usuario ya tiene una sesión iniciada.");
        window.location = "../index.php";
    </script>
    ';
    exit();
}


$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' AND clave='$clave'");

if (mysqli_num_rows($validar_login) > 0) {
    $row = mysqli_fetch_assoc($validar_login);

    // Establecer la sesión como activa en la base de datos
    mysqli_query($conexion, "UPDATE usuarios SET session_active=1 WHERE id=" . $row['id']);

    // Almacenar la información de la sesión
    $_SESSION['usuario_id'] = $row['id'];
    $_SESSION['nombre_completo'] = $row['nombre'] . " " . $row['apellido'];
    $_SESSION['correo'] = $correo;
    $_SESSION['loggedin'] = true;
    registrarAccion($_SESSION['nombre_completo'], 'inicio de sesión', 'El usuario ha iniciado sesión en el sistema.');
    header("location: principal.php");
    exit();
} else {
    echo '
    <script>
        alert("Usuario no registrado o las credenciales no coinciden. Por Favor Verifica e intenta Nuevamente");
        window.location = "../index.php";
    </script>
    ';
    exit();
}
?>
