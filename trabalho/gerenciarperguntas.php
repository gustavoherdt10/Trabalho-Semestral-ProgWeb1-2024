
<?php

require_once 'config.php';
require_once 'funcoes.php';

$perguntas = listarPerguntas();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar_pergunta'])) {
    $texto = sanitizeInput($_POST['texto']);
    adicionarPergunta($texto);
    header("Location: gerenciar_perguntas.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_pergunta'])) {
    $id = $_POST['id'];
    $texto = sanitizeInput($_POST['texto']);
    editarPergunta($id, $texto);
    header("Location: gerenciar_perguntas.php");
    exit;
}

if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    excluirPergunta($id);
    header("Location: gerenciar_perguntas.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Perguntas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Gerenciar Perguntas</h1>
    <form method="POST">
        <label for="texto">Nova Pergunta:</label>
        <input type="text" name="texto" id="texto" required>
        <button type="submit" name="adicionar_pergunta">Adicionar Pergunta</button>
    </form>

    <h2>Perguntas Cadastradas</h2>
    <ul>
        <?php foreach ($perguntas as $pergunta): ?>
            <li>
                <?php echo $pergunta['texto']; ?>
                <a href="gerenciar_perguntas.php?editar=<?php echo $pergunta['id']; ?>">Editar</a>
                <a href="gerenciar_perguntas.php?excluir=<?php echo $pergunta['id']; ?>">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
