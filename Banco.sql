-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS Stefanini CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE Stefanini;

-- Criação da Tabela
CREATE TABLE IF NOT EXISTS task (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  descricao TEXT,
  stats ENUM('não iniciado', 'em andamento', 'concluído') NOT NULL
)charset = utf8;
