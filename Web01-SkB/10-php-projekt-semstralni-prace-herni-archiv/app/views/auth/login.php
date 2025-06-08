<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>

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
                <li class="nav-item"><a class="nav-link" href="../../views/static/home.php">Domů</a> </li>
                    <li class="nav-item"><a class="nav-link" href="../../views/static/about.php">O nás</a> </li>
                    <li class="nav-item"><a class="nav-link" href="../../views/static/blog.php">Blog</a> </li>
                    <li class="nav-item"><a class="nav-link" href="../../views/static/contact.php">Kontakt</a> </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/games/game_create.php">Přidat hru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../controllers/game_list.php">Výpis her</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">    
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Registrace</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Přihlášení</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="page-header">
                    <h2>Přihlášení uživatele</h2>
                </div>
                <div class="card-body">
                    <div class="form-container">
                    <form action="../../controllers/login.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Uživatelské jméno:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Heslo:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn-submit btn-lg w-100">Přihlásit se</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>