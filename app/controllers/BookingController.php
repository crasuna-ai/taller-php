<?php

class BookingController
{
    public function index()
    {
        $bookings = Booking::all();

        $data = [
            'bookings' => $bookings,
        ];

        require __DIR__ . '/../views/booking/index.php';
    }

    public function store()
    {
        if (
            !empty($_POST['client_name']) &&
            !empty($_POST['service']) &&
            !empty($_POST['booking_date']) &&
            !empty($_POST['booking_time'])
        ) {
            $notes = $_POST['notes'] ?? null;

            Booking::create(
                $_POST['client_name'],
                $_POST['service'],
                $_POST['booking_date'],
                $_POST['booking_time'],
                $notes
            );
        }

        header('Location: index.php?controller=booking&action=index');
        exit;
    }

    public function destroy()
    {
        if (!empty($_GET['id'])) {
            Booking::delete((int)$_GET['id']);
        }

        header('Location: index.php?controller=booking&action=index');
        exit;
    }
}
