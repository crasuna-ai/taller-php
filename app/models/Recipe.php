<?php

class Recipe
{
    public static function all(): array
    {
        $db = Database::getConnection();
        $stmt = $db->query("
            SELECT *
            FROM recipes
            ORDER BY created_at DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(
        string $title,
        string $category,
        string $difficulty,
        int $prepTime,
        string $ingredients,
        string $instructions
    ): void {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            INSERT INTO recipes (title, category, difficulty, prep_time_minutes, ingredients, instructions)
            VALUES (:title, :category, :difficulty, :prep_time_minutes, :ingredients, :instructions)
        ");

        $stmt->execute([
            'title'              => $title,
            'category'           => $category,
            'difficulty'         => $difficulty,
            'prep_time_minutes'  => $prepTime,
            'ingredients'        => $ingredients,
            'instructions'       => $instructions,
        ]);
    }

    public static function delete(int $id): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM recipes WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
