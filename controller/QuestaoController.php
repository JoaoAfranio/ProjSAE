<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/QuestaoModel.php";


	$questaoModel = new QuestaoModel();

	$acao = $_GET["acao"];


	if($acao == "cadastrar"){
		$descricao 	= $_POST["descricao"];
		$idTipoQuestao 	= $_POST["idTipoQuestao"];

		$questaoModel->inserir($descricao, $idTipoQuestao);

		echo "<script>location.href='../questao/Questao.php?cad=sucesso';</script>";
	}

	if($acao == "deletar"){

		$idQuestao = $_POST["idQuestao"];
		$questaoModel->excluir($idQuestao);

		echo "<script>location.href='../questao/Questao.php?deletar=sucesso';</script>";

	}

	if($acao == "editar"){

		$idQuestao = $_POST["idQuestao"];
		$descricao = $_POST["descricao"];

		$questaoModel->editar($idQuestao, $descricao);

		echo "<script>location.href='../questao/Questao.php?editar=sucesso';</script>";

	}


	



?>