<?php

class TaskController
{
    public function index()
    {
        $tasks = Task::all();
        require __DIR__ . '/../views/task/index.php';
    }

    public function store()
    {
        if (!empty($_POST['title'])) {
            Task::create($_POST['title']);
        }

        header('Location: index.php?controller=task&action=index');
        exit;
    }

    public function toggle()
    {
        if (!empty($_GET['id'])) {
            Task::toggle((int)$_GET['id']);
        }

        header('Location: index.php?controller=task&action=index');
        exit;
    }

    public function destroy()
    {
        if (!empty($_GET['id'])) {
            Task::delete((int)$_GET['id']);
        }

        header('Location: index.php?controller=task&action=index');
        exit;
    }
}
