<?php

class Middleware
{
    // Protect a page (and optionally require a role).
    public static function auth($role = null)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /auth/login");
            exit;
        }

        if ($role && ($_SESSION['user']['role'] ?? null) !== $role) {
            http_response_code(403);
            die("Access denied");
        }
    }
}

