<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../index.php'); 
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: ../../app/controllers/user_list.php');
    exit();
}

require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/User.php';

$id = (int)$_GET['id'];

$db = new Database();
$pdo = $db->getConnection();
$userModel = new User($pdo);

$userModel->delete($id);

header('Location: ../../app/controllers/user_list.php');
exit();

