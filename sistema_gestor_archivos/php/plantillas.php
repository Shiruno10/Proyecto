<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <!-- Tabla para Mostrar Usuarios -->
    <div id="usuarios-table-container" style="display:none;">
        <h2>Usuarios Registrados</h2>
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
</body>
</html>
