<?php

class Comment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($gameId, $userId, $content)
    {
        $stmt = $this->pdo->prepare("INSERT INTO comments (game_id, user_id, content) VALUES (?, ?, ?)");
        $stmt->execute([$gameId, $userId, $content]);
    }

    public function getByGame($gameId)
{
    $stmt = $this->pdo->prepare("SELECT c.id, c.content, c.created_at, c.user_id, u.username 
                                 FROM comments c
                                 JOIN users u ON c.user_id = u.id
                                 WHERE c.game_id = ?
                                 ORDER BY c.created_at DESC");
    $stmt->execute([$gameId]);
    return $stmt->fetchAll();
}

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
}
