<?php
session_start();

require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/User.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../views/auth/login.php');
    exit();
}

$db = new Database();
$pdo = $db->getConnection();
$userModel = new User($pdo);

$users = $userModel->getAll();

require_once __DIR__ . '/../views/users/user_list.php';
