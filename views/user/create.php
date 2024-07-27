<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando novo Usuário</title>
</head>
<body>
    <h1>Criando novo Usuário</h1>
    <form action="usuarios.php?action=create" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <input type="submit" value="Create">
    </form>
    <a href="usuarios.php">Voltar para lista de usuários</a>
</body>
</html>
