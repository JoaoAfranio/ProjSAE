<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/AvaliacaoQuestaoModel.php";


	$avaliacaoQuestaoModel = new AvaliacaoQuestaoModel();

	$acao = $_GET["acao"];
    $idQuestao 	= $_POST["idQuestao"];
    $idAvaliacao 	= $_POST["idAvaliacao"];


	if($acao == "cadastrar"){

		$avaliacaoQuestaoModel->inserir($idQuestao, $idAvaliacao);

		echo "<script>location.href='../avaliacao/Avaliacao.php?cad=sucesso';</script>";
		exit();
	}

	if($acao == "deletar"){

		$avaliacaoQuestaoModel->excluir($idQuestao, $idAvaliacao);

		echo "<script>location.href='../avaliacao/Avaliacao.php?deletar=sucesso';</script>";

	}

?>