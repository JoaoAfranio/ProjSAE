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

	if($acao = "deletar"){

		$idQuestao = $_POST["idQuestao"];
		$questaoModel->excluir($idQuestao);

		echo "<script>location.href='../questao/questao.php?deletar=sucesso';</script>";

	}



	



?>