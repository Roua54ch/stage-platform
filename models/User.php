<?php
require_once __DIR__ . "/../core/Model.php";

class User extends Model {
    protected $table = 'users';

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        return $stmt->fetch() ?: null;
    }

    public function create($name, $email, $password, $role) {
        $stmt = $this->db->prepare("INSERT INTO users(name,email,password,role) VALUES(?,?,?,?)");
        return $stmt->execute([
            $name,
            $email,
            password_hash($password, PASSWORD_BCRYPT),
            $role
        ]);
    }
}