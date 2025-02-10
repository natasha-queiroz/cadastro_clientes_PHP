<?php
session_start(); //iniciar a sessao
require 'conexao.php';


if (isset($_POST['create_usuario'])) 
{
    // Captura os dados do formulário
    $nome = ($_POST['nome']) ? ($_POST['nome']) : null;
    $senha = ($_POST['senha']) ? ($_POST['senha']) : null;

    // Valida se os campos foram preenchidos
    if (empty($nome) || empty($senha)) 
	{
        $_SESSION['mensagem'] = 'Por favor, preencha todos os campos.';
        header("Location: usuario-create.php");
        exit;
    }

    // Insere no banco de dados
    $query = "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha')";
    if (mysqli_query($mysqli, $query)) {
        $_SESSION['mensagem'] = 'Usuário cadastrado com sucesso! Clique no botão Voltar e faça o Login!';
        header("Location: usuario-create.php");
        exit;
    } 
	
	else {
        $_SESSION['mensagem'] = 'Erro ao cadastrar usuário.';
        header("Location: usuario-create.php");
        exit;
    }
}



//verificando se ta setado. TRIM=REMOVER ESPAÇO DA STRING
if (isset($_POST['create_usuario'])) 

{
	$nome = $_POST ($mysqli, (['nome']));
	$senha = $_POST ($mysqli, (['senha']));
	
	$sql = "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha')";
	$resultado = mysqli_query($mysqli, $sql);


	if (mysqli_affected_rows($mysqli) > 0) 
	{
		// $_SESSION['mensagem'] = 'Usuário criado com sucesso';
		header('Location: index.php');
		exit;
	} 
	
	else {
		$_SESSION['mensagem'] = 'Usuário não foi criado';
		header('Location: index.php');
		exit;
	}
}


//-------------------------------------------------------------------------------------------------------------//

if (isset($_POST['update_usuario'])) 
{
	$usuario_id = mysqli_real_escape_string($mysqli, $_POST['usuario_id']);
	$nome = mysqli_real_escape_string($mysqli, ($_POST['nome']));
	$senha = mysqli_real_escape_string($mysqli, ($_POST['senha']));

	$sql = "UPDATE usuarios SET nome = '$nome', senha = '$senha' ";
	$sql .= " WHERE id = '$usuario_id'";
	$resultado = mysqli_query($mysqli, $sql);

	
	if (mysqli_affected_rows($mysqli) > 0) 
	{
		// $_SESSION['mensagem'] = 'Usuário atualizado com sucesso';
		header('Location: lista.php');
		exit;
	} 
	
	else 
	{
		// $_SESSION['mensagem'] = 'Usuário não foi atualizado';
		header('Location: lista.php');
		exit;
	}
}


//-------------------------------------------------------------------------------------------------------------//

if (isset($_POST['delete_usuario'])) 
{
	$usuario_id = mysqli_real_escape_string($mysqli, $_POST['delete_usuario']);
	$sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";
	$resultado = mysqli_query($mysqli, $sql);


	if (mysqli_affected_rows($mysqli) > 0) 
	{
		$_SESSION['message'] = 'Usuário deletado com sucesso';
		header('Location: lista.php');
		exit;
	} 
	else {
		$_SESSION['message'] = 'Usuário não foi deletado';
		header('Location: lista.php');
		exit;
	}
}

?>