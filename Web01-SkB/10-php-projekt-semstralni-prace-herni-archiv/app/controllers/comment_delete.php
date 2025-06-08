<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: ../../views/games/game_detail.php?id=" . urlencode($gameId));
    exit();
}
if (!isset($_GET['game_id']) || empty($_GET['game_id'])) {
    die('Chybí ID hry, nemohu přesměrovat.');
}
$gameId = (int)$_GET['game_id'];


require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Comment.php';

$commentId = (int)$_GET['id'];

$db = new Database();
$pdo = $db->getConnection();
$commentModel = new Comment($pdo);

$comment = $commentModel->getById($commentId);

$role = $_SESSION['role'] ?? '';
$userId = $_SESSION['user_id'] ?? null;

if (!$comment || ($comment['user_id'] != $userId && $role !== 'admin')) {
    die('Nemáš oprávnění smazat tento komentář.');
}

$commentModel->delete($commentId);

header("Location: ../controllers/game_detail.php?id=" . $gameId);
exit();
