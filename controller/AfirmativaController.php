<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/AfirmativaModel.php";


	$afirmativaModel = new AfirmativaModel();

	$acao = $_GET["acao"];


	if($acao == "cadastrar"){
		$descricao 	= $_POST["descricao"];

		$afirmativaModel->inserir($descricao);

		echo "<script>location.href='../afirmativa/Afirmativa.php?cad=sucesso';</script>";
	}

	if($acao = "deletar"){

		$idAfirmativa = $_POST["idAfirmativa"];
		$afirmativaModel->excluir($idAfirmativa);

		echo "<script>location.href='../afirmativa/Afirmativa.php?deletar=sucesso';</script>";

	}



	



?>