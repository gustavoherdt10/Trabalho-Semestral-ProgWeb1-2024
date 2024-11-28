<?php

require_once 'includes/config.php';
require_once 'includes/funcoes.php';

session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); 
    exit;
}

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
                <li><a href="gerenciar_dispositivos.php">Gerenciar Dispositivos</a></li>
                <li><a href="gerenciar_setores.php">Gerenciar Setores</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>

        <h2>Olá <?php echo $_SESSION['admin_username']; ?>!</h2>
    </main>
</body>
</html>
