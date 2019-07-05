<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/AvaliacaoModel.php";


	$avaliacaoModel = new AvaliacaoModel();

	$acao = $_GET["acao"];


	if($acao == "cadastrar"){
		$descricao 	= $_POST["descricao"];

		$avaliacaoModel->inserir($descricao);

		echo "<script>location.href='../avaliacao/Avaliacao.php?cad=sucesso';</script>";
	}

	if($acao == "deletar"){

		$idAvaliacao = $_POST["idAvaliacao"];
		$avaliacaoModel->excluir($idAvaliacao);

		echo "<script>location.href='../avaliacao/Avaliacao.php?deletar=sucesso';</script>";

	}

	if($acao == "editar"){

		$idAvaliacao = $_POST["idAvaliacao"];
		$descricao = $_POST["descricao"];

		$avaliacaoModel->editar($idAvaliacao, $descricao);

		echo "<script>location.href='../avaliacao/Avaliacao.php?editar=sucesso';</script>";

	}



	



?>