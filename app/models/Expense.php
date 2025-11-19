<?php

class Expense
{
    public static function all(): array
    {
        $db = Database::getConnection();
        $stmt = $db->query("
            SELECT * 
            FROM expenses
            ORDER BY expense_date DESC, created_at DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(string $description, float $amount, string $category, string $expenseDate): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            INSERT INTO expenses (description, amount, category, expense_date)
            VALUES (:description, :amount, :category, :expense_date)
        ");

        $stmt->execute([
            'description'  => $description,
            'amount'       => $amount,
            'category'     => $category,
            'expense_date' => $expenseDate,
        ]);
    }

    public static function delete(int $id): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM expenses WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public static function totalAmount(): float
    {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT COALESCE(SUM(amount), 0) AS total FROM expenses");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (float) $row['total'];
    }
}
