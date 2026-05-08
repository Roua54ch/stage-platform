<?php

require_once "../core/Model.php";

class Candidature extends Model {

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO candidatures(user_id, offre_id, cv, status)
            VALUES(?,?,?,?)
        ");
        $stmt->execute([
            $data['user_id'],
            $data['offre_id'],
            $data['cv'],
            $data['status']
        ]);
    }

    public function getByEntreprise($entreprise_id) {
        $stmt = $this->db->prepare("
            SELECT c.*, u.name, o.titre
            FROM candidatures c
            JOIN users u ON c.user_id = u.id
            JOIN offres o ON c.offre_id = o.id
            WHERE o.entreprise_id=?
        ");
        $stmt->execute([$entreprise_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE candidatures SET status=? WHERE id=?");
        $stmt->execute([$status, $id]);
    }

    public function getEntrepriseByOffre($offre_id) {
        $stmt = $this->db->prepare("SELECT entreprise_id FROM offres WHERE id=?");
        $stmt->execute([$offre_id]);
        return $stmt->fetchColumn();
    }

    public function getUserByCandidature($id) {
        $stmt = $this->db->prepare("SELECT user_id FROM candidatures WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchColumn();
    }
}