<!-- TELA EDITAR  -->

<?php
session_start();
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Usuário</title>
  
  <style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-image: linear-gradient( #49a09d, #5f2c82);
      background-attachment: fixed;
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

    .btn-voltar {
      background-color: #6c757d;
      float: right;
    }

    .btn-voltar:hover {
      background-color: #5a6268;
    }

    .btn-salvar {
      background-color: #5cb85c;
    }

    .btn-salvar:hover {
      background-color: #4cae4c;
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

    .campo input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .erro {
      color: #d9534f;
      font-size: 1rem;
      text-align: center;
    }

    .botoes {
      text-align: center;
    }

  </style>
</head>
<body>
  <div class="container">
    <h1 class="titulo">Editar Usuário</h1>
    <a href="lista.php" class="btn btn-voltar">Voltar</a>

    <div class="card">

            <?php
                        
            //VERIFCAÇÃO SE TEM O ID SETADO/ SE FOI PASSADO
            if (isset($_GET['id'])) {
              $usuario_id = mysqli_real_escape_string($mysqli, $_GET['id']);
              $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'"; //CONSULTA
              $query = mysqli_query($mysqli, $sql);

              //VALIDAÇÃO DE NUMEROS DE LINHA RETORNADO. SE O USUARIO EXISTE
            if (mysqli_num_rows($query) > 0) {
                $usuario = mysqli_fetch_array($query);
            ?>

              <form action="acoes.php" method="POST">
                <input type="hidden" name="usuario_id" value="<?= htmlspecialchars($usuario['id']); ?>">
                <div class="campo">
                  <label for="nome">Nome:</label>
                  <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']); ?>" required>
                </div>

                <div class="campo">
                  <label for="senha">Senha:</label>
                  <input type="password" id="senha" name="senha" value="<?= htmlspecialchars($usuario['senha']); ?>" required>
                </div>

                <div class="botoes">
                  <button type="submit" name="update_usuario" class="btn btn-salvar">Salvar</button>
                </div>
              </form>


            <?php
            } else {
              echo "<h5>Usuário não encontrado</h5>";
            }
          }

          ?>
</body>
</html>