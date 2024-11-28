<?php
// gerenciar_setores.php

require_once 'includes/config.php';
require_once 'includes/funcoes.php';

// Listar setores
$setores = listarSetores();

// Adicionar setor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar_setor'])) {
    $nome = sanitizeInput($_POST['nome']);
    adicionarSetor($nome);
    header("Location: gerenciar_setores.php");
    exit;
}

// Editar setor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_setor'])) {
    $id = $_POST['id'];
    $nome = sanitizeInput($_POST['nome']);
    editarSetor($id, $nome);
    header("Location: gerenciar_setores.php");
    exit;
}

// Excluir setor
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    excluirSetor($id);
    header("Location: gerenciar_setores.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Setores</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Gerenciar Setores</h1>
    <form method="POST">
        <label for="nome">Novo Setor:</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit" name="adicionar_setor">Adicionar Setor</button>
    </form>

    <h2>Setores Cadastrados</h2>
    <ul>
        <?php foreach ($setores as $setor): ?>
            <li>
                <?php echo $setor['nome']; ?>
                <a href="gerenciar_setores.php?excluir=<?php echo $setor['id']; ?>">Excluir</a>
                <a href="editar_setor.php?id=<?php echo $setor['id']; ?>">Editar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
