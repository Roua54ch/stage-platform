<?php
require_once __DIR__ . "/../core/Model.php";

class Offre extends Model {
    protected $table = 'offres';

    public function all() {
        $stmt = $this->db->query("SELECT * FROM offres ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function getByEntreprise($entreprise_id) {
        $stmt = $this->db->prepare("SELECT * FROM offres WHERE entreprise_id=? ORDER BY id DESC");
        $stmt->execute([$entreprise_id]);
        return $stmt->fetchAll();
    }

    public function countByEntreprise($entreprise_id) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM offres WHERE entreprise_id=?");
        $stmt->execute([$entreprise_id]);
        return (int)$stmt->fetchColumn();
    }

    public function create($data) {
        return $this->insert($data);
    }
}