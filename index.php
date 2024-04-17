<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
</head>
<body>
  
  <!-- CRIAR TAREFA -->
  <h1>Criar Tarefa</h1>
  <form action="./endpoints/criarTarefa.php" method="POST">

    <div class="campo">
      <label for="title">Título</label>
      <input type="text" id="title" name="title" placeholder="Título da tarefa">
    </div>

    <div class="campo">
      <select id="status" name="status">
          <option value="não iniciado">Não Iniciado</option>
          <option value="em andamento">Em Andamento</option>
          <option value="concluído">Concluído</option>
      </select>
    </div>

    <div class="campo">
      <textarea name="descricao" id="" cols="30" rows="10"></textarea>
    </div>

    <a href="./views/exibirTodas.php">Ver tudo</a>
    <button type="submit">ADD</button>

  </form>

</body>
</html>