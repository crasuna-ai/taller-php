<?php

class Booking
{
    public static function all(): array
    {
        $db = Database::getConnection();
        $stmt = $db->query("
            SELECT *
            FROM bookings
            ORDER BY booking_date ASC, booking_time ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(
        string $clientName,
        string $service,
        string $bookingDate,
        string $bookingTime,
        ?string $notes
    ): void {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            INSERT INTO bookings (client_name, service, booking_date, booking_time, notes)
            VALUES (:client_name, :service, :booking_date, :booking_time, :notes)
        ");

        $stmt->execute([
            'client_name'  => $clientName,
            'service'      => $service,
            'booking_date' => $bookingDate,
            'booking_time' => $bookingTime,
            'notes'        => $notes,
        ]);
    }

    public static function delete(int $id): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM bookings WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
