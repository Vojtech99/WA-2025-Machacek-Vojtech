<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function existsByUsername($username) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch() !== false;
    }

    public function register($username, $email, $password_hash, $name = null, $surname = null) {
        $stmt = $this->db->prepare("
            INSERT INTO users (username, email, password_hash, name, surname)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$username, $email, $password_hash, $name, $surname]);
    }

    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT id, username, email, role, name, surname, created_at FROM users ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
