<?php

class Game {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($title, $developer, $genre, $platform, $release_year, $price, $pegi, $description, $link, $images) {
        $sql = "INSERT INTO games (title, developer, genre, platform, release_year, price, pegi, description, link, images) 
                VALUES (:title, :developer, :genre, :platform, :release_year, :price, :pegi, :description, :link, :images)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':title' => $title,
            ':developer' => $developer,
            ':genre' => $genre,
            ':platform' => $platform ?: null,
            ':release_year' => $release_year,
            ':price' => $price,
            ':pegi' => $pegi,
            ':description' => $description,
            ':link' => $link,
            ':images' => json_encode($images)
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM games ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
