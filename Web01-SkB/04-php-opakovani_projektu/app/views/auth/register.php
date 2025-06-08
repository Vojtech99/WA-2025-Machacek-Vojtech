<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Registrace</title>
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


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Registrace uživatele</h2>
                </div>
                <div class="card-body">
                    <form action="../../controllers/user_register.php" method="post">
                        <div class="mb-3">
                            <label>Uživatelské jméno:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>E-mail (nepovinný):</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Jméno (nepovinné):</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Příjmení (nepovinné):</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Heslo:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Potvrzení hesla:</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Registrovat se</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
