<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Tarefas</h1>
    <a href="tarefas.php?action=create">Criar nova Tarefa</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarefa</th>
                <th>Prazo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($task['tarefa'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($task['prazo'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="tarefas.php?action=read&id=<?php echo $task['id']; ?>">Ver</a>
                        <a href="tarefas.php?action=update&id=<?php echo $task['id']; ?>">Editar</a>
                        <a href="tarefas.php?action=delete&id=<?php echo $task['id']; ?>">Apagar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
