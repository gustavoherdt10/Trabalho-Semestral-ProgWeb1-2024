<?php
require_once '../config.php';
$pdo = conectarBanco();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'];
    $texto = $_POST['texto'] ?? '';
    $id = $_POST['id'] ?? null;

    if ($acao === 'adicionar' && $texto) {
        $stmt = $pdo->prepare("INSERT INTO perguntas (texto) VALUES (:texto)");
        $stmt->execute([':texto' => $texto]);
    } elseif ($acao === 'editar' && $texto && $id) {
        $stmt = $pdo->prepare("UPDATE perguntas SET texto = :texto WHERE id = :id");
        $stmt->execute([':texto' => $texto, ':id' => $id]);
    } elseif ($acao === 'remover' && $id) {
        $stmt = $pdo->prepare("DELETE FROM perguntas WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

$perguntas = $pdo->query("SELECT * FROM perguntas")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Perguntas</title>
</head>
<body>
    <h1>Gerenciar Perguntas</h1>
    <form method="POST">
        <input type="text" name="texto" placeholder="Nova pergunta">
        <button type="submit" name="acao" value="adicionar">Adicionar</button>
    </form>
    <ul>
        <?php foreach ($perguntas as $pergunta): ?>
            <li>
                <?= htmlspecialchars($pergunta['texto']) ?>
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $pergunta['id'] ?>">
                    <button type="submit" name="acao" value="remover">Remover</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

