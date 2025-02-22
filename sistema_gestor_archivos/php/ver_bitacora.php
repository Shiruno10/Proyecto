<?php
session_start();
include 'conexion_be.php';
include 'registrar_accion.php';
include 'verificar_almacenamiento.php';


$tiempo_max_inactividad = 300; // 5 minutos = 300 segundos

if (isset($_SESSION['ultimo_acceso'])) {
    $inactivo = time() - $_SESSION['ultimo_acceso'];
    if ($inactivo >= $tiempo_max_inactividad) {
        registrarAccion($_SESSION['nombre_completo'], 'sesion finalizada', 'La sesión ha expirado por inactividad.');
        
        // Establecer la sesión como inactiva en la base de datos antes de destruir la sesión
        $usuario_id = $_SESSION['usuario_id'];
        mysqli_query($conexion, "UPDATE usuarios SET session_active=0 WHERE id=$usuario_id");
        
        // Destruir la sesión y las cookies
        session_unset();
        session_destroy();
        setcookie('PHPSESSID', '', time() - 3600, '/');
        
        echo '
        <script>
        alert("Tu sesión ha expirado por inactividad.");
        window.location = "../index.php";
        </script>
        ';
        exit();
    }
}

$_SESSION['ultimo_acceso'] = time();

// Establecer cookies
setcookie("ultimo_acceso", $_SESSION['ultimo_acceso'], time() + $tiempo_max_inactividad, "/");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo '
    <script>
    alert("Por Favor debes Iniciar Sesion");
    window.location = "../index.php";
    </script>
    ';
    session_destroy();
    die();
}

header("Cache-Control: no-cache, must-revalidate");
// HTTP 1.1 
header("Pragma: no-cache");
// HTTP 1.0 
header("Expires: Wen, 12 november 2024 10:48:00 GMT");

include 'cabecera.php';

// Verificar si hay un mensaje de sesión y mostrarlo
if (isset($_SESSION['message'])) {
  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      ' . $_SESSION['message'] . '
  </div>';
  unset($_SESSION['message']);
}

if ($message) { echo ' 
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
   ' . $message . ' </div> '; }

?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style href="../assets/css/style.css"></style>
</head>

<style>
    .body_dashboard {
    background-image: url(../assets/image/photo_5033033224133127559_y.jpg);
    background-attachment: fixed;
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat;
  }
  button{
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Sombra del texto */
    padding: 5px;
    outline: none;
    border: none;
    font-size: 1rem;
    font-weight: 500;
    color: var(--text-dark);
    background-color: var(--primary-color);
    cursor: pointer;
    transition: all 400ms ease;
    display: block;
  }

  button:hover {
    background-color: var(--primary-color-dark);
    border-left: 5px solid #c7c7c7;
  }

  table {
            
            border-collapse: collapse;
            width: 90%;
            margin: 20px;
            border-radius: 6px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.2);
            cursor: default;
            transition: all 400ms ease;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            border-color: #d3892f;
        }
        th, td {
            padding: 5px;
            text-align: left;
            color: #0c0a09;
        }
        
        .tabla button{
          text-decoration: none;
          display: inline-block;
          padding: 5px;
          color: #ff9900;
          border: 1px solid #ff9900;
          border-radius: 4px;
          transition: all 400ms ease;
          margin: 5px;
        }

        .tabla button:hover{
          background: #ff9900;
          color: #fff;
        }

        .table-container { 
          max-height: 300px; /* Ajusta el tamaño según tus necesidades */ 
          overflow-y: scroll; 
          border: none; 
          margin-top: 200px;
          margin-bottom: 5px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form{
            background-color: #fff;
            margin-top: 20px;
            width: 40%;
            padding: 3%;
            margin-left: 20px;
            border-radius: 1em;
            border-color: #d3892f;
            display: inline-block;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .ver-usuarios-btn{
            margin-top: 10px;
            margin-left: 25px;
        }
        
label {
  display: block;
  margin-bottom: 5px;
}

input, textarea {
  width: 400px;
  padding: 10px;
  margin-bottom: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
  
}
a{
    text-decoration: none;
    color: #c7c7c7;
}

a:hover{
    background: #ff9900;
          color: #fff;
}

  </style>


</head>
<body>

<!-- consultar base de datos -->

<!-- tabla bitacora -->
 <div>
 <button><a href="principal.php" class="ver-usuarios-btn">Regresar al menu principal</a></button>
    <h1>Bitácora de Acciones del Sistema</h1>
 </div>

<table>
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Acción</th>
            <th>Descripción</th>
            <th>Fecha y Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include 'bitacora.php';
        ?>
    </tbody>
</table>
<script>
   

    </script>
     <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>
