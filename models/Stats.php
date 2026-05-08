<?php

require_once __DIR__ . "/../core/Model.php";

class Stats extends Model {

    /**
     * Total users in the platform.
     *
     * @return int
     */
    public function users() {
        return (int)$this->db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    }

    /**
     * Total offers in the platform.
     *
     * @return int
     */
    public function offres() {
        return (int)$this->db->query("SELECT COUNT(*) FROM offres")->fetchColumn();
    }

    /**
     * Total candidatures in the platform.
     *
     * @return int
     */
    public function candidatures() {
        return (int)$this->db->query("SELECT COUNT(*) FROM candidatures")->fetchColumn();
    }
}