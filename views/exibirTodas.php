<?php 
require_once '../Conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todas Tarefas</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

  <div class="container">
    <h2 class="mt-5">Tarefas</h2>
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
        $caminho = 'http://localhost/Stefanini/endpoints/todasTarefas.php';
        $response = file_get_contents($caminho);
        $tarefas = json_decode($response, true);

        if (!empty($tarefas)) {
          foreach ($tarefas as $tarefa):
        ?>

        <tr>
          <td>
            <a href="../endpoints/detalhesTarefa.php?id=<?php echo $tarefa['id']; ?>">
              <i class="bi bi-info-circle"></i>
            </a>
          </td>
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
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
