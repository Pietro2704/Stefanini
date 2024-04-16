<?php 
require_once '../Conexao.php';
require_once '../endpoints/todasTarefas.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todas Tarefas</title>
</head>
<body>

  <h2>Tarefas</h2>
  <table class="table table-bordered">
    <thead class="thead-dark">

      <tr>
        <th>Info</th>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Status</th>
      </tr>

    </thead>  

    <tbody>

    <?php
      $tarefasJson = obterTarefas();
      $tarefas = json_decode($tarefasJson, true);
      //var_dump($tarefas);

      if (!empty($tarefas)) {
        foreach ($tarefas as $tarefa):
      ?>

      <tr>
        <td>Icone</td>
        <td><?php echo $tarefa['id']; ?></td>
        <td><?php echo $tarefa['title']; ?></td>
        <td><?php echo $tarefa['descricao']; ?></td>
        <td><?php echo $tarefa['stats']; ?></td>
      </tr>

      <?php endforeach;
      } 
      else {
        echo "<tr><td colspan='5'>Nenhuma tarefa encontrada.</td></tr>";
      }
      ?>

    </tbody>
  </table>
</body>
</html>