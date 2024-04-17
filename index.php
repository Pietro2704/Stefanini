<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .campo {
          margin-bottom: 20px;
        }
    </style>
</head>
<body>
  
  <!-- CRIAR TAREFA -->
  <div class="container">
    <h1 class="mt-5">Criar Tarefa</h1>
    <form action="./endpoints/criarTarefa.php" method="POST">

      <div class="campo">
        <label for="title">Título</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Título da tarefa">
      </div>

      <div class="campo">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status">
            <option value="não iniciado">Não Iniciado</option>
            <option value="em andamento">Em Andamento</option>
            <option value="concluído">Concluído</option>
        </select>
      </div>

      <div class="campo">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" cols="30" rows="10"></textarea>
      </div>

      <div class="campo">
        <a href="./views/exibirTodas.php" class="btn btn-secondary">Ver tudo</a>
        <button type="submit" class="btn btn-primary">ADD</button>
      </div>

    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
