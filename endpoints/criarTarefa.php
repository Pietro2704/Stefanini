<?php 
require_once '../Conexao.php';

// Verifica se a solicitação é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    // Captura os dados do formulário
    $title = $_POST['title'];
    $status = $_POST['status'];
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';

    // Realiza a inserção no banco de dados
    $conn = conectarBanco();
    $stmt = $conn->prepare("INSERT INTO task (title, descricao, stats) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $title, $descricao, $status);
    $stmt->execute();

    // Verifica se a inserção foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        // Retorna um código de status 201 (Created) e o ID do registro inserido em formato JSON
        // http_response_code(201);
        // echo json_encode(['id' => $conn->insert_id]);
        header('Location: ../index.php');
    } else {
        // Se a inserção falhou, retorna um código de status 500 (Internal Server Error) e uma mensagem de erro em formato JSON
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao inserir tarefa no banco de dados']);
    }

    // Fecha a conexão com o banco de dados
    $stmt->close();
    $conn->close();

    exit;
} else {
    // Se a solicitação não for do tipo POST, retorna um código de status 405 (Method Not Allowed) em formato JSON
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
}
?>
