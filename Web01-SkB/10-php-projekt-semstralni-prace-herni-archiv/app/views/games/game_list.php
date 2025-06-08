<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat hru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
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
                            <a class="nav-link active" href="#">Výpis her</a>
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
       
         <?php if(!empty($games)): ?>
            <h3>Tabulkový výpis her</h3>
            <table class="table-custom">
                <thead>
                    <tr>
                    <th>Název</th>
                    <th>Vývojář</th>
                    <th>Žánr</th>
                    <th>Platforma</th>
                    <th>Rok</th>
                    <th>Cena</th>
                    <th>PEGI</th>
                    <th>Detail</th> 

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($games as $game): ?>
                        <tr>
                        <td><?= htmlspecialchars($game['title']) ?></td>
                        <td><?= htmlspecialchars($game['developer']) ?></td>
                        <td><?= htmlspecialchars($game['genre']) ?></td>
                        <td><?= htmlspecialchars($game['platform']) ?></td>
                        <td><?= htmlspecialchars($game['year']) ?></td>
                        <td><?= number_format($game['price'], 2, ',', ' ') ?> Kč</td>
                        <td><?= htmlspecialchars($game['pegi']) ?></td>
                        <td><a href="../../app/controllers/game_detail.php?id=<?= $game['id'] ?>">Detail</a>

                        </a>

                        </td>

                        </tr>    
                    <?php endforeach; ?>    
                </tbody>


            </table>
         <?php else: ?>
            <div class="alert alert-info">Žádná hra nebyla nalezena</div>
         <?php endif;?>   
         
             
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>