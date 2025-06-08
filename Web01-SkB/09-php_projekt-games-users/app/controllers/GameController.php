<?php
session_start();

require_once '../models/Database.php';
require_once '../models/Game.php';

class GameController {
    private $db;
    private $gameModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->gameModel = new Game($this->db);
    }

    public function createGame() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../controllers/game_list.php");
            exit();
        }

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

            $user_id = $_SESSION['user_id'];

            $imagePaths = [];
            if (!empty($_FILES['images']['name'][0])) {
                $uploadDir = '../public/images/';
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    $filename = basename($_FILES['images']['name'][$key]);
                    $targetPath = $uploadDir . $filename;

                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $imagePaths[] = '/public/images/' . $filename; 
                    }
                }
            }

            if ($this->gameModel->create(
                $title,
                $developer,
                $genre,
                $platform,
                $year,
                $price,
                $pegi,
                $description,
                $link,
                $imagePaths,
                $user_id
                
            )) {
                header("Location: ../controllers/game_list.php");
                exit();
            } else {
                echo "Chyba při ukládání hry.";
            }
        }
    }

    public function listGames () {
        $games = $this->gameModel->getAll();
        include '../views/games/game_list.php';
    }
}

$controller = new GameController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->createGame();
}
