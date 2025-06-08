<?php
session_start();
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Game.php';
require_once __DIR__ . '/../models/Comment.php';

$db = new Database();
$pdo = $db->getConnection();

$gameModel = new Game($pdo);
$commentModel = new Comment($pdo);

if (!isset($_GET['id'])) {
    die('Chybí ID hry.');
}

$gameId = $_GET['id'];
$game = $gameModel->getById($gameId);

if (!$game) {
    die('Hra nenalezena.');
}

$comments = $commentModel->getByGame($gameId);

require_once __DIR__ . '/../views/games/game_detail.php';
