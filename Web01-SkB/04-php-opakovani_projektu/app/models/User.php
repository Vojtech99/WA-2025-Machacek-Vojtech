<?php

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createUser($username, $email, $name, $surname, $password_hash) {
        $sql = "INSERT INTO users (username, email, name, surname, password_hash, role) 
                VALUES (?, ?, ?, ?, ?, 'user')";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username, $email, $name, $surname, $password_hash]);
    }
}
