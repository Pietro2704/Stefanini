<?php 

// Criar conexao com o banco
function conectarBanco(){

  $dbServer = "localhost";
  $dbUser = "root";
  $dbPassword = "";
  $dbName = "Stefanini";

  $conn = new mysqli($dbServer,$dbUser,$dbPassword,$dbName);

  if($conn->connect_error){
    die("Conexão falhou" . $conn->connect_error);
  }
  
  $conn->set_charset("utf8");
  return $conn;
}

conectarBanco ();
?>