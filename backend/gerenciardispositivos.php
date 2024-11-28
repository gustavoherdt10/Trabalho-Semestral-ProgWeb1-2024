<?php

require_once 'includes/config.php';
require_once 'includes/funcoes.php';    

$dispositivos = listarDispositivos();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar_dispositivo'])) {
    $nome = sanitizeInput($_POST['nome']);
    adicionarDispositivo($nome);
    header("Location: gerenciar_dispositivos.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_dispositivo'])) {
    $id = $_POST['id'];
    $nome = sanitizeInput($_POST['nome']);
    $status = $_POST['status'];
    editarDispositivo($id, $nome, $status);
    header("Location: gerenciar_dispositivos.php");
    exit;
}

if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    excluirDispositivo($id);
    header("Location: gerenciar_dispositivos.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Dispositivos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Gerenciar Dispositivos</h1>
    <form method="POST">
        <label for="nome">Novo Dispositivo:</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit" name="adicionar_dispositivo">Adicionar Dispositivo</button>
    </form>

    <h2>Dispositivos Cadastrados</h2>
    <ul>
        <?php foreach ($dispositivos as $dispositivo): ?>
            <li>
                <?php echo $dispositivo['nome']; ?> - <?php echo $dispositivo['status']; ?>
                <a href="gerenciar_dispositivos.php?excluir=<?php echo $dispositivo['id']; ?>">Excluir</a>
                <a href="editar_dispositivo.php?id=<?php echo $dispositivo['id']; ?>">Editar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
