<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../controllers/game_list.php");
    exit();
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
                    <li class="nav-item"><a class="nav-link" href="../../views/static/home.php">Domů</a> </li>
                    <li class="nav-item"><a class="nav-link" href="../../views/static/about.php">O nás</a> </li>
                    <li class="nav-item"><a class="nav-link" href="../../views/static/blog.php">Blog</a> </li>
                    <li class="nav-item"><a class="nav-link" href="../../views/static/contact.php">Kontakt</a> </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../../views/games/game_create.php">Přidat hru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/game_list.php">Výpis her</a>
                        </li>
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../games/games_edit_delete.php">Editace a mazání</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../../controllers/user_list.php">Přehled uživatelů</a>
                            </li>
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="page-header">
                        
                        <h2>Přidat novou hru</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-container">
                        <form action="../../controllers/GameController.php" method="post" enctype="multipart/form-data">
                            
                        <div class="mb-3">
                            <label for="title" class="form-label">Název hry: <span class="text-danger">*</span></label>
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="developer" class="form-label">Vývojář: <span class="text-danger">*</span></label>
                            <input type="text" id="developer" name="developer" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="genre" class="form-label">Žánr:</label>
                            <input type="text" id="genre" name="genre" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="platform" class="form-label">Platforma:</label>
                            <input type="text" id="platform" name="platform" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Rok vydání: <span class="text-danger">*</span></label>
                            <input type="number" id="year" name="year" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Cena: <span class="text-danger">*</span></label>
                            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="pegi" class="form-label">PEGI věkové hodnocení: <span class="text-danger">*</span></label>
                            <input type="number" id="pegi" name="pegi" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Popis:</label>
                            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="link" class="form-label">Odkaz:</label>
                            <input type="url" id="link" name="link" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="images" class="form-label">Obrázky (můžete nahrát více):</label>
                            <input type="file" id="images" name="images[]" class="form-control" multiple accept="image/*">
                        </div>


                        <button type="submit" class="btn-submit btn-lg w-100">Uložit hru</button>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>