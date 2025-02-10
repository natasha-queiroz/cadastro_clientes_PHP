<!-- arquivo de conexão -->
<?php
require 'conexao.php';
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Obtém os valores enviados pelo formulário
    $nome = ($_POST['nome']) ? ($_POST['nome']) : '';
    $senha = ($_POST['senha']) ? ($_POST['senha']) : '';

    // Valida se os campos estão preenchidos
    if (empty($nome) || empty($senha)) 
    {
        echo "<script>alert('Por favor, preencha todos os campos antes de continuar.');</script>";
    } 
    
    else 
    {
        // Consulta o banco de dados para verificar o usuário
        $query = "SELECT * FROM usuarios WHERE nome = ? AND senha = ?";
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, "ss", $nome, $senha);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) > 0) 
        {
            // Login bem-sucedido
            header("Location: lista.php");
            exit;
        } 
        
        else 
        {
            // Login falhou
            echo "<script>alert('Nome ou senha incorretos ou usuário não cadastrado.');</script>";
        }
    }
}
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login de Usuários</title>
  
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
    }

    /* Container principal */
    .container {
      width: 100%;
      max-width: 400px;
      padding: 20px;
    }

    /* Card de login */
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
      color: #333;
    }

    /* Campos do formulário */
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
      gap: 10px;
      justify-content: center;
      margin-top: 20px;
    }

    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      background-color: #49a09d;
      /* color: #fff; */
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
      <h1 class="titulo">Login</h1>
      <form method="POST" action="">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
        </div>
        <div class="botoes">
          <button type="submit" class="btn">Entrar</button>
          <a href="usuario-create.php" class="btn btn-secundario">Cadastrar</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
</body>
</html> 
