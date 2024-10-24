<?php
$host = 'localhost';
$dbname = 'TrabalhoSemestral';
$username = 'postgres';
$password = '123456';
$port = '5432';

try {
    // Conectando ao PostgreSQL usando PDO
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
    echo "Erro na conexão: " . $e->getMessage();
}
?>
