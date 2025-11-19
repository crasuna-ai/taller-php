<?php

class NotesController
{
    public function index()
    {
        $notes = Note::all();

        $data = [
            'notes' => $notes,
        ];

        require __DIR__ . '/../views/notes/index.php';
    }

    public function store()
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            Note::create($_POST['title'], $_POST['content']);
        }

        header('Location: index.php?controller=notes&action=index');
        exit;
    }

    public function destroy()
    {
        if (!empty($_GET['id'])) {
            Note::delete((int)$_GET['id']);
        }

        header('Location: index.php?controller=notes&action=index');
        exit;
    }
}
