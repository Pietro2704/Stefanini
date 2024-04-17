<?php 
require_once '../Conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Tarefa</title>
</head>
<body>

<?php


// Verifica se o ID da tarefa foi passado como parâmetro na URL
if (isset($_GET['id'])) {
    $tarefa_id = $_GET['id'];
    
    // Faz a solicitação para obter os detalhes da tarefa do endpoint
    $url = "http://localhost/Stefanini/endpoints/detalhesTarefa.php?id=" . $tarefa_id;
    $response = file_get_contents($url);

    // Verifica se a resposta foi recebida com sucesso
    if ($response !== false) {
        // Decodifica a resposta JSON em um array associativo
        $tarefa = json_decode($response, true);

        // Exibe os detalhes da tarefa em uma tabela
        echo "<h1>Detalhes da Tarefa</h1>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Título</th><th>Descrição</th><th>Status</th></tr>";
        echo "<tr>";
        echo "<td>" . $tarefa['id'] . "</td>";
        echo "<td>" . $tarefa['title'] . "</td>";
        echo "<td>" . $tarefa['descricao'] . "</td>";
        echo "<td>" . $tarefa['stats'] . "</td>";
        echo "</tr>";
        echo "</table>";
    } else {
        // Se houve algum erro ao obter os detalhes da tarefa, exibe uma mensagem de erro
        echo "<p>Erro ao obter os detalhes da tarefa.</p>";
    }
} else {
    // Se o ID da tarefa não foi fornecido na URL, exibe uma mensagem de erro
    echo "<p>ID da tarefa não fornecido.</p>";
}
?>

</body>
</html>
