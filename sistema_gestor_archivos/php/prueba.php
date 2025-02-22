<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style href="../assets/css/style.css"></style>
</head>
<body>
    <!-- Tu código HTML aquí -->

    <script>
        function actualizarEstadoSesion() {
            $.ajax({
                url: 'actualizar_sesion.php',
                method: 'POST'
            });
        }

        // Actualizar el estado de la sesión cada 30 segundos
        setInterval(actualizarEstadoSesion, 30000);

        window.addEventListener('beforeunload', function (e) {
            // Enviar una última actualización al servidor antes de cerrar la pestaña
            actualizarEstadoSesion();
        });
    </script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>
