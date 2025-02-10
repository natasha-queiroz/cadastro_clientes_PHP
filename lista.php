<!-- arquivo de conexão -->
<?php
require 'conexao.php';
?> 

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
    /* align-items: center; */
    height: 100vh;
    padding: 20px;
  }

  </style>
  </head>
<body>
  
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h2> Lista de Usuários
              <!-- <a href="index.php" class="btn btn-primary float-end">Voltar</a> -->
              <a href="index.php" class="btn btn-danger float-end">Voltar</a>
            </h2>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Senha</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>

                <!-- CONSULTA -->
                  <?php
                $sql = 'SELECT * FROM usuarios';
                $resultado = mysqli_query($mysqli, $sql);

                if ($resultado && mysqli_num_rows($resultado) > 0) 
                {
                  foreach($resultado as $usuario) { //PERCORRE OS USUARIOS
                  ?>

                <!-- CONTEUDO DAS VARIAVEIS -->
                <tr>  
                  
                  <td><?=$usuario['id']?></td>
                  <td><?=$usuario['nome']?></td>
                  <td>****</td>
                  
                  <td>
                    <a href="usuario-view.php?id=<?=$usuario['id']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
                    <a href="usuario-edit.php?id=<?=$usuario['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                    <form action="acoes.php" method="POST" class="d-inline">

                    <!-- JAVASCRIPT -->
                      <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?=$usuario['id']?>" class="btn btn-danger btn-sm">
                        <span class="bi-trash3-fill"></span>&nbsp;Excluir
                      </button>

                    </form>
                  </td>
                </tr>

                  <?php
                }
                } 
                else 
                {
                  echo '<h5>Nenhum usuário encontrado</h5>';
                }
                ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>