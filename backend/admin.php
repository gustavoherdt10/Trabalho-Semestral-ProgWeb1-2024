<?php
// admin.php

// Incluir arquivos necessários
require_once 'includes/config.php';
require_once 'includes/funcoes.php';

session_start();

// Verificar se o administrador está autenticado
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redireciona para a página de login
    exit;
}

// Lógica para exibir as avaliações ou gerenciar perguntas (dependendo da implementação)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main>
        <h1>Painel Administrativo</h1>
        <nav>
            <ul>
                <li><a href="gerenciar_perguntas.php">Gerenciar Perguntas</a></li>
                <li><a href="visualizar_avaliacoes.php">Visualizar Avaliações</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>

        <h2>Bem-vindo, <?php echo $_SESSION['admin_username']; ?>!</h2>

        <!-- Aqui você pode adicionar conteúdo relacionado à exibição de avaliações ou perguntas -->
    </main>
</body>
</html>
