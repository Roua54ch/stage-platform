<?php
class Database {
    private static $host = "localhost";
    private static $dbname = "stage_db";
    private static $user = "stage_user";
    private static $pass = "stage_pass";

    public static function connect() {
        try {
            $pdo = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8mb4",
                self::$user,
                self::$pass
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            die("DB Error: " . $e->getMessage());
        }
    }
}