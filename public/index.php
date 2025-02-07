<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once __DIR__ . '/../app/Controllers/TipController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';

$request = $_SERVER['REQUEST_URI'];

// Remove query string parameters.
if (strpos($request, '?') !== false) {
    $request = strstr($request, '?', true);
}

$tipController = new TipController();
$authController = new AuthController();

if ($request == '/' || $request == '/index.php') {
    $tipController->home();
} elseif ($request == '/login') {
    $authController->login();
} elseif ($request == '/register') {
    $authController->register();
} elseif ($request == '/logout') {
    $authController->logout();
} elseif (preg_match('/^\/tip\/([0-9]+)$/', $request, $matches)) {
    $_GET['id'] = $matches[1];
    $tipController->showTip($matches[1]);
} else {
    http_response_code(404);
    echo "<h1>404 - Page Not Found</h1>";
}
?>
