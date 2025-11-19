<?php

class CalendarController
{
    public function index()
    {
        $year  = isset($_GET['year'])  ? (int)$_GET['year']  : (int)date('Y');
        $month = isset($_GET['month']) ? (int)$_GET['month'] : (int)date('m');

        
        if ($month < 1) {
            $month = 12;
            $year--;
        } elseif ($month > 12) {
            $month = 1;
            $year++;
        }

        $eventsMonth = Event::byMonth($year, $month);
        $eventsByDay = [];

        foreach ($eventsMonth as $event) {
            $day = (int)date('j', strtotime($event['event_date']));
            if (!isset($eventsByDay[$day])) {
                $eventsByDay[$day] = [];
            }
            $eventsByDay[$day][] = $event;
        }

        $data = [
            'year'        => $year,
            'month'       => $month,
            'eventsByDay' => $eventsByDay,
        ];

        require __DIR__ . '/../views/calendar/index.php';
    }

    public function store()
    {
        if (!empty($_POST['title']) && !empty($_POST['event_date'])) {
            $description = $_POST['description'] ?? null;
            $time        = $_POST['event_time'] ?? null;

            Event::create(
                $_POST['title'],
                $description,
                $_POST['event_date'],
                $time ?: null
            );
        }

        
        $year  = $_GET['year']  ?? date('Y');
        $month = $_GET['month'] ?? date('m');

        header("Location: index.php?controller=calendar&action=index&year={$year}&month={$month}");
        exit;
    }

    public function destroy()
    {
        if (!empty($_GET['id'])) {
            Event::delete((int)$_GET['id']);
        }

        $year  = $_GET['year']  ?? date('Y');
        $month = $_GET['month'] ?? date('m');

        header("Location: index.php?controller=calendar&action=index&year={$year}&month={$month}");
        exit;
    }
}
