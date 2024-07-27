<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando Tarefa</title>
</head>
<body>
    <h1>Atualizando Usuário</h1>
    <form action="tarefas.php?action=update&id=<?php echo $task['id']; ?>" method="post">
        <label for="tarefa">Tarefa:</label>
        <input type="text" id="tarefa" name="tarefa" value="<?php echo htmlspecialchars($task['tarefa'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="prazo">Prazo:</label>
        <input type="text" id="prazo" name="prazo" value="<?php echo htmlspecialchars($task['prazo'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <input type="submit" value="Update">
    </form>
    <a href="tarefas.php">Voltar para lista de usuários</a>
</body>
</html>
