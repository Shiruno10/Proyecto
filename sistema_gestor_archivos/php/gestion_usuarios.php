<?php
session_start();
include 'conexion_be.php';
include 'registrar_accion.php';

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



<body class="body_dashboard">
<button><a href="principal.php" class="ver-usuarios-btn">Regresar al menu principal</a></button>
<div class="form">
    <!-- Formulario de Registro -->
    <form action="registro_usuario_be.php" method="POST" id="registro-form">
        <h2>Registrar Usuario</h2>
        <label for="">*Nombre</label>
        <input type="text" placeholder="Registra el primer nombre del usuario" name="nombre" required minlength="3" maxlength="32">
        <label for="">*Apellido</label>
        <input type="text" placeholder="Registra el primer apellido del usuario" name="apellido" required minlength="3" maxlength="32">
        <label for="telefono">* Teléfono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Ingresa el número de teléfono del usuario" required pattern="\d{11}" maxlength="11" minlength="11">
        <label for="">*Correo Electrónico</label>
        <input type="email" placeholder="Ingresa un correo electrónico válido" name="correo" required minlength="12" maxlength="64">
        <label for="opcion">* Selecciona el nivel de acceso del usuario:</label> 
        <select id="opcion" name="rol" required>
            <option value="" disabled selected>Elige una opción</option> 
            <option value="1">Super Admin</option> 
            <option value="1">Administrador</option> 
            <option value="0">Personal</option> 
        </select>
        <br>
        <label for="">*Contraseña</label>
        <input type="password" placeholder="Ingresa la contraseña del usuario" name="clave" required minlength="10" maxlength="50" id="password">
        <button>Registrarse</button>
    </form>
</div>
    

    <!-- Botón para Ver Usuarios -->
    <button id="ver-usuarios-btn" class="ver-usuarios-btn">Ver Usuarios</button>

    <!-- Tabla para Mostrar Usuarios -->
    <div id="usuarios-table-container" style="display:none;">
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Nivel Acceso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="usuarios-table-body">
                <?php 
                include 'get_usuarios.php';
                ?>
            </tbody>
        </table>
    </div>

    <!-- Formulario para Editar Usuario -->
    <div id="editar-usuario-form" style="display:none;">
        <h2>Editar Usuario</h2>
        <form id="formulario-editar-usuario">
            <input type="hidden" name="id" id="edit-id">
            <label for="edit-nombre">Nombre:</label>
            <input type="text" name="nombre" id="edit-nombre" required>
            <br>
            <label for="edit-apellido">Apellido:</label>
            <input type="text" name="apellido" id="edit-apellido" required>
            <br>
            <label for="edit-correo">Correo:</label>
            <input type="email" name="correo" id="edit-correo" required>
            <br>
            <label for="edit-telefono">Teléfono:</label>
            <input type="text" name="telefono" id="edit-telefono" required>
            <br>
            <label for="edit-rol">Nivel Acceso:</label>
            <input type="text" name="rol" id="edit-rol" required>
            <br>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>

    <script>
        document.getElementById('ver-usuarios-btn').addEventListener('click', function() {
            // Mostrar la tabla de usuarios
            document.getElementById('usuarios-table-container').style.display = 'block';
        });

        // funciones para editar y eliminar usuarios
        function eliminarUsuario(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "eliminar_usuario.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert(xhr.responseText);
                        location.reload();
                    }
                };
                xhr.send("id=" + id);
            }
        }

        function mostrarFormularioEdicion(id, nombre, apellido, correo, telefono, rol) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-nombre').value = nombre;
            document.getElementById('edit-apellido').value = apellido;
            document.getElementById('edit-correo').value = correo;
            document.getElementById('edit-telefono').value = telefono;
            document.getElementById('edit-rol').value = rol;
            document.getElementById('editar-usuario-form').style.display = 'block';
        }

        document.getElementById('formulario-editar-usuario').addEventListener('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "editar_usuario.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                    location.reload();
                }
            };
            xhr.send(formData);
        });


    </script>
     <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>