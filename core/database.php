<?php

class Database {

    private $pdo;

    public function __construct() {

        $config = require "../config/config.php";

        $this->pdo = new PDO(
            "mysql:host=".$config['db']['host'].";dbname=".$config['db']['name'],
            $config['db']['user'],
            $config['db']['pass']
        );

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}