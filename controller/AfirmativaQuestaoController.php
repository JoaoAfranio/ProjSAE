<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/AfirmativaQuestaoModel.php";


	$afirmativaQuestaoModel = new AfirmativaQuestaoModel();

	$acao = $_GET["acao"];
    $idQuestao 	= $_POST["idQuestao"];
    $idAfirmativa 	= $_POST["idAfirmativa"];


	if($acao == "cadastrar"){

		$afirmativaQuestaoModel->inserir($idQuestao, $idAfirmativa);

		echo "<script>location.href='../afirmativa/Afirmativa.php?cad=sucesso';</script>";
	}

	if($acao = "deletar"){

		$afirmativaQuestaoModel->excluir($idQuestao, $idAfirmativa);

		echo "<script>location.href='../questao/Questao.php?deletar=sucesso';</script>";

	}

?>