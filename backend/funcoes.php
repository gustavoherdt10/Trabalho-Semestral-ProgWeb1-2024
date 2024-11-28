<?php
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

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

function listarPerguntas() {
    $pdo = getDbConnection();
    $sql = "SELECT * FROM perguntas WHERE status = 'ativa'";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function adicionarPergunta($texto) {
    $pdo = getDbConnection();
    $sql = "INSERT INTO perguntas (texto) VALUES (:texto)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['texto' => $texto]);
}

function editarPergunta($id, $texto) {
    $pdo = getDbConnection();
    $sql = "UPDATE perguntas SET texto = :texto WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'texto' => $texto]);
}

function excluirPergunta($id) {
    $pdo = getDbConnection();
    $sql = "DELETE FROM perguntas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

function listarDispositivos() {
    $pdo = getDbConnection();
    $sql = "SELECT * FROM dispositivos WHERE status = 'ativo'";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function adicionarDispositivo($nome) {
    $pdo = getDbConnection();
    $sql = "INSERT INTO dispositivos (nome) VALUES (:nome)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome]);
}

function editarDispositivo($id, $nome, $status) {
    $pdo = getDbConnection();
    $sql = "UPDATE dispositivos SET nome = :nome, status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'nome' => $nome, 'status' => $status]);
}

function excluirDispositivo($id) {
    $pdo = getDbConnection();
    $sql = "DELETE FROM dispositivos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

function listarSetores() {
    $pdo = getDbConnection();
    $sql = "SELECT * FROM setores";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function adicionarSetor($nome) {
    $pdo = getDbConnection();
    $sql = "INSERT INTO setores (nome) VALUES (:nome)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome]);
}

function editarSetor($id, $nome) {
    $pdo = getDbConnection();
    $sql = "UPDATE setores SET nome = :nome WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'nome' => $nome]);
}

function excluirSetor($id) {
    $pdo = getDbConnection();
    $sql = "DELETE FROM setores WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

?>
