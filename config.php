<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'TrabalhoSemestral');
define('DB_USER', 'gustavoherdt');
define('DB_PASSWORD', '123456');

function conectarBanco() {
    $dsn = 'pgsql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
}
?>
