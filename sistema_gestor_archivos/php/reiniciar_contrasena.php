<?php
// Conectar a la base de datos
include "conexion_be.php";

$token_valido = false;

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Verificar el token en la base de datos
    $sql = "SELECT correo FROM usuarios WHERE codigo_acceso='$token' LIMIT 1";
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result) > 0) {
        $token_valido = true;
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/image/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>UPTAG | Gestión Comunicacional</title>
</head>
<body>
<style>
 body {
        background-image: url(assets/image/fondo.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
    }

</style>
<h2>Restablecer Contraseña</h2>
    <?php if ($token_valido): ?>
        <form method="post" action="reset_password.php">
            <label for="token">Código de recuperación:</label>
            <input type="text" id="token" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>" readonly>
            <label for="new_password">Nueva contraseña:</label>
            <input type="password" id="new_password" name="new_password" placeholder="Introduce la nueva contraseña" required>
            <button type="submit">Restablecer contraseña</button>
        </form>
    <?php else: ?>
        <p>Token inválido o no proporcionado. Por favor, solicita un nuevo código de recuperación.</p>
    <?php endif; ?>
    <script src="assets/js/script.js"></script>
</body>
</html>
