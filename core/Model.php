<?php

require_once __DIR__ . '/../config/database.php';

class Model {

    protected $db;
    protected $table = '';

    public function __construct() {
        $this->db = Database::connect();
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function insert($data) {

        $keys = implode(",", array_keys($data));
        $values = implode(",", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO {$this->table} ($keys) VALUES ($values)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array_values($data));
        return (int)$this->db->lastInsertId();
    }

    public function update($id, $data) {

        $fields = "";
        $values = [];

        foreach ($data as $k => $v) {
            $fields .= "$k=?,";
            $values[] = $v;
        }

        $fields = rtrim($fields, ",");
        $values[] = $id;

        $stmt = $this->db->prepare("UPDATE {$this->table} SET $fields WHERE id=?");
        return $stmt->execute($values);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id=?");
        return $stmt->execute([$id]);
    }

    //PAGINATION PRO
    public function paginate($page = 1, $perPage = 5) {

        $offset = ($page - 1) * $perPage;

        $stmt = $this->db->query("SELECT * FROM {$this->table} LIMIT $perPage OFFSET $offset");
        $data = $stmt->fetchAll();

        $stmt2 = $this->db->query("SELECT COUNT(*) as t FROM {$this->table}");
        $total = (int)($stmt2->fetch()['t'] ?? 0);

        return [
            "data" => $data,
            "pages" => ceil($total / $perPage)
        ];
    }
}