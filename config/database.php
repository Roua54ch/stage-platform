<?php
class Database {
    private static $host = "localhost";
    private static $dbname = "stage_db";
    private static $user = "root";
    private static $pass = "";

    public static function connect() {
        try {
            return new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$dbname,
                self::$user,
                self::$pass
            );
        } catch (PDOException $e) {
            die("DB Error: " . $e->getMessage());
        }
    }
}