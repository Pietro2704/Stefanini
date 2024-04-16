<?php
require_once '../Conexao.php';

function obterTarefas() {

  $conn = conectarBanco();
  $sql = "SELECT * FROM task";
  $result = $conn->query($sql);

  if ($result-> num_rows > 0) {

    $tarefas = array();
    while ($row = $result->fetch_assoc()) {
      $tarefas[] = $row;
    }    

    $conn->close();
    return json_encode($tarefas);

  }
  else {
    $conn->close();
    return json_encode(array());
  }  

}
?>
