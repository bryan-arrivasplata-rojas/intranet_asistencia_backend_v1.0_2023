var height=null;
var navbarHeight = document.querySelector('.navbar');
if(navbarHeight){
    height = navbarHeight.offsetHeight;
    // Ajustar la posición del sidebar según la altura del navbar
    var sidebar = document.querySelector('.app');
    sidebar.style.marginTop = height + 'px';
}
if($('.app').length>0){
    var session_auto = $("#session_auto").text();
    let inactivityTimeout;

    function resetInactivityTimer() {
        clearTimeout(inactivityTimeout);
        inactivityTimeout = setTimeout(function () {
            // Realiza el cierre de sesión cuando se detecta inactividad
            window.location.reload(); // Ajusta la URL de cierre de sesión según tu configuración
        }, session_auto*1000); // 5000 milisegundos (5 segundos) de inactividad antes del cierre de sesión
    }

    // Detecta eventos de actividad del usuario (por ejemplo, clics y pulsaciones de teclas)
    document.addEventListener('click', resetInactivityTimer);
    document.addEventListener('keypress', resetInactivityTimer);
    document.addEventListener('mousemove', resetInactivityTimer);

    // Inicia el temporizador de inactividad al cargar la página
    resetInactivityTimer();
}