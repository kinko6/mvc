<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            text-align: center;
        }
        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Bem-vindo ao Sistema de Gerenciamento</h1>
    <div>
        <button onclick="window.location.href='usuarios.php';">Gerenciar Usuários</button>
    </div>
    <div>
        <button onclick="window.location.href='tarefas.php';">Gerenciar Tarefas</button>
    </div>
</body>
</html>
