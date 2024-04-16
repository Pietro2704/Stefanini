<?php 
require_once '../Conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $title = $_POST['title'];
  $status = $_POST['status'];
  $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';

  $conn = conectarBanco();

  $stmt = $conn->prepare("INSERT INTO task (title, descricao, stats) VALUES (?, ?, ?)");
  $stmt->bind_param('sss', $title, $descricao, $status);

  $stmt->execute();

  echo json_encode(['id' => $conn->insert_id]);

  $stmt->close();
  $conn->close();

  exit;
}

?>
