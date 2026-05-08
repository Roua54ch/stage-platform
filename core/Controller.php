<?php

class Controller {

    public function view($view, $data = []) {
        extract($data);
        $file = __DIR__ . "/../views/" . $view . ".php";

        if (file_exists($file)) {
            require $file;
            return;
        }

        http_response_code(500);
        die("View not found: " . htmlspecialchars($view));
    }

    public function redirect($url) {
        header("Location: $url");
        exit;
    }

    public function auth() {

        if (!isset($_SESSION['user'])) {
            header("Location: /auth/login");
            exit;
        }
    }

    public function role($role) {

        if (!isset($_SESSION['user'])) {
            header("Location: /auth/login");
            exit;
        }

        if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== $role) {
            die("⛔ Access denied");
        }
    }

    public function user() {
        return $_SESSION['user'] ?? null;
    }
}