<!-- PAGINA DE CRIAR OS USUARIOS -->

<?php
session_start();
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Usuário</title>
  <link rel="stylesheet" href="styles.css">
  <style>
   
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-image: linear-gradient( #49a09d, #5f2c82);
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 20px;
    }

    /* Container principal */
    .container {
      width: 100%;
      max-width: 400px;
    }

    /* Card */
    .card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 50px;
    }

    .titulo {
      text-align: center;
      font-size: 1.5rem;
      margin-bottom: 20px;
      /* color: #333; */
    }

    /* Mensagem de alerta */
    .alert {
      background-color: #f8d7da;
      color: #721c24;
      padding: 10px;
      border-radius: 4px;
      margin-bottom: 15px;
      font-size: 0.9rem;
    }

    /* Formulário */
    .form-group {
      margin-bottom: 15px;
    }

    label {
      font-size: 1rem;
      margin-bottom: 5px;
      display: block;
      /* color: #555; */
    }

    input {
      width: 100%;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
    }

    input:focus {
      outline: none;
      border-color: #49a09d;
      box-shadow: 0 0 5px rgba(73, 160, 157, 0.5);
    }

    /* Botões */
    .botoes {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      margin-top: 20px;
    }

    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      background-color: #49a09d;
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
    }

    .btn:hover {
      background-color: #3e8986;
    }

    .btn-secundario {
      background-color: #ccc;
      color: #333;
    }

    .btn-secundario:hover {
      background-color: #b3b3b3;
    }

  </style>
</head>
<body>
  
  <div class="container">
    <div class="card">

      <h1 class="titulo">Cadastrar Usuário</h1>

      <!-- Mensagem de erro ou sucesso -->
      <?php

      if (isset($_SESSION['mensagem'])) 
      {
          echo "<div class='alert'>{$_SESSION['mensagem']}</div>";
          unset($_SESSION['mensagem']);
      }

      ?>

      <form action="acoes.php" method="POST">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        </div>

        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
        </div>

        <div class="botoes">
          <button type="submit" name="create_usuario" class="btn">Salvar</button>
          <a href="index.php" class="btn btn-secundario">Voltar</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
</body>
</html>
