<?php

require_once __DIR__ . "/../core/Model.php";

class Notification extends Model
{
    protected $table = 'notifications';

    public function getByUser($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM notifications WHERE user_id=? ORDER BY id DESC LIMIT 5");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    public function countUnread($user_id) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM notifications WHERE user_id=? AND is_read=0");
        $stmt->execute([$user_id]);
        return (int)$stmt->fetchColumn();
    }

    public function create($user_id, $message) {
        $stmt = $this->db->prepare("INSERT INTO notifications(user_id, message) VALUES(?, ?)");
        $stmt->execute([$user_id, $message]);
        return (int)$this->db->lastInsertId();
    }

    public function markAllRead($user_id) {
        $stmt = $this->db->prepare("UPDATE notifications SET is_read=1 WHERE user_id=?");
        return $stmt->execute([$user_id]);
    }
}

