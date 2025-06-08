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
    <title>Seznam uživatelů</title>
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
                                <a class="nav-link active" href="../controllers/user_list.php">Přehled uživatelů</a>
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
        <h1>Seznam uživatelů</h1>
        <?php if (!empty($users)): ?>
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Jméno</th>
                        <th>Příjmení</th>
                        <th>Vytvořen</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['surname']) ?></td>
                        <td><?= htmlspecialchars($user['created_at']) ?></td>
                        <td>
    <?php
    $isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    $isUserAdmin = $user['role'] === 'admin';
    $isSelf = isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user['id'];
    ?>

    <?php if ($isAdmin && !$isUserAdmin && !$isSelf): ?>
        <a href="../../app/controllers/user_delete.php?id=<?= $user['id'] ?>" 
           class="btn-action btn-danger" 
           onclick="return confirm('Opravdu smazat uživatele?');">Smazat</a>
    <?php elseif ($isUserAdmin): ?>
        <span class="info-text">Admin nelze smazat</span>
    <?php else: ?>
        <span class="info-text">Bez oprávnění</span>
    <?php endif; ?>
</td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Žádní uživatelé nebyli nalezeni.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
