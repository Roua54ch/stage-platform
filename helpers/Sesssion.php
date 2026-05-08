<?php

class Session {

    // 🚀 Start session safely
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // 👤 Set user session
    public static function setUser($user) {
        self::start();
        $_SESSION['user'] = $user;
    }

    // 👤 Get user session
    public static function getUser() {
        self::start();
        return $_SESSION['user'] ?? null;
    }

    // 🔐 Check if user logged in
    public static function isLogged() {
        self::start();
        return isset($_SESSION['user']);
    }

    // 🚪 Logout
    public static function destroy() {
        self::start();
        session_unset();
        session_destroy();
    }

    // 🎯 Get user role
    public static function role() {
        self::start();
        return $_SESSION['user']['role'] ?? null;
    }

    // 👤 Get user id
    public static function id() {
        self::start();
        return $_SESSION['user']['id'] ?? null;
    }
}