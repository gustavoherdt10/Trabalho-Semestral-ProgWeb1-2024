<?php
define('DB_HOST', 'localhost');  // Endereço do servidor de banco de dados
define('DB_PORT', '5432');       // Porta do PostgreSQL
define('DB_NAME', 'TrabalhoSemestral');    // Nome do banco de dados
define('DB_USER', 'gusherdt');    // Nome do usuário
define('DB_PASSWORD', '123456');  // Senha do usuário

function getDbConnection() {
    $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        exit;
    }
}
?>
