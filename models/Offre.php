<?php
require_once __DIR__ . "/../../core/Model.php";

class Offre extends Model {

    public function all() {
        return $this->db->query("SELECT * FROM offres")->fetchAll(PDO::FETCH_ASSOC);
    }
}