<?php
require_once 'conexao.php'; // Arquivo de conexão com o banco

// Função para buscar as perguntas do banco de dados
function buscarPerguntas() {
    $pdo = conectarBanco();
    $sql = "SELECT texto_pergunta FROM perguntas WHERE status = 'ativa' ORDER BY id_pergunta";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    $perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Retorna as perguntas como um array de strings
    return array_map(function($pergunta) {
        return $pergunta['texto_pergunta'];
    }, $perguntas);
}

// Buscando as perguntas e retornando como JSON
header('Content-Type: application/json');
echo json_encode(buscarPerguntas());
?>
