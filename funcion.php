<?php
function isMobileDevice() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobileAgents = array(
        'iphone', 'ipad', 'ipod', 'android', 'blackberry', 'windows phone', 'mobile', 'opera mini', 'iemobile'
    );

    // Convertir el user agent a minúsculas para comparación
    $userAgent = strtolower($userAgent);

    // Depuración: Mostrar el user agent
    echo "User-Agent en isMobileDevice: " . $userAgent . "<br>";

    // Buscar en el user agent las cadenas que indican un dispositivo móvil
    foreach ($mobileAgents as $agent) {
        if (strpos($userAgent, $agent) !== false) {
            return true;
        }
    }
    return false;
}
?>
