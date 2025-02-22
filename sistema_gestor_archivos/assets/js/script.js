document.getElementById("btn__registrarse").addEventListener("click", register);
document.getElementById("btn__iniciar-sesion").addEventListener("click", login);
window.addEventListener("resize", anchoPagina);

//Declaracion de variables

var container_login_register = document.querySelector(".container__login__register");
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var caja_trasera_login = document.querySelector(".caja__trasera__login");
var caja_trasera_register = document.querySelector(".caja__trasera__register");

function anchoPagina() {
    if (window.innerWidth > 850) {
        caja_trasera_login.style.display = "block";
        caja_trasera_register.style.display = "block";
    } else {
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_register.style.display = "none";
        container_login_register.style.left = "0";
    }
}

anchoPagina();

function login() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "none";
        container_login_register.style.left = "10px";
        formulario_login.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "1";
    } else {
        formulario_register.style.display = "none";
        container_login_register.style.left = "0px";
        formulario_login.style.display = "block";
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

function register() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "block";
        container_login_register.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "1";
    } else {
        formulario_register.style.display = "block";
        container_login_register.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
    }

}

 // Marcar que la sesión está activa al cargar la página
 sessionStorage.setItem('sessionActive', 'true');

 // Registrar evento antes de que la página se cierre o recargue
 window.addEventListener('beforeunload', function (e) {
     if (!navigator.sendBeacon) {
         // Si navigator.sendBeacon no está disponible, no hacer nada
         return;
     }

     // Comprobar si la bandera de sesión está activa
     if (sessionStorage.getItem('sessionActive') === 'true') {
         // Eliminar la bandera antes de cerrar el navegador
         sessionStorage.removeItem('sessionActive');

         // Enviar señal de cierre de sesión
         navigator.sendBeacon('logout.php');
     }
 });
            


