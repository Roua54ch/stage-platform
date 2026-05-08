<?php

class Controller {

        // 📄 Load View
    public function view($view, $data = []) {
        extract($data);
        require __DIR__ . "/../app/views/" . $view . ".php";

        if (file_exists($file)) {
            require $file;
        } else {
            die("View not found: " . $data);
        }
    }

    // 🔁 Redirect
    public function redirect($url) {
        header("Location: $url");
        exit;
    }

    // 🔐 Check login
    public function auth() {

        if (!isset($_SESSION['user'])) {
            header("Location: /auth/login");
            exit;
        }
    }

    // 👮 Role protection (SAFE VERSION)
    public function role($role) {

        if (!isset($_SESSION['user'])) {
            header("Location: /auth/login");
            exit;
        }

        if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== $role) {
            die("⛔ Access denied");
        }
    }

    // 👤 Get current user
    public function user() {
        return $_SESSION['user'] ?? null;
    }
}