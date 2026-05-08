
<?php
class Middleware {
    public static function auth($role = null) {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if ($role && $_SESSION['user']['role'] !== $role) {
            die("Access denied");
        }
    }
}