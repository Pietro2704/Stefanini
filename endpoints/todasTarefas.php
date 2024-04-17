<?php
// peço a conexao criada
require_once '../Conexao.php';

// Método Get (Get == Pegar)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  // Realiza a query no banco de dados
  $conn = conectarBanco();
  $sql = "SELECT * FROM task";
  $result = $conn->query($sql);

  // Verifica se trouxe resultados
  if ($result->num_rows > 0) {
    $tarefas = array();

    // Adiciona resultados num array
    while ($row = $result->fetch_assoc()) {
        $tarefas[] = $row;
    }

    // Transforma array em Json
    echo json_encode($tarefas);

  } else {

    // Retorna array vazio
    echo json_encode(array());
  }

  // Fecha a conexão com o banco de dados
  $conn->close();
}
?>
