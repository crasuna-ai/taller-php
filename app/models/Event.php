<?php

class Event
{
    public static function all(): array
    {
        $db = Database::getConnection();
        $stmt = $db->query("
            SELECT *
            FROM events
            ORDER BY event_date ASC, event_time ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(
        string $title,
        ?string $description,
        string $eventDate,
        ?string $eventTime
    ): void {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            INSERT INTO events (title, description, event_date, event_time)
            VALUES (:title, :description, :event_date, :event_time)
        ");

        $stmt->execute([
            'title'       => $title,
            'description' => $description,
            'event_date'  => $eventDate,
            'event_time'  => $eventTime,
        ]);
    }

    public static function delete(int $id): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM events WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public static function byMonth(int $year, int $month): array
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            SELECT *
            FROM events
            WHERE YEAR(event_date) = :year
              AND MONTH(event_date) = :month
            ORDER BY event_date ASC, event_time ASC
        ");
        $stmt->execute([
            'year'  => $year,
            'month' => $month,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
