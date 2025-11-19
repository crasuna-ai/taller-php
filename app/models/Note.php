<?php

class Note
{
    public static function all(): array
    {
        $db = Database::getConnection();
        $stmt = $db->query("
            SELECT *
            FROM notes
            ORDER BY created_at DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(string $title, string $content): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            INSERT INTO notes (title, content)
            VALUES (:title, :content)
        ");

        $stmt->execute([
            'title'   => $title,
            'content' => $content,
        ]);
    }

    public static function delete(int $id): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM notes WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
