<?php
// Configuração da conexão ao banco de dados PostgreSQL
$host = 'localhost';           // Servidor (normalmente localhost)
$dbname = 'TrabalhoSemestral';              // Nome do banco de dados
$username = '';     // Nome de usuário do PostgreSQL
$password = 'sua_senha';       // Senha do PostgreSQL
$port = '5432';                // Porta padrão do PostgreSQL (5432)

// Tentando a conexão com o banco de dados PostgreSQL
try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query para buscar perguntas ativas
    $query = "SELECT id, texto_pergunta FROM perguntas WHERE status = 'ativa' ORDER BY id";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Fetch das perguntas como um array associativo
    $perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retornando as perguntas como JSON
    echo json_encode($perguntas);
    
} catch (PDOException $e) {
    // Tratamento de erro de conexão
    echo "Erro na conexão: " . $e->getMessage();
}
?>
