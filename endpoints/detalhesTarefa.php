<?php
require_once '../Conexao.php';

// Verifica se a solicitação é do tipo GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Verifica se o ID da tarefa foi passado como parâmetro na URL
    if (isset($_GET['id'])) {
        // Captura o ID da tarefa
        $tarefa_id = $_GET['id'];

        // Consulta o banco de dados para obter os detalhes da tarefa com o ID fornecido
        $conn = conectarBanco();
        $stmt = $conn->prepare("SELECT * FROM task WHERE id = ?");
        $stmt->bind_param('i', $tarefa_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se a tarefa foi encontrada
        if ($result->num_rows > 0) {
            // Retorna os detalhes da tarefa em formato JSON
            $tarefa = $result->fetch_assoc();
            echo json_encode($tarefa);
        } else {
            // Se a tarefa não foi encontrada, retorna uma mensagem de erro em formato JSON
            http_response_code(404); // Not Found
            echo json_encode(['error' => 'Tarefa não encontrada']);
        }

        // Fecha a conexão com o banco de dados
        $stmt->close();
        $conn->close();
    } else {
        // Se o ID da tarefa não foi fornecido na URL, retorna uma mensagem de erro em formato JSON
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'ID da tarefa não fornecido']);
    }
} else {
    // Se a solicitação não for do tipo GET, retorna um código de status 405 (Method Not Allowed) em formato JSON
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Método não permitido']);
}
?>
