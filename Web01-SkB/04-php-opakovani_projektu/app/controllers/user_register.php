<?php

require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/User.php';

$pdo = (new Database())->getConnection();
$userModel = new User($pdo);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"] ?? null;
    $name = $_POST["first_name"] ?? null;
    $surname = $_POST["last_name"] ?? null;
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($password !== $confirmPassword) {
        die("Hesla se neshodují.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Uloží uživatele do DB s výchozí rolí 'user'
    $userModel->createUser($username, $email, $name, $surname, $hashedPassword);

    // Přesměrování na přihlášení
    header("Location: ../views/auth/login.php");
    exit;
}
