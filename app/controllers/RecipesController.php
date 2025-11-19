<?php

class RecipesController
{
    public function index()
    {
        $recipes = Recipe::all();

        $data = [
            'recipes' => $recipes,
        ];

        require __DIR__ . '/../views/recipes/index.php';
    }

    public function store()
    {
        if (
            !empty($_POST['title']) &&
            !empty($_POST['category']) &&
            !empty($_POST['difficulty']) &&
            !empty($_POST['prep_time']) &&
            !empty($_POST['ingredients']) &&
            !empty($_POST['instructions'])
        ) {
            Recipe::create(
                $_POST['title'],
                $_POST['category'],
                $_POST['difficulty'],
                (int) $_POST['prep_time'],
                $_POST['ingredients'],
                $_POST['instructions']
            );
        }

        header('Location: index.php?controller=recipes&action=index');
        exit;
    }

    public function destroy()
    {
        if (!empty($_GET['id'])) {
            Recipe::delete((int)$_GET['id']);
        }

        header('Location: index.php?controller=recipes&action=index');
        exit;
    }
}
