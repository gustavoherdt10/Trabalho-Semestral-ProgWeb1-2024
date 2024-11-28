<?php
require_once 'conexao.php'; // Arquivo de conexão com o banco

// Função para salvar a avaliação no banco de dados
function salvarAvaliacao($respostas, $feedback) {
    $pdo = conectarBanco();
    
    // Inicia a transação
    $pdo->beginTransaction();
    
    try {
        // Inserir as respostas
        foreach ($respostas as $resposta) {
            $sql = "INSERT INTO avaliacoes (id_pergunta, id_setor, id_dispositivo, resposta, feedback, data_hora) 
                    VALUES (:id_pergunta, :id_setor, :id_dispositivo, :resposta, :feedback, NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id_pergunta' => $resposta['perguntaId'],
                ':id_setor' => 1, // Exemplo: Recepção, ajuste conforme necessário
                ':id_dispositivo' => 1, // Exemplo: ID do dispositivo
                ':resposta' => $resposta['resposta'],
                ':feedback' => $feedback
            ]);
        }
        
        // Comita a transação
        $pdo->commit();
        
        // Retorna sucesso
        return ['status' => 'success', 'message' => 'Avaliação salva com sucesso'];
    } catch (Exception $e) {
        // Se ocorrer erro, reverte a transação
        $pdo->rollBack();
        
        // Retorna erro
        return ['status' => 'error', 'message' => $e->getMessage()];
    }
}

// Recebendo os dados via POST
$data = json_decode(file_get_contents('php://input'), true);

// Salvando a avaliação
$resultado = salvarAvaliacao($data['respostas'], $data['feedback']);

// Retorna o resultado como JSON
header('Content-Type: application/json');
echo json_encode($resultado);
?>
