<?php
$publicDir = __DIR__ . '/public';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';

if ($uri !== '/' && file_exists($publicDir . $uri)) {
    return false;
}

$_SERVER['SCRIPT_NAME'] = '/public/index.php';
$_SERVER['SCRIPT_FILENAME'] = $publicDir . '/index.php';
$_SERVER['PHP_SELF'] = '/public/index.php' . ($uri === '/' ? '' : $uri);

require $publicDir . '/index.php';
