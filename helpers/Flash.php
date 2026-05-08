<?php

class Flash {

    public static function set($key, $message) {

        $_SESSION[$key] = $message;
    }

    public static function get($key) {

        if (isset($_SESSION[$key])) {

            $message = $_SESSION[$key];

            unset($_SESSION[$key]);

            return $message;
        }

        return null;
    }
}