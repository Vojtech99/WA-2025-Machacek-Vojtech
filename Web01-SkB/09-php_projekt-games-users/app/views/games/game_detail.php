<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../models/Database.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Comment.php';

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
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Detail hry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/WA-2025-Machacek-Vojtech/Web01-SkB/09-php_projekt-games-users/public/css/styles.css" />
</head>
<body>
<div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
  <img src="/WA-2025-Machacek-Vojtech/Web01-SkB/09-php_projekt-games-users/public/img/logoss.png" alt="Logo Herní archiv" style="height: 50px; margin-right: 12px;">
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../views/static/home.php">Domů</a> </li>
                    <li class="nav-item"><a class="nav-link" href="../views/static/about.php">O nás</a> </li>
                    <li class="nav-item"><a class="nav-link" href="../views/static/blog.php">Blog</a> </li>
                    <li class="nav-item"><a class="nav-link" href="../views/static/contact.php">Kontakt</a> </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../views/games/game_create.php">Přidat hru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../controllers/game_list.php">Výpis her</a>
                        </li>
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../views/games/games_edit_delete.php">Editace a mazání</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../controllers/user_list.php">Přehled uživatelů</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <span class="nav-link text-white">Přihlášen jako: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../controllers/logout.php">Odhlásit se</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../views/auth/login.php">Přihlášení</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../views/auth/register.php">Registrace</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
<div class="container mt-4">
    <h2><?= htmlspecialchars($game['title']) ?></h2>
    <p><strong>Vývojář:</strong> <?= htmlspecialchars($game['developer']) ?></p>
    <p><strong>Žánr:</strong> <?= htmlspecialchars($game['genre']) ?></p>
    <p><strong>Platforma:</strong> <?= htmlspecialchars($game['platform']) ?></p>
    <p><strong>Rok:</strong> <?= htmlspecialchars($game['year']) ?></p>
    <p><strong>Cena:</strong> <?= number_format($game['price'], 2, ',', ' ') ?> Kč</p>
    <p><strong>PEGI:</strong> <?= htmlspecialchars($game['pegi']) ?></p>

    <hr>
    <h4>Komentáře:</h4>

<?php
$currentUserId = $_SESSION['user_id'] ?? null;
$isAdmin = ($_SESSION['role'] ?? '') === 'admin';
?>

<?php foreach ($comments as $comment): ?>
    <div class="border p-2 mb-2">
        <strong><?= htmlspecialchars($comment['username']) ?></strong>
        <small class="text-muted"><?= $comment['created_at'] ?></small>
        <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>

        <?php if ($isAdmin || $currentUserId == $comment['user_id']): ?>
            <?php
                $deleteUrl = "../../app/controllers/comment_delete.php?id=" . urlencode($comment['id']) . "&game_id=" . urlencode($gameId);
            ?>
            <a href="<?= $deleteUrl ?>"
               class="btn btn-sm btn-danger"
               onclick="return confirm('Opravdu chcete smazat tento komentář?');">
               Smazat
            </a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>



    <?php if (isset($_SESSION['user_id'])): ?>
        <form action="../../app/controllers/comment_create.php" method="post">

            <input type="hidden" name="game_id" value="<?= $gameId ?>">
            <div class="mb-3">
                <label for="content" class="form-label">Napiš komentář:</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div >
            <div class="mb-3">
                 <button type="submit" class="btn btn-primary">Odeslat</button>
                </div>
        </form> 
    <?php else: ?>
        Pro přidání komentáře se prosím <a href="/WA-2025-Machacek-Vojtech/Web01-SkB/08-php-projekt-games-comments/app/views/auth/login.php">přihlas</a>.</div>
    <?php endif; ?>
</div>
</body>
</html>
