# Documentação

### Passo 1: Criar o Banco de Dados.
> Arquivo: 'Banco.sql'.
- Criamos um banco de dados chamado 'Stefanini' com uma tabela 'task'

### Passo 2: Conectar aplicação ao banco.
> Arquivo: 'Conexao.php'.
- Criamos uma função que estabelece uma conexão com o banco utilizando mysqli

### Passo 3: Criar Tarefa.
> Arquivo: 'index.php'.
- Criamos um formulário do método POST que manda as informações para o primero endpoint

### Passo 4: Endpoint de criação de tarefa.
> Arquivo: ./endpoints/criarTarefa.php.
- Por meio do método POST, pegamos as informações do formulário e adicionamos dentro do banco.
- Caso a inserção for bem sucedida, o usuario irá ser redirecionado para o index.
- Caso não, irá aparecer a mensagem de erro.

### Passo 5: Endpoint de todas as tarefas.
> Arquivo: ./endpoints/todasTarefas.php
- Por meio do método GET, ele retorna todas as informações do banco em JSON

### Passo 6: Mostrar todas as tarefas.
> Arquivo: ./views/exibirTodas.php
- Faz uma requisição GET à API para obter todas as tarefas e as exibe na página em formato de tabela.

### Passo 7: Endpoint de uma única tarefa.
> Arquivo: ./endpoints/detalhesTarefa.php
- Este endpoint é responsável por retornar os detalhes de uma única tarefa com base no ID fornecido na URL. Ele responde a solicitações GET e retorna os detalhes da tarefa em formato JSON.

### Passo 8: Mostrar a tarefa
> Arquivo: ./views/Tarefa.php
- Exibe os detalhes de uma única tarefa com base no ID fornecido na URL. Faz uma requisição GET ao endpoint detalhesTarefa.php para obter os detalhes da tarefa e os exibe em formato de tabela.


# Requisitos do Projeto:
Objetivo: Desenvolver uma aplicação web com backend e frontend.

### Projeto:
Desenvolver uma aplicação de lista de tarefas (To-Do List). A aplicação deve permitir ao usuário
criar uma nova tarefa, visualizar todas as tarefas e visualizar uma tarefa específica.
A tarefa deve ter os seguintes campos:
- ID: um identificador único para a tarefa.
- Título: o título da tarefa.
- Descrição: uma descrição detalhada da tarefa.
- Status: o status da tarefa (por exemplo, "não iniciado", "em andamento", "concluído").

### Backend:
- Desenvolver uma API REST utilizando uma das seguintes tecnologias: .NET, Java ou PHP.
- A API deve ter pelo menos três endpoints: um para criar um registro, um para obter todos os
registros e um para obter um registro específico.
- A API deve se conectar a um banco de dados para armazenar os registros. Você pode usar
qualquer banco de dados de sua escolha.

### Frontend:
- Desenvolver uma interface de usuário que permita ao usuário criar um registro e visualizar
todos os registros e um registro específico.
- A interface deve se comunicar com a API REST que você desenvolveu.
