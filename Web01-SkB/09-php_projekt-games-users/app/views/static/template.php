<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']); 
?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars($pageTitle ?? 'Moje stránka') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
            <a class="nav-link <?= $currentPage === 'home.php' ? 'active' : '' ?>" href="home.php">Domů</a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?= $currentPage === 'about.php' ? 'active' : '' ?>" href="about.php">O nás</a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?= $currentPage === 'blog.php' ? 'active' : '' ?>" href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?= $currentPage === 'contact.php' ? 'active' : '' ?>" href="contact.php">Kontakt</a>
            </li>

           
                <li class="nav-item"><a class="nav-link" href="../../views/games/game_create.php">Přidat hru</a> </li>
                <li class="nav-item"><a class="nav-link" href="../../controllers/game_list.php">Výpis her</a> </li>
                
                <?php if (isset($_SESSION['username'])): ?>
                <li class="nav-item"><a class="nav-link" href="../../views/games/games_edit_delete.php">Editace a mazání</a> </li>
                <li class="nav-item"><a class="nav-link" href="../../controllers/user_list.php">Přehled uživatelů</a> </li>
                <?php endif; ?>
                </ul>
                
                <ul class="navbar-nav ms-auto">
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <span class="nav-link text-white">Přihlášen jako: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../controllers/logout.php">Odhlásit se</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="../../views/auth/register.php">Registrace</a> </li>
                            <li class="nav-item"><a class="nav-link" href="../../views/auth/login.php">Přihlášení</a> </li>
                            
                        <?php endif; ?>
                    </ul>




            
        </div>
    </div>
</nav>
<div class="container">
    <?= $pageContent ?? '' ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
