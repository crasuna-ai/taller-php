<?php

class Task
{
    public static function all(): array
    {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM tasks ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(string $title): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO tasks (title) VALUES (:title)");
        $stmt->execute(['title' => $title]);
    }

    public static function toggle(int $id): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            UPDATE tasks
            SET is_completed = 1 - is_completed
            WHERE id = :id
        ");
        $stmt->execute(['id' => $id]);
    }

    public static function delete(int $id): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
