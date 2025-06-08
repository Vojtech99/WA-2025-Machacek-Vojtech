<?php

class Game {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($title, $developer, $genre, $platform, $year, $price, $pegi, $description, $link, $images, $user_id) {

        $sql = "INSERT INTO games (
            title, developer, genre, platform, year, price, pegi, description, link, images, user_id
        ) VALUES (
            :title, :developer, :genre, :platform, :year, :price, :pegi, :description, :link, :images, :user_id
        )";
        
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':title' => $title,
            ':developer' => $developer,
            ':genre' => $genre,
            ':platform' => $platform,
            ':year' => $year,
            ':price' => $price,
            ':pegi' => $pegi,
            ':description' => $description,
            ':link' => $link,
            ':images' => json_encode($images),
            ':user_id' => $user_id
        ]);
        
    }

    public function getAll() {
        $sql = "SELECT * FROM games ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM games WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $developer, $genre, $platform, $year, $price, $pegi, $description, $link) {
        $sql = "UPDATE games 
                SET title = :title,
                    developer = :developer,
                    genre = :genre,
                    platform = :platform,
                    year = :year,
                    price = :price,
                    pegi = :pegi,
                    description = :description,
                    link = :link
                WHERE id = :id";
    
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':developer' => $developer,
            ':genre' => $genre,
            ':platform' => $platform,
            ':year' => $year,
            ':price' => $price,
            ':pegi' => $pegi,
            ':description' => $description,
            ':link' => $link
        ]);
        
    }

    public function delete($id) {
        $sql = "DELETE FROM games WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }




}