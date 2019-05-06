<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/FuncionarioModel.php";


	$funcionarioModel = new FuncionarioModel();

	$acao = $_GET["acao"];


	if($acao == "create"){
		$nome 	= $_POST["nome"];
		$login 	= $_POST["login"];
		$senha 	= $_POST["senha"];
		$tipoFuncionario  = $_POST["tipoFuncionario"];

		$funcionarioModel->inserir($nome, $login, $senha, $tipoFuncionario);

		echo "<script>location.href='../funcionario/Funcionario.php?cad=sucesso';</script>";
		
	
    }

	if($acao == "update"){
		$id 	= $_POST["codigo"];
		$nome 	= $_POST["nome"];
		$login 	= $_POST["login"];
		$senha 	= $_POST["senha"];
		$tipoFuncionario  = $_POST["tipoFuncionario"];
		$funcionarioModel->atualizar($id, $nome, $login, $senha,$tipoFuncionario);
		echo "<script>alert('Usuário atualizado com sucesso'); location.href='/pdoAlunos/funcionario/index.php';</script>";
	}

	if($acao == "deletar"){

		$idFuncionario = $_POST["IdFuncionario"];
		$funcionarioModel->excluir($idFuncionario);
		
		echo "<script>location.href='../funcionario/Funcionario.php?deletar=sucesso';</script>";

	}


	if($acao == "autenticar"){
		$login 		= $_POST["login"];
		$senha 		= $_POST["senha"];
		$usuario 	= $funcionarioModel->autenticacao($login, $senha);

		if($usuario == false){
			echo "<script>alert('Usuário ou senha inválidos'); 
			location.href='/sae/index.php';</script>";
		}else{

			session_start();
			$_SESSION["nomeUsuario"] = $usuario["nome"];
			$_SESSION["idUsuario"] = $usuario["IdFuncionario"];

			$_SESSION["logado"] = true;
			$_SESSION["login"] = $_POST["login"];

			if($usuario["IdTipoFuncionario"] == 1){
				$_SESSION["TipoFuncionario"] = "administrador";
				echo "<script>location.href='/sae/questao/Questao.php'</script>";

			}else{
				echo "<script>location.href='/sae/index.php'</script>";
			}



			
		}


	}
	



	



?>