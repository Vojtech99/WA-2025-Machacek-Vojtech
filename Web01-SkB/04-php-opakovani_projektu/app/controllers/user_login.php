<?php
session_start();

require_once '../models/Database.php';
require_once '../models/User.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    $db = (new Database())->getConnection();
    $userModel = new User($db);
    $user = $userModel->getByUsername($username);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username']
        ];
        header("Location: ../views/games/game_list.php");
        exit();
    } else {
        echo "Neplatné přihlašovací údaje.";
    }
}
