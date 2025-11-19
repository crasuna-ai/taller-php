<?php

class ExpenseController
{
    public function index()
    {
        $expenses = Expense::all();
        $total    = Expense::totalAmount();

        $data = [
            'expenses' => $expenses,
            'total'    => $total,
        ];

        require __DIR__ . '/../views/expense/index.php';
    }

    public function store()
    {
        if (
            !empty($_POST['description']) &&
            !empty($_POST['amount']) &&
            !empty($_POST['category']) &&
            !empty($_POST['expense_date'])
        ) {
            Expense::create(
                $_POST['description'],
                (float) $_POST['amount'],
                $_POST['category'],
                $_POST['expense_date']
            );
        }

        header('Location: index.php?controller=expense&action=index');
        exit;
    }

    public function destroy()
    {
        if (!empty($_GET['id'])) {
            Expense::delete((int)$_GET['id']);
        }

        header('Location: index.php?controller=expense&action=index');
        exit;
    }
}
