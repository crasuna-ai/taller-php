<?php


require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Database.php';

// Controladores
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/TaskController.php';
require_once __DIR__ . '/../app/controllers/TipController.php';
require_once __DIR__ . '/../app/controllers/PasswordController.php';
require_once __DIR__ . '/../app/controllers/StopwatchController.php';
require_once __DIR__ . '/../app/controllers/ExpenseController.php';
require_once __DIR__ . '/../app/controllers/BookingController.php';
require_once __DIR__ . '/../app/controllers/NotesController.php';
require_once __DIR__ . '/../app/controllers/CalendarController.php';
require_once __DIR__ . '/../app/controllers/RecipesController.php';
require_once __DIR__ . '/../app/controllers/MemoryGameController.php';

// Modelos
require_once __DIR__ . '/../app/models/Task.php';
require_once __DIR__ . '/../app/models/Expense.php';
require_once __DIR__ . '/../app/models/Booking.php';
require_once __DIR__ . '/../app/models/Note.php';
require_once __DIR__ . '/../app/models/Event.php';
require_once __DIR__ . '/../app/models/Recipe.php';


$router = new Router();
$router->run();
