<?php

include_once 'config/database.php';
include_once 'controllers/UserController.php';

$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Determinar a ação do usuário
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $message = $userController->create($nome, $email);
            echo $message;
            echo '<a href="usuarios.php">Back to User List</a>';
        } else {
            include 'views/user/create.php';
        }
        break;

    case 'read':
        if ($id) {
            $user = $userController->readOne($id);
            if (is_array($user)) {
                include 'views/user/show.php';
            } else {
                echo $user; // Exibir mensagem de erro
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'update':
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $message = $userController->update($id, $nome, $email);
                echo $message;
                echo '<a href="usuarios.php">Back to User List</a>';
            } else {
                $user = $userController->readOne($id);
                include 'views/user/update.php';
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'delete':
        if ($id) {
            $message = $userController->delete($id);
            echo $message;
            echo '<a href="usuarios.php">Back to User List</a>';
        } else {
            echo 'User ID is required.';
        }
        break;

    default:
        $users = $userController->index();
        include 'views/user/index.php';
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
