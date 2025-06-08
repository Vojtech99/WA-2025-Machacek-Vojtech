<?php
session_start();
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Comment.php';

if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Nepovolený přístup.');
}

$gameId = $_POST['game_id'] ?? null;
$content = trim($_POST['content'] ?? '');

if (!$gameId || !$content) {
    header("Location: game_detail.php?id=" . urlencode($gameId));
    exit;
}

$db = new Database();
$pdo = $db->getConnection();
$comment = new Comment($pdo);
$comment->create($gameId, $_SESSION['user_id'], $content);

header("Location: game_detail.php?id=" . urlencode($gameId));
exit;
