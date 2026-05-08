<?php

require_once "../core/Model.php";

class Stats extends Model {

    public function users() {
        return $this->db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    }

    public function offres() {
        return $this->db->query("SELECT COUNT(*) FROM offres")->fetchColumn();
    }

    public function candidatures() {
        return $this->db->query("SELECT COUNT(*) FROM candidatures")->fetchColumn();
    }
}