<?php

session_start();

require_once "../config/config.php";

/* ================= AUTOLOAD ================= */
spl_autoload_register(function ($class) {

    $paths = [
        "../core/",
        "../controllers/",
        "../models/",
        "../helpers/"
    ];

    foreach ($paths as $path) {
        $file = $path . $class . ".php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

/* ================= CLEAN URL ================= */
$url = $_GET['url'] ?? 'auth/login';
$url = filter_var(trim($url, '/'), FILTER_SANITIZE_URL);
$segments = explode('/', $url);

/* ================= CONTROLLER ================= */
$controllerName = ucfirst($segments[0]) . "Controller";
$method = $segments[1] ?? "index";
$params = array_slice($segments, 2);

/* ================= FILE CHECK ================= */
$controllerPath = "../controllers/$controllerName.php";

if (!file_exists($controllerPath)) {
    http_response_code(404);
    die("❌ Controller not found: $controllerName");
}

require_once $controllerPath;

$controller = new $controllerName();

/* ================= METHOD CHECK ================= */
if (!method_exists($controller, $method)) {
    http_response_code(404);
    die("❌ Method not found: $method");
}

/* ================= EXECUTION ================= */
try {

    call_user_func_array([$controller, $method], $params);

} catch (Throwable $e) {

    http_response_code(500);

    // en dev
    echo "<h3>❌ Error:</h3>";
    echo "<pre>" . $e->getMessage() . "</pre>";

    // en prod (décommente)
    // error_log($e->getMessage());
    // echo "Something went wrong";
}