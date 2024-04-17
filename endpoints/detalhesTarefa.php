<?php
// Peço a conexão
require_once '../Conexao.php';

// Método Get
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  // Verifica se o ID da tarefa foi passado na URL
  if (isset($_GET['id'])) {

    // Captura o ID da tarefa
    $tarefa_id = $_GET['id'];

    // Consulta o banco de dados tarefa com o ID fornecido
    $conn = conectarBanco();
    $stmt = $conn->prepare("SELECT * FROM task WHERE id = ?");
    $stmt->bind_param('i', $tarefa_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se trouxe resultado
    if ($result->num_rows > 0) {

      // Retorna os detalhes da tarefa em formato JSON
      $tarefa = $result->fetch_assoc();
      echo json_encode($tarefa);

    } else {
      // Se a tarefa não foi encontrada, retorna uma mensagem de erro em formato JSON
      echo json_encode(['error' => 'Tarefa não encontrada']);
    }

    // Fecha a conexão com o banco de dados
    $stmt->close();
    $conn->close();

  } else {
    // Se o ID da tarefa não foi fornecido na URL, retorna uma mensagem de erro em formato JSON
    echo json_encode(['error' => 'ID da tarefa não fornecido']);
  }

} else {
  // Se a solicitação não for do tipo GET, retorna uma mensagem de erro em formato JSON
  echo json_encode(['error' => 'Método não permitido']);
}
?>
