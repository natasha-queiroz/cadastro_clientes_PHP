<!-- TELA DE VISUALIZAR CLIENTES -->

<?php
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-bt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuário - Visualizar</title>
  

  <style>
    /* Reset básico */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #49a09d;
  color: #333;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

.container {
  width: 100%;
  max-width: 600px;
  background-color: #fff;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.titulo {
  text-align: center;
  font-size: 1.5rem;
  margin-bottom: 20px;
  color: #333;
}

.btn {
  display: inline-block;
  margin-bottom: 20px;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  background-color: #d9534f;
  color: #fff;
  text-decoration: none;
  text-align: center;
  font-size: 1rem;
  cursor: pointer;
}

.btn:hover {
  background-color: #c9302c;
}

.card {
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  background-color: #f9f9f9;
}

.campo {
  margin-bottom: 15px;
}

.campo label {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
}

.campo p {
  padding: 10px;
  background-color: #eee;
  border-radius: 4px;
}

.erro {
  color: #d9534f;
  font-size: 1rem;
  text-align: center;
}

  </style>
</head>
<body>
  
<div class="container">
    <h1 class="titulo">Visualizar Usuário</h1>
    <a href="lista.php" class="btn btn-voltar">Voltar</a>

    <div class="card">

              <?php

              // FACO A VISUALIZAÇÃO SE O ID FOI ENVIADO 
              if (isset($_GET['id'])) {
                $usuario_id = mysqli_real_escape_string($mysqli, $_GET['id']);
                $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
                $query = mysqli_query($mysqli, $sql);
              
              // PRA SABER SE REALMENTE RETORNOU OS REGISTROS E SE EXISTE
              if (mysqli_num_rows($query) > 0) {
                $usuario = mysqli_fetch_array($query);
              ?>

              <div class="campo">
                <label>Nome:</label>
                <p><?= htmlspecialchars($usuario['nome']); ?></p>
              </div>

              <div class="campo">
                <label>Senha:</label>
                <p><?= htmlspecialchars($usuario['senha']); ?></p>
              </div>
              
              <?php

              } else {
                echo "<h5>Usuário não encontrado</h5>";
              }
            }
            ?>  
</body>
</html>