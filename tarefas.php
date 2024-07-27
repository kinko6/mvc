<?php

include_once 'config/database.php';
include_once 'controllers/TaskController.php';

$database = new Database();
$db = $database->getConnection();

$taskController = new TaskController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Determinar a ação do usuário
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tarefa = $_POST['tarefa'];
            $prazo = $_POST['prazo'];
            $message = $taskController->create($tarefa, $prazo);
            echo $message;
            echo '<a href="tarefas.php">Back to task List</a>';
        } else {
            include 'views/task/create.php';
        }
        break;

    case 'read':
        if ($id) {
            $task = $taskController->readOne($id);
            if (is_array($task)) {
                include 'views/task/show.php';
            } else {
                echo $task; // Exibir mensagem de erro
            }
        } else {
            echo 'Task ID is required.';
        }
        break;

    case 'update':
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $tarefa = $_POST['tarefa'];
                $prazo = $_POST['prazo'];
                $message = $taskController->update($id, $tarefa, $prazo);
                echo $message;
                echo '<a href="tarefas.php">Back to task List</a>';
            } else {
                $task = $taskController->readOne($id);
                include 'views/task/update.php';
            }
        } else {
            echo 'Task ID is required.';
        }
        break;

    case 'delete':
        if ($id) {
            $message = $taskController->delete($id);
            echo $message;
            echo '<a href="tarefas.php">Back to task List</a>';
        } else {
            echo 'Task ID is required.';
        }
        break;

    default:
        $tasks = $taskController->index();
        include 'views/task/index.php';
        break;
}
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>
        <button onclick="window.location.href='index.php';">Menu Principal</button>
    </div>
</body>
</html>
