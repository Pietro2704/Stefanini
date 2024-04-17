<?php 
// peço a conexao criada
require_once '../Conexao.php';

// método post (post == isercao)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // pega campos do formulario
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
    header('Location: ../index.php');

  } else {
    // Se a inserção falhou, uma mensagem de erro em formato JSON
    echo json_encode(['error' => 'Erro ao inserir tarefa no banco de dados']);
  }

  // Fecha a conexão com o banco de dados
  $stmt->close();
  $conn->close();
  exit;

} else {

  // Se tentarem acessar via URL (Sem método)
  echo json_encode(['error' => 'Método não permitido']);

}
?>
