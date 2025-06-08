<?php
session_start();
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Comment.php';

// Zamez nepřihlášenému uživateli přístup (už se nezobrazí ani formulář)
if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Nepovolený přístup.');
}

// Získání dat z formuláře
$gameId = $_POST['game_id'] ?? null;
$content = trim($_POST['content'] ?? '');

// Kontrola, že data nejsou prázdná
if (!$gameId || !$content) {
    header("Location: game_detail.php?id=" . urlencode($gameId));
    exit;
}

// Vložení komentáře do DB
$db = new Database();
$pdo = $db->getConnection();
$comment = new Comment($pdo);
$comment->create($gameId, $_SESSION['user_id'], $content);

// Přesměrování zpět na detail hry
header("Location: game_detail.php?id=" . urlencode($gameId));
exit;
