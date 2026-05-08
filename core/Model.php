<?php

require_once __DIR__ . '/../config/database.php';

class Model {

    protected $db;
    protected $table;

    public function __construct() {
        $this->db = new Database();
    }

    public function all() {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function find($id) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE id=?", [$id])[0] ?? null;
    }

    public function insert($data) {

        $keys = implode(",", array_keys($data));
        $values = implode(",", array_fill(0, count($data), "?"));

        return $this->db->query(
            "INSERT INTO {$this->table} ($keys) VALUES ($values)",
            array_values($data)
        );
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

        return $this->db->query(
            "UPDATE {$this->table} SET $fields WHERE id=?",
            $values
        );
    }

    public function delete($id) {
        return $this->db->query("DELETE FROM {$this->table} WHERE id=?", [$id]);
    }

    //PAGINATION PRO
    public function paginate($page = 1, $perPage = 5) {

        $offset = ($page - 1) * $perPage;

        $data = $this->db->query(
            "SELECT * FROM {$this->table} LIMIT $perPage OFFSET $offset"
        );

        $total = $this->db->query(
            "SELECT COUNT(*) as t FROM {$this->table}"
        )[0]['t'];

        return [
            "data" => $data,
            "pages" => ceil($total / $perPage)
        ];
    }
}