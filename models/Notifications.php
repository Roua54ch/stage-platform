<?php

require_once "../core/Model.php";

class Notification extends Model {

    public function getByUser($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM notifications WHERE user_id=? ORDER BY id DESC LIMIT 5");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countUnread($user_id) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM notifications WHERE user_id=? AND is_read=0");
        $stmt->execute([$user_id]);
        return $stmt->fetchColumn();
    }

    public function create($user_id, $message) {
        $stmt = $this->db->prepare("INSERT INTO notifications(user_id, message) VALUES(?, ?)");
        $stmt->execute([$user_id, $message]);
    }

    public function markAllRead($user_id) {
        $stmt = $this->db->prepare("UPDATE notifications SET is_read=1 WHERE user_id=?");
        $stmt->execute([$user_id]);
    }
}