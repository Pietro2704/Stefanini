<?php
require_once '../Conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $conn = conectarBanco();
  $sql = "SELECT * FROM task";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $tarefas = array();
    while ($row = $result->fetch_assoc()) {
        $tarefas[] = $row;
    }
    echo json_encode($tarefas);

  } else {
    echo json_encode(array());
  }

  $conn->close();
}
?>
