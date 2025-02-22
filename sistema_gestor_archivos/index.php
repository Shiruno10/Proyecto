
<!DOCTYPE html>
<html lang="en">

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
    <main>
            
        <!--Contendor de la Web Application-->
        <div class="container__all">
            <img src="assets/image/GC.png" alt="logo1">
            <!--Cajas Traseras-->
            <div class="caja__trasera">
                <!--Caja Login-->
                <div class="caja__trasera__login">
                    <h3>Ya tienes una cuenta</h3>
                    <p>¡Incia sesión y accede al panel principal!</p>
                    <button id="btn__iniciar-sesion" class="btn">Iniciar Sesión</button>
                </div>
                <!--Caja Register-->
                <div class="caja__trasera__register">
                    <h3>¿Olvidaste tu constraseña?</h3>
                    <p>¡Solicita un código temporal para restaurarla!</p>
                    <button id="btn__registrarse" class="btn">Recuperar Contraseña</button>
                </div>
            </div>
            <!--Formulario de Loggin y Registro-->
            <div class="container__login__register">
                <!--Login-->
                <form action="php/login_user_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo Electronico" name="correo" required>
                    <input type="password" placeholder="Contraseña" name="clave" required>
                    <button>Entrar</button>
                </form>
                <!--Registro-->
                <form action="php/send_token.php"" method="POST" class="formulario__register" id="registro-form">
                    <h2>Recuperar Contraseña</h2>
                    <label for="email">*Ingresa tu correo electrónico y 
                    se te enviará un códgio temporal para acceder y restaurar la contraseña.</label>
                    <input type="email" id="email" name="email" placeholder="Ingresa un correo electrónico válido" name="correo" required minlength="12" maxlength="64">
                    <button type="submit">Enviar Código</button>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
</body>

</html>