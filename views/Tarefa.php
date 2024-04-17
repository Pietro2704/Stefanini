<?php 
require_once '../Conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes da Tarefa</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php

// Verifica se o ID da tarefa foi passado como parâmetro na URL
if (isset($_GET['id'])) {
    $tarefa_id = $_GET['id'];
    
    // Pega o conteúdo do endpoint
    $url = "http://localhost/Stefanini/endpoints/detalhesTarefa.php?id=" . $tarefa_id;
    $response = file_get_contents($url);

    // Verifica se a resposta foi recebida
    if ($response !== false) {
        // Decodifica a resposta JSON em um array
        $tarefa = json_decode($response, true);
        ?>

        <div class="container">
            <h1 class="mt-5">Detalhes da Tarefa</h1>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $tarefa['id']; ?></td>
                        <td><?php echo $tarefa['title']; ?></td>
                        <td><?php echo $tarefa['descricao']; ?></td>
                        <td><?php echo $tarefa['stats']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    } else {
      // Se houve algum erro ao obter os detalhes da tarefa, exibe uma mensagem de erro
      echo "<p>Erro ao obter os detalhes da tarefa.</p>";
    }
} else {
    // Se o ID da tarefa não foi fornecido na URL, exibe uma mensagem de erro
    echo "<p>ID da tarefa não fornecido.</p>";
}
?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
