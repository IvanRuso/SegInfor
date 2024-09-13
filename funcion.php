<?php
function isMobileDevice() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobileAgents = array(
        'iphone', 'ipad', 'ipod', 'android', 'blackberry', 'windows phone', 'mobile', 'opera mini', 'iemobile'
    );

    // Convertir el user agent a minúsculas para comparación
    $userAgent = strtolower($userAgent);

    // Buscar en el user agent las cadenas que indican un dispositivo móvil
    foreach ($mobileAgents as $agent) {
        if (strpos($userAgent, $agent) !== false) {
            return true;
        }
    }
    return false;
}



// prueba del software
if (isMobileDevice()) {
    // Muestra el contenido si es un dispositivo móvil
    echo '<h1>Bienvenido a la versión móvil del sitio</h1>';
    // Aquí puedes colocar el contenido que deseas mostrar en dispositivos móviles
} else {
	echo '<h1> NO puedes pasar</h1>';

?>
