<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Přihlášení</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Herní databáze</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../games/game_create.php">Přidat hru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../games/game_list.php">Výpis her</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../auth/register.php">Registrace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../auth/login.php">Přihlášení</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../games/games_edit_delete.php">Edit a mazání</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>


    <h2 class="text-center">Přihlášení</h2>
    <form action="../../controllers/user_login.php" method="post">
        <div class="mb-3">
            <label>Uživatelské jméno:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Heslo:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Přihlásit se</button>
    </form>
</div>
</body>
</html>
