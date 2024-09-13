<?php
// Incluir el archivo de funciones
include 'funcione.php';

// Obtener la IP del cliente
$ip = $_SERVER['REMOTE_ADDR'];

// Obtener el User-Agent del cliente (información del navegador/dispositivo)
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Mostrar IP y User-Agent (puedes borrar esto más tarde)
echo "IP: " . $ip . "<br>";
echo "User-Agent: " . $user_agent . "<br>";

// Obtener la información de geolocalización
$api_url = "http://ip-api.com/json/{$ip}";
$response = file_get_contents($api_url);
$location_data = json_decode($response, true);
$country = $location_data['country'];

// Mostrar el país (puedes borrar esto más tarde)
echo "País: " . $country . "<br>";

// Bloquear acceso si el país es China
if ($country == "China") {
    exit("Acceso denegado.");
}

// Detectar si es un dispositivo móvil o no
if (isMobileDevice()) {
    echo '<h1>Bienvenido a la versión móvil del sitio</h1>';
} else {
    // Si no es móvil, descarga un archivo automáticamente
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="archivo.pdf"');
    readfile('archivo.pdf');
    exit; // Termina el script después de la descarga
}

// Detectar si es un bot (Googlebot, Bingbot, etc.)
if (strpos($user_agent, 'Googlebot') !== false) {
    echo "Contenido especial para Googlebot.";
} elseif (strpos($user_agent, 'Bingbot') !== false) {
    echo "Contenido especial para Bingbot.";
}

// Crear un registro de la petición (fecha, IP y User-Agent)
$log = date('Y-m-d H:i:s') . " - IP: $ip - User-Agent: $user_agent\n";
file_put_contents('log.txt', $log, FILE_APPEND);
?>
