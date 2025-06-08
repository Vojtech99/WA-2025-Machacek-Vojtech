<?php
    require_once '../models/Database.php';
    require_once '../models/Game.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST['id'];
        $title = htmlspecialchars($_POST['title']);
        $developer = htmlspecialchars($_POST['developer']);
        $genre = htmlspecialchars($_POST['genre']);
        $platform = htmlspecialchars($_POST['platform']);
        $year = intval($_POST['year']);
        $price = floatval($_POST['price']);
        $pegi = htmlspecialchars($_POST['pegi']);
        $description = htmlspecialchars($_POST['description']);
        $link = htmlspecialchars($_POST['link']);

        $db = (new Database())->getConnection();
        $gameModel = new Game($db);

        $success = $gameModel->update(
            $id,
            $title,
            $developer,
            $genre,
            $platform,
            $year,
            $price,
            $pegi,
            $description,
            $link
            
        );

        if ($success) {
            header("Location: ../views/games/games_edit_delete.php");
            exit();
        } else {
            echo "Chyba při aktualizaci hry.";
        }
    } else {
        echo "Neplatný požadavek.";
    }