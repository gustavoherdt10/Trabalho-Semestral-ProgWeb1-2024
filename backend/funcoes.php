<?php
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

// Função para autenticar o usuário administrativo
function authenticateAdmin($username, $password) {
    $pdo = getDbConnection();
    $sql = "SELECT * FROM usuarios_administrativos WHERE login = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['1'])) {
        return true;
    }
    return false;
}

// Função para listar todas as perguntas
function listarPerguntas() {
    $pdo = getDbConnection();
    $sql = "SELECT * FROM perguntas WHERE status = 'ativa'";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para adicionar uma nova pergunta
function adicionarPergunta($texto) {
    $pdo = getDbConnection();
    $sql = "INSERT INTO perguntas (texto) VALUES (:texto)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['texto' => $texto]);
}

// Função para editar uma pergunta
function editarPergunta($id, $texto) {
    $pdo = getDbConnection();
    $sql = "UPDATE perguntas SET texto = :texto WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'texto' => $texto]);
}

// Função para excluir uma pergunta
function excluirPergunta($id) {
    $pdo = getDbConnection();
    $sql = "DELETE FROM perguntas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

// Função para listar todos os dispositivos
function listarDispositivos() {
    $pdo = getDbConnection();
    $sql = "SELECT * FROM dispositivos WHERE status = 'ativo'";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para adicionar um novo dispositivo
function adicionarDispositivo($nome) {
    $pdo = getDbConnection();
    $sql = "INSERT INTO dispositivos (nome) VALUES (:nome)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome]);
}

// Função para editar um dispositivo
function editarDispositivo($id, $nome, $status) {
    $pdo = getDbConnection();
    $sql = "UPDATE dispositivos SET nome = :nome, status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'nome' => $nome, 'status' => $status]);
}

// Função para excluir um dispositivo
function excluirDispositivo($id) {
    $pdo = getDbConnection();
    $sql = "DELETE FROM dispositivos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

// functions.php

// Função para listar todos os setores
function listarSetores() {
    $pdo = getDbConnection();
    $sql = "SELECT * FROM setores";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para adicionar um novo setor
function adicionarSetor($nome) {
    $pdo = getDbConnection();
    $sql = "INSERT INTO setores (nome) VALUES (:nome)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome]);
}

// Função para editar um setor
function editarSetor($id, $nome) {
    $pdo = getDbConnection();
    $sql = "UPDATE setores SET nome = :nome WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'nome' => $nome]);
}

// Função para excluir um setor
function excluirSetor($id) {
    $pdo = getDbConnection();
    $sql = "DELETE FROM setores WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

?>
